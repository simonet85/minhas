<?php

namespace App\Http\Controllers;

use App\Models\ProfesionalDev;
use Illuminate\Http\Request;

class ProfesionalDevController extends Controller
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
        $profesionalDevs = ProfesionalDev::orderBy("created_at", "asc")->paginate(10);
        return view("dashboard.profesionaldev")->with("profesionalDevs", $profesionalDevs);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'entreprise' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'end_date' => 'required|date|after:date',
            'venue' => 'required|string|max:255',
            'cost' => 'required',
            'course_objectives' => 'required|string',
            'target_audience' => 'required|string',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le champ titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'entreprise.required' => 'Le champ entreprise est obligatoire.',
            'entreprise.max' => 'Le champ entreprisee ne doit pas être supérieur à :max caractères.',
            'description.required' => 'Le champ bouton est obligatoire.',
            'date.required' => 'Le champ date est obligatoire.',
            'date.date' => 'La Date n\'est pas conforme.',

            'end_date.required' => 'La Date  de fin est requis.',
            'end_date.date' => 'La Date  de fin doit être une date valide.',
            'end_date.after' => 'La Date  de fin doit être postérieure à la date de début.',

            'venue.required' => 'Le Lieu est obligatoire',
            'venue.string' => 'Le Lieu doit être une chaine de charactére.',
            'venue.max' => 'Le Lieu doit être max :max chaines de charactéres.',
            'cost.required' => 'Le Coût est obligatoire.',
            'course_objectives.required' => 'Les objectifs du cours sont obligatoires.',
            'course_objectives.required' => 'Les objectifs doivent être une chaine de charactére.',
            'target_audience.required' => 'Le public cible est obligatoire.',
            'target_audience.string' => 'Le public cible doit être une chaine de charactére.',
            
        ]);
        
        // If the validation passes, continue with the rest of the code
        $homeBanner = new ProfesionalDev;
        $homeBanner->title = $validatedData['title'];
        $homeBanner->entreprise = $validatedData['entreprise'];
        $homeBanner->description = $validatedData['description'];
        $homeBanner->date = $validatedData['date'];
        $homeBanner->end_date = $validatedData['end_date'];
        $homeBanner->venue = $validatedData['venue'];
        $homeBanner->cost = $validatedData['cost'];
        $homeBanner->course_objectives = $validatedData['course_objectives'];
        $homeBanner->target_audience = $validatedData['target_audience'];
        $homeBanner->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Opportunité créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfesionalDev  $profesionalDev
     * @return \Illuminate\Http\Response
     */
    public function show(ProfesionalDev $profesionalDev)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfesionalDev  $profesionalDev
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfesionalDev $profesionalDev)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfesionalDev  $profesionalDev
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'entreprise' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'end_date' => 'required|date|after:date',
            'venue' => 'required|string|max:255',
            'cost' => 'required|string',
            'course_objectives' => 'required|string',
            'target_audience' => 'required|string',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le champ titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'entreprise.required' => 'Le champ entreprise est obligatoire.',
            'entreprise.max' => 'Le champ entreprisee ne doit pas être supérieur à :max caractères.',
            'description.required' => 'Le champ bouton est obligatoire.',
            'date.required' => 'Le champ date est obligatoire.',
            'date.date' => 'La Date n\'est pas conforme.',

            'end_date.required' => 'La Date  de fin est requis.',
            'end_date.date' => 'La Date  de fin doit être une date valide.',
            'end_date.after' => 'La Date  de fin doit être postérieure à la date de début.',

            'venue.required' => 'Le Lieu est obligatoire',
            'venue.string' => 'Le Lieu doit être une chaine de charactére.',
            'venue.max' => 'Le Lieu doit être max :max chaines de charactéres.',
            'cost.required' => 'Le Coût est obligatoire.',
            'cost.string' => 'Le Coût doit être une chaine de charactére.',
            'course_objectives.required' => 'Les objectifs du cours sont obligatoires.',
            'course_objectives.required' => 'Les objectifs doivent être une chaine de charactére.',
            'target_audience.required' => 'Le public cible est obligatoire.',
            'target_audience.string' => 'Le public cible doit être une chaine de charactére.',
            
        ]);
        
        // If the validation passes, continue with the rest of the code
        $profesionalDev =  ProfesionalDev::find($id);
        $profesionalDev->title = $validatedData['title'];
        $profesionalDev->entreprise = $validatedData['entreprise'];
        $profesionalDev->description = $validatedData['description'];
        $profesionalDev->date = $validatedData['date'];
        $profesionalDev->end_date = $validatedData['end_date'];
        $profesionalDev->venue = $validatedData['venue'];
        $profesionalDev->cost = $validatedData['cost'];
        $profesionalDev->course_objectives = $validatedData['course_objectives'];
        $profesionalDev->target_audience = $validatedData['target_audience'];
        $profesionalDev->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Opportunité modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfesionalDev  $profesionalDev
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesionalDev = ProfesionalDev::findOrFail($id);

        $profesionalDev->delete();
        return redirect()->back()->with('success', 'Opportunité supprimé avec succès.');
    }
}
