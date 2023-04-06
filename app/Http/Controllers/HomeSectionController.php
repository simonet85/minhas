<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeSectionController extends Controller
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
        $homeSections = HomeSection::orderBy("updated_at")->get();
        
        return view("dashboard.home")->with("homeSections", $homeSections);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'section_name' => 'required|string|max:20',
            'message' => 'required',
            'button' => 'nullable',
        ], [
            'title.required' => 'Le champ En-tête de la section est obligatoire.',
            'title.string' => 'Le champ En-tête de la section doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'section_name.required' => 'Le champ Titre de la section est obligatoire.',
            'section_name.string' => 'Le champ Titre de la section doit être une chaîne de caractères.',
            'section_name.max' => 'Le champ Titre de la section ne doit pas être supérieur à :max caractères.',
            'text.required' => 'Le champ texte est obligatoire.',
            'button.required' => 'Le champ bouton est obligatoire.',
            'button.max' => 'Le champ bouton ne doit pas être supérieur à :max caractères.',
        ]);
        
        // If the validation passes, continue with the rest of the code
        $homeBanner = new HomeSection;
        $homeBanner->title = $validatedData['title'];
        $homeBanner->section_name = $validatedData['section_name'];
        $homeBanner->text = $validatedData['message'];
        $homeBanner->button = $validatedData['button'];
        $homeBanner->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Section créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSection $homeSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSection $homeSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'message' => 'required',
            'button' => 'nullable',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'message.required' => 'Le champ texte est obligatoire.',
            'button.required' => 'Le champ bouton est obligatoire.',
            'button.max' => 'Le champ bouton ne doit pas être supérieur à :max caractères.',
        ]);
        
        // If the validation passes, continue with the rest of the code
        $homeBanner =  HomeSection::findOrFail($id);
        $homeBanner->title = $validatedData['title'];
        $homeBanner->text = $validatedData['message'];
        $homeBanner->button = $validatedData['button'];
        $homeBanner->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Section modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeBanner = HomeSection::findOrFail($id);

        $homeBanner->delete();
        return redirect()->back()->with('success', 'Section supprimé avec succès.');
    }
}
