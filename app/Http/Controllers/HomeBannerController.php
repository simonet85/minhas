<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HomeBannerRequest;

class HomeBannerController extends Controller
{
    public function __construct(){
        return $this->middleware(["auth", "role:admin"]);
        // return $this->middleware(["auth", "role:admin"])->only(["store", "update"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeBanners = HomeBanner::orderBy("created_at")->paginate(5);
        return view("dashboard.home")->with("homeBanners", $homeBanners);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.home");
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
         if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('file')->getRealPath());

            // Get the current file size
            // $fileSize = $img->filesize();

            // Check if the file size is greater than 1MB
            // if ($fileSize > 1048576) {

            //      // Compress the image
            //     $img->encode("png", 60);
            //     $img->encode("jpg", 60);
            // }

            //Resize the image
            $img->resize(6720, 4480);
            
            // Upload Image
            $path = $request->file('file')->storeAs('public/banners/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/banners/'.$fileNameToStore);

        }

        // Validate inputs
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slogan' => 'required|max:255',
            'button' => 'required|max:255',
            'file' => 'required|image|max:2048', // max size 2MB
        ], [
            'title.required' => 'Le champ titre est obligatoire',
            'title.min' => 'Le titre doit comporter au moins :min caractères.',
            'title.max' => 'Le titre ne peut pas être supérieur à :max caractères.',
            'title.max' => 'Le titre ne doit pas être supérieur à :max caractères.',
            'slogan.required' => 'Le champ slogan est obligatoire.',
            'slogan.min' => 'Le slogan doit comporter au moins :min caractères.',
            'slogan.max' => 'Le slogan doit comporter au moins :min caractères.',
            'slogan.max' => 'Le slogan ne doit pas être supérieur à :max caractères.',
            'slogan.max' => 'Le slogan ne doit pas être supérieur à :max caractères.',
            'button.required' => 'Le champ du bouton est obligatoire.',
            'button.min' => 'Le bouton doit comporter au moins :min caractères.',
            'button.max' => 'Le bouton doit comporter au moins :min caractères.',
            'button.max' => 'Le bouton ne doit pas être supérieur à :max caractères.',
            'file.required' => 'Veuillez choisir un fichier à télécharger.',
            'file.image' => 'Veuillez télécharger uniquement des fichiers images.',
            'file.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
        ]);

        // If the validation passes, continue with the rest of the code
        $homeBanner = new HomeBanner;
        $homeBanner->title = $validatedData['title'];
        $homeBanner->slogan = $validatedData['slogan'];
        $homeBanner->button = $validatedData['button'];
        //Saving image name : image-name.jpg
        $homeBanner->file = $fileNameToStore;
        $homeBanner->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with(['success'=>'Bannière créée avec succès.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function show(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        // Handle File Upload
        if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('file')->getRealPath());
            $img->resize(6720, 4480);
            
            // Upload Image
            $path = $request->file('file')->storeAs('public/banners/', $fileNameToStore);
            // dd(is_writable($path . $filename));

            $img->save('storage/banners/'.$fileNameToStore);

        }

        // Validate inputs
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slogan' => 'required|max:255',
            'button' => 'required|max:255',
            'file' => 'required|image|max:2048', // max size 2MB
        ], [
            'title.required' => 'Le champ titre est obligatoire',
            'title.min' => 'Le titre doit comporter au moins :min caractères.',
            'title.max' => 'Le titre ne peut pas être supérieur à :max caractères.',
            'title.max' => 'Le titre ne doit pas être supérieur à :max caractères.',
            'slogan.required' => 'Le champ slogan est obligatoire.',
            'slogan.min' => 'Le slogan doit comporter au moins :min caractères.',
            'slogan.max' => 'Le slogan doit comporter au moins :min caractères.',
            'slogan.max' => 'Le slogan ne doit pas être supérieur à :max caractères.',
            'slogan.max' => 'Le slogan ne doit pas être supérieur à :max caractères.',
            'button.required' => 'Le champ du bouton est obligatoire.',
            'button.min' => 'Le bouton doit comporter au moins :min caractères.',
            'button.max' => 'Le bouton doit comporter au moins :min caractères.',
            'button.max' => 'Le bouton ne doit pas être supérieur à :max caractères.',
            'file.required' => 'Veuillez choisir un fichier à télécharger.',
            'file.image' => 'Veuillez télécharger uniquement des fichiers images.',
            'file.max' => 'Le fichier ne doit pas être supérieur à :max kilobytes (2M).'
        ]);

        $homeBanner = HomeBanner::findOrFail($id);

        $homeBanner->title = $validatedData["title"];
        $homeBanner->slogan = $validatedData["slogan"];
        $homeBanner->button = $validatedData["button"];
        $homeBanner->file = $fileNameToStore;
        $homeBanner->save();
    
        return redirect()->back()->with('success', 'Banniére modifiée avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeBanner = HomeBanner::findOrFail($id);
        if($homeBanner->file !== null){
            // Delete Image
            Storage::delete('public/banners/'.$homeBanner->file);
        }
        $homeBanner->delete();
        return redirect()->back()->with('success', 'Bannière supprimé avec succès.');
    }
}
