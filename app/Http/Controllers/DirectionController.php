<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Direction::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.direction-management')->with('directions', $directions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
         if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('photo')->getRealPath());

            // Get the current file size
            // $fileSize = $img->filesize();

            // Check if the file size is greater than 1MB
            // if ($fileSize > 1048576) {

            //      // Compress the image
            //     $img->encode("png", 60);
            //     $img->encode("jpg", 60);
            // }

            //Resize the image
            $img->resize(350, 200);
            
            // Upload Image
            $path = $request->file('photo')->storeAs('public/directions/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/directions/'.$fileNameToStore);

        }

        // Validate inputs
        $request->validate([
                'name' => 'required|max:255',
                'attribute' => 'required',
                'photo' => 'required|image|max:2048', // max size 2MB
            ], [
                'name.required' => 'Le champ Nom est obligatoire',
                'name.max' => 'Le Nom ne doit pas être supérieur à :max caractères.',
                'attribute.required' => 'Le champ Attribution(s) est obligatoire.',
                'photo.required' => 'Veuillez choisir un fichier à télécharger.',
                'photo.image' => 'Veuillez télécharger uniquement des fichiers images.',
                'photo.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
            ]);

        // If the validation passes, continue with the rest of the code
        $direction = new Direction;
        $direction->name = $request->name;
        $direction->attribute = $request->attribute;
        //Saving image name : image-name.jpg
        $direction->photo = $fileNameToStore;
        $direction->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with(['success'=>'Créé avec succès.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
         // Handle File Upload
         if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('photo')->getRealPath());
            $img->resize(350, 200);
            
            // Upload Image
            $path = $request->file('photo')->storeAs('public/directions/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/directions/'.$fileNameToStore);

        }

        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'attribute' => 'required',
            'photo' => 'required|image|max:2048', // max size 2MB
        ], [
            'name.required' => 'Le champ titre est obligatoire',
            'name.max' => 'Le titre ne doit pas être supérieur à :max caractères.',
            'attribute.required' => 'Le champ description est obligatoire.',
            'photo.required' => 'Veuillez choisir un fichier à télécharger.',
            'photo.image' => 'Veuillez télécharger uniquement des fichiers images.',
            'photo.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
        ]);

        $missionObjectif = Direction::findOrFail($id);
        // If the validation passes, continue with the rest of the code
        $missionObjectif->name = $validatedData['name'];
        $missionObjectif->attribute = $validatedData['attribute'];
        //Saving image name : image-name.jpg
        $missionObjectif->photo = $fileNameToStore;
        $missionObjectif->save();
    
        return redirect()->back()->with('success', 'Modifiée avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $direction = Direction::findOrFail($id);
        if($direction->photo !== null){
            // Delete Image
            Storage::delete('public/directions/'.$direction->photo);
        }
        $direction->delete();
        return redirect()->back()->with('success', 'Supprimé avec succès.');
    }
}
