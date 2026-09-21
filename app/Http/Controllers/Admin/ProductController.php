<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Affiche la liste des plats.
     */
    public function index()
    {
        $products = Product::with([
            'category',
            'productImages.media',
        ])
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Affiche le formulaire de création d'un plat.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau plat.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'preparation_time' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'string',
                'max:255',
            ],

            'is_available' => [
                'nullable',
                'boolean',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug(
                $validated['name']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CASES À COCHER
        |--------------------------------------------------------------------------
        */

        $validated['is_available'] =
            $request->boolean('is_available');

        $validated['is_featured'] =
            $request->boolean('is_featured');

        /*
        |--------------------------------------------------------------------------
        | CRÉATION DU PLAT
        |--------------------------------------------------------------------------
        */

        $product = Product::create($validated);

        /*
        |--------------------------------------------------------------------------
        | IMAGE DU PLAT
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS DU FICHIER
            |--------------------------------------------------------------------------
            */

            $mimeType = $file->getMimeType();
            $fileSize = $file->getSize();
            $extension = strtolower(
                $file->getClientOriginalExtension()
            );

            /*
            |--------------------------------------------------------------------------
            | DIMENSIONS
            |--------------------------------------------------------------------------
            */

            $imageSize = getimagesize(
                $file->getRealPath()
            );

            $width = $imageSize[0] ?? null;
            $height = $imageSize[1] ?? null;

            /*
            |--------------------------------------------------------------------------
            | NOM UNIQUE
            |--------------------------------------------------------------------------
            |
            | UUID = très faible risque de collision.
            |
            */

            $filename = Str::uuid()
                .toString()
                . '.'
                . $extension;

            /*
            |--------------------------------------------------------------------------
            | STOCKAGE
            |--------------------------------------------------------------------------
            |
            | storage/app/public/images/products/
            |
            */

            $path = Storage::disk('public')->putFileAs(
                'images/products',
                $file,
                $filename
            );

            /*
            |--------------------------------------------------------------------------
            | VÉRIFICATION
            |--------------------------------------------------------------------------
            */

            if (!$path) {
                $product->delete();

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Impossible d’enregistrer l’image du plat.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | CRÉATION DU MEDIA
            |--------------------------------------------------------------------------
            */

            $media = Media::create([
                'disk' => 'public',
                'path' => $path,
                'filename' => $filename,
                'mime_type' => $mimeType,
                'size' => $fileSize,
                'width' => $width,
                'height' => $height,
                'alt' => $product->name,
                'caption' => null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | LIAISON PRODUCT ↔ MEDIA
            |--------------------------------------------------------------------------
            */

            ProductImage::create([
                'product_id' => $product->id,
                'media_id' => $media->id,
                'sort_order' => 0,
                'is_primary' => true,
                'alt' => $product->name,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Le plat a été ajouté avec succès.'
            );
    }

    /**
     * Affiche les détails d'un plat.
     */
    public function show(Product $product)
    {
        $product->load([
            'category',
            'productImages.media',
        ]);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Affiche le formulaire de modification d'un plat.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        $product->load([
            'productImages.media',
        ]);

        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }

    /**
     * Met à jour un plat existant.
     */
    public function update(
        Request $request,
        Product $product
    ) {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'slug')
                    ->ignore($product->id),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'preparation_time' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'string',
                'max:255',
            ],

            'is_available' => [
                'nullable',
                'boolean',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug(
                $validated['name']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CASES À COCHER
        |--------------------------------------------------------------------------
        */

        $validated['is_available'] =
            $request->boolean('is_available');

        $validated['is_featured'] =
            $request->boolean('is_featured');

        /*
        |--------------------------------------------------------------------------
        | MISE À JOUR DU PLAT
        |--------------------------------------------------------------------------
        */

        $product->update($validated);

        /*
        |--------------------------------------------------------------------------
        | REMPLACEMENT DE L'IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            /*
            |--------------------------------------------------------------------------
            | ANCIENNE IMAGE PRINCIPALE
            |--------------------------------------------------------------------------
            */

            $oldProductImage = $product
                ->productImages()
                ->where('is_primary', true)
                ->with('media')
                ->first();

            $oldMedia = $oldProductImage?->media;

            /*
            |--------------------------------------------------------------------------
            | NOUVELLE IMAGE
            |--------------------------------------------------------------------------
            */

            $file = $request->file('image');

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS DU FICHIER
            |--------------------------------------------------------------------------
            */

            $mimeType = $file->getMimeType();
            $fileSize = $file->getSize();
            $extension = strtolower(
                $file->getClientOriginalExtension()
            );

            /*
            |--------------------------------------------------------------------------
            | DIMENSIONS
            |--------------------------------------------------------------------------
            */

            $imageSize = getimagesize(
                $file->getRealPath()
            );

            $width = $imageSize[0] ?? null;
            $height = $imageSize[1] ?? null;

            /*
            |--------------------------------------------------------------------------
            | NOM UNIQUE
            |--------------------------------------------------------------------------
            */

            $filename = Str::uuid()
                ->toString()
                . '.'
                . $extension;

            /*
            |--------------------------------------------------------------------------
            | STOCKAGE LARAVEL
            |--------------------------------------------------------------------------
            */

            $path = Storage::disk('public')->putFileAs(
                'images/products',
                $file,
                $filename
            );

            /*
            |--------------------------------------------------------------------------
            | VÉRIFICATION
            |--------------------------------------------------------------------------
            */

            if (!$path) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Impossible d’enregistrer la nouvelle image.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | NOUVEAU MEDIA
            |--------------------------------------------------------------------------
            */

            $newMedia = Media::create([
                'disk' => 'public',
                'path' => $path,
                'filename' => $filename,
                'mime_type' => $mimeType,
                'size' => $fileSize,
                'width' => $width,
                'height' => $height,
                'alt' => $product->name,
                'caption' => null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | MISE À JOUR DE PRODUCT_IMAGE
            |--------------------------------------------------------------------------
            */

            if ($oldProductImage) {

                $oldProductImage->update([
                    'media_id' => $newMedia->id,
                    'alt' => $product->name,
                ]);

            } else {

                ProductImage::create([
                    'product_id' => $product->id,
                    'media_id' => $newMedia->id,
                    'sort_order' => 0,
                    'is_primary' => true,
                    'alt' => $product->name,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | SUPPRESSION DE L'ANCIEN FICHIER
            |--------------------------------------------------------------------------
            */

            if ($oldMedia && $oldMedia->path) {

                $oldDisk = $oldMedia->disk ?: 'public';

                if (
                    Storage::disk($oldDisk)
                        ->exists($oldMedia->path)
                ) {
                    Storage::disk($oldDisk)
                        ->delete($oldMedia->path);
                }

                /*
                |--------------------------------------------------------------------------
                | SUPPRESSION DE L'ANCIEN MEDIA
                |--------------------------------------------------------------------------
                */

                $oldMedia->delete();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Le plat a été modifié avec succès.'
            );
    }

    /**
     * Supprime un plat.
     */
    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | RÉCUPÉRATION DES IMAGES
        |--------------------------------------------------------------------------
        */

        $productImages = $product
            ->productImages()
            ->with('media')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | SUPPRESSION DES IMAGES ET MÉDIAS
        |--------------------------------------------------------------------------
        */

        foreach ($productImages as $productImage) {

            $media = $productImage->media;

            /*
            |--------------------------------------------------------------------------
            | SUPPRESSION DU FICHIER
            |--------------------------------------------------------------------------
            */

            if ($media && $media->path) {

                $disk = $media->disk ?: 'public';

                if (
                    Storage::disk($disk)
                        ->exists($media->path)
                ) {
                    Storage::disk($disk)
                        ->delete($media->path);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | SUPPRESSION DE PRODUCT_IMAGE
            |--------------------------------------------------------------------------
            */

            $productImage->delete();

            /*
            |--------------------------------------------------------------------------
            | SUPPRESSION DU MEDIA
            |--------------------------------------------------------------------------
            */

            if ($media) {
                $media->delete();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRESSION DU PLAT
        |--------------------------------------------------------------------------
        */

        $product->delete();

        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Le plat a été supprimé avec succès.'
            );
    }
}