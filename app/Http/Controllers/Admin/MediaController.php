<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Afficher la médiathèque.
     */
    public function index()
    {
        $media = Media::latest()->paginate(24);

        return view('admin.media.index', compact('media'));
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Enregistrer un nouveau média.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'alt' => [
                'nullable',
                'string',
                'max:255',
            ],

            'caption' => [
                'nullable',
                'string',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | FICHIER
        |--------------------------------------------------------------------------
        */

        $file = $request->file('image');

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS DU FICHIER
        |--------------------------------------------------------------------------
        |
        | Ces informations doivent être récupérées avant l'enregistrement.
        |
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

        $imageSize = getimagesize($file->getRealPath());

        $width = $imageSize[0] ?? null;
        $height = $imageSize[1] ?? null;

        /*
        |--------------------------------------------------------------------------
        | NOM DU FICHIER
        |--------------------------------------------------------------------------
        |
        | On conserve un nom lisible basé sur le nom original.
        |
        */

        $baseName = pathinfo(
            $file->getClientOriginalName(),
            PATHINFO_FILENAME
        );

        $baseName = Str::slug($baseName);

        /*
        |--------------------------------------------------------------------------
        | FALLBACK SI LE NOM EST VIDE
        |--------------------------------------------------------------------------
        */

        if (empty($baseName)) {
            $baseName = 'image';
        }

        /*
        |--------------------------------------------------------------------------
        | NOM UNIQUE
        |--------------------------------------------------------------------------
        */

        $filename = $baseName . '.' . $extension;

        $counter = 1;

        while (
            Storage::disk('public')->exists(
                'images/' . $filename
            )
        ) {
            $filename = $baseName
                . '-'
                . $counter
                . '.'
                . $extension;

            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | STOCKAGE LARAVEL
        |--------------------------------------------------------------------------
        |
        | Le fichier sera enregistré dans :
        |
        | storage/app/public/images/
        |
        */

        $path = Storage::disk('public')->putFileAs(
            'images',
            $file,
            $filename
        );

        /*
        |--------------------------------------------------------------------------
        | VÉRIFICATION DU STOCKAGE
        |--------------------------------------------------------------------------
        */

        if (!$path) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Impossible d’enregistrer le fichier.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CRÉATION DU MEDIA
        |--------------------------------------------------------------------------
        */

        Media::create([
            'disk' => 'public',
            'path' => $path,
            'filename' => $filename,
            'mime_type' => $mimeType,
            'size' => $fileSize,
            'width' => $width,
            'height' => $height,
            'alt' => $validated['alt'] ?? null,
            'caption' => $validated['caption'] ?? null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.media.index')
            ->with(
                'success',
                'Média ajouté avec succès.'
            );
    }

    /**
     * Afficher les détails d'un média.
     */
    public function show(Media $media)
    {
        $media->load([
            'productImages.product',
        ]);

        return view('admin.media.show', compact('media'));
    }

    /**
     * Supprimer un média.
     */
    public function destroy(Media $media)
    {
        /*
        |--------------------------------------------------------------------------
        | VÉRIFIER SI LE MÉDIA EST UTILISÉ
        |--------------------------------------------------------------------------
        */

        if ($media->productImages()->exists()) {
            return redirect()
                ->route('admin.media.index')
                ->with(
                    'error',
                    'Impossible de supprimer ce média car il est utilisé par un produit.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | VÉRIFIER LE CHEMIN
        |--------------------------------------------------------------------------
        */

        if (!$media->path) {
            return redirect()
                ->route('admin.media.index')
                ->with(
                    'error',
                    'Le chemin du fichier est introuvable.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRESSION DU FICHIER
        |--------------------------------------------------------------------------
        |
        | On utilise le disque enregistré dans Media.
        |
        */

        $disk = $media->disk ?: 'public';

        if (Storage::disk($disk)->exists($media->path)) {
            $deleted = Storage::disk($disk)->delete(
                $media->path
            );

            if (!$deleted) {
                return redirect()
                    ->route('admin.media.index')
                    ->with(
                        'error',
                        'Impossible de supprimer le fichier physique.'
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRESSION DU MEDIA
        |--------------------------------------------------------------------------
        */

        $media->delete();

        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.media.index')
            ->with(
                'success',
                'Média supprimé avec succès.'
            );
    }
}