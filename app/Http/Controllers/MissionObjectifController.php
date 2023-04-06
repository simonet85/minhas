<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionObjectif;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class MissionObjectifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missionObjectifs = MissionObjectif::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.mission-objectif')->with('missionObjectifs', $missionObjectifs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               
         // Handle File Upload
         if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('image')->getRealPath());

            // Get the current file size
            // $fileSize = $img->filesize();

            // Check if the file size is greater than 1MB
            // if ($fileSize > 1048576) {

            //      // Compress the image
            //     $img->encode("png", 60);
            //     $img->encode("jpg", 60);
            // }

            //Resize the image
            $img->resize(500,400);
            
            // Upload Image
            $path = $request->file('image')->storeAs('public/missions/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/missions/'.$fileNameToStore);

        }

        // Validate inputs
        $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'image' => 'required|image|max:2048', // max size 2MB
            ], [
                'title.required' => 'Le champ titre est obligatoire',
                'title.max' => 'Le titre ne doit pas être supérieur à :max caractères.',
                'description.required' => 'Le champ description est obligatoire.',
                'image.required' => 'Veuillez choisir un fichier à télécharger.',
                'image.image' => 'Veuillez télécharger uniquement des fichiers images.',
                'image.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
            ]);

        // If the validation passes, continue with the rest of the code
        $missionObjectif = new MissionObjectif;
        $missionObjectif->title = $request->title;
        $missionObjectif->description = $request->description;
        //Saving image name : image-name.jpg
        $missionObjectif->image = $fileNameToStore;
        $missionObjectif->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with(['success'=>'Mission et Objectif créé avec succès.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MissionObjectif  $missionObjectif
     * @return \Illuminate\Http\Response
     */
    public function show(MissionObjectif $missionObjectif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MissionObjectif  $missionObjectif
     * @return \Illuminate\Http\Response
     */
    public function edit(MissionObjectif $missionObjectif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MissionObjectif  $missionObjectif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
         // Handle File Upload
         if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('image')->getRealPath());
            $img->resize(500,400);
            
            // Upload Image
            $path = $request->file('image')->storeAs('public/missions/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/missions/'.$fileNameToStore);

        }

        // Validate inputs
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|max:2048', // max size 2MB
        ], [
            'title.required' => 'Le champ titre est obligatoire',
            'title.max' => 'Le titre ne doit pas être supérieur à :max caractères.',
            'description.required' => 'Le champ description est obligatoire.',
            'image.required' => 'Veuillez choisir un fichier à télécharger.',
            'image.image' => 'Veuillez télécharger uniquement des fichiers images.',
            'image.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
        ]);

        $missionObjectif = MissionObjectif::findOrFail($id);
        // If the validation passes, continue with the rest of the code
        $missionObjectif->title = $validatedData['title'];
        $missionObjectif->description = $validatedData['description'];
        //Saving image name : image-name.jpg
        $missionObjectif->image = $fileNameToStore;
        $missionObjectif->save();
    
        return redirect()->back()->with('success', 'Modifiée avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MissionObjectif  $missionObjectif
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $missionObjectif = MissionObjectif::findOrFail($id);
        if($missionObjectif->image !== null){
            // Delete Image
            Storage::delete('public/missions/'.$missionObjectif->image);
        }
        $missionObjectif->delete();
        return redirect()->back()->with('success', 'Supprimé avec succès.');
    }
}
