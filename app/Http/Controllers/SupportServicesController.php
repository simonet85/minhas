<?php

namespace App\Http\Controllers;

use App\Models\SupportServices;
use Illuminate\Http\Request;

class SupportServicesController extends Controller
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
        $services = SupportServices::orderBy("updated_at")->paginate(5);
        return view("dashboard.home")->with("services", $services);
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
            'description' => 'required',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le champ titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'description.required' => 'Le champ description est obligatoire.',
            
        ]);
        
        // If the validation passes, continue with the rest of the code
        $service = new SupportServices;
        $service->title = $validatedData['title'];
        $service->description = $validatedData['description'];
        $service->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Service créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupportServices  $supportServices
     * @return \Illuminate\Http\Response
     */
    public function show(SupportServices $supportServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupportServices  $supportServices
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportServices $supportServices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupportServices  $supportServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le champ titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'description.required' => 'Le champ bouton est obligatoire.',
            'description.max' => 'Le champ bouton ne doit pas être supérieur à :max caractères.',
        ]);
        
        // If the validation passes, continue with the rest of the code
        $profesionalDev =  SupportServices::find($id);
        $profesionalDev->title = $validatedData['title'];
        $profesionalDev->description = $validatedData['description'];
        $profesionalDev->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Service modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupportServices  $supportServices
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $profesionalDev = SupportServices::findOrFail($id);

        $profesionalDev->delete();
        return redirect()->back()->with('success', 'Service supprimé avec succès.');
    }
}
