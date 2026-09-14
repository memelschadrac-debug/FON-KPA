<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
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

    $file = $request->file('image');

    // Récupérer les informations AVANT de déplacer le fichier.
    $mimeType = $file->getMimeType();
    $fileSize = $file->getSize();
    $extension = $file->getClientOriginalExtension();

    // Récupérer les dimensions de l'image.
    $imageSize = getimagesize($file->getRealPath());

    $width = $imageSize[0] ?? null;
    $height = $imageSize[1] ?? null;

    // Générer un nom propre à partir du nom original.
    $baseName = pathinfo(
        $file->getClientOriginalName(),
        PATHINFO_FILENAME
    );

    $baseName = Str::slug($baseName);

    $extension = strtolower($extension);

    $filename = $baseName . '.' . $extension;

    // Éviter les doublons.
    $counter = 1;

    while (file_exists(public_path('images/' . $filename))) {
        $filename = $baseName . '-' . $counter . '.' . $extension;
        $counter++;
    }

    // Dossier de destination.
    $directory = public_path('images');

    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    // Déplacer l'image.
    $file->move($directory, $filename);

    // Enregistrer le média en base de données.
    Media::create([
        'disk' => 'public',
        'path' => 'images/' . $filename,
        'filename' => $filename,
        'mime_type' => $mimeType,
        'size' => $fileSize,
        'width' => $width,
        'height' => $height,
        'alt' => $validated['alt'] ?? null,
        'caption' => $validated['caption'] ?? null,
    ]);

    return redirect()
        ->route('admin.media.index')
        ->with('success', 'Média ajouté avec succès.');
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
        
        // Vérifier si le média est utilisé par un produit.
        if ($media->productImages()->exists()) {
            return redirect()
                ->route('admin.media.index')
                ->with(
                    'error',
                    'Impossible de supprimer ce média car il est utilisé par un produit.'
                );
        }

        // Vérifier que le média possède bien un chemin.
        if (!$media->path) {
            return redirect()
                ->route('admin.media.index')
                ->with('error', 'Le chemin du fichier est introuvable.');
        }

        // Construire le chemin physique du fichier.
        $filePath = public_path($media->path);

        // Vérifier que le fichier existe.
        if (!is_file($filePath)) {
            return redirect()
                ->route('admin.media.index')
                ->with('error', 'Le fichier physique est introuvable.');
        }

        // Supprimer réellement le fichier.
        if (!unlink($filePath)) {
            return redirect()
                ->route('admin.media.index')
                ->with('error', 'Impossible de supprimer le fichier physique.');
        }

        // Supprimer l'enregistrement de la base de données.
        $media->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Média supprimé avec succès.');
    }
}
