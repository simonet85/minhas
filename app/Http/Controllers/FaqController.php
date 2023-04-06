<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faqs = Faq::orderBy("created_at", "asc")->paginate(5);
        return view("dashboard.home",["faqs"=>$faqs]);
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
        $faq = new Faq;
        $faq->title = $validatedData['title'];
        $faq->description = $validatedData['description'];
        $faq->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Question créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $faq =  Faq::find($id);
        $faq->title = $validatedData['title'];
        $faq->description = $validatedData['description'];
        $faq->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Question modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $faq = Faq::findOrFail($id);

        $faq->delete();
        return redirect()->back()->with('success', 'Question supprimée avec succès.');
    }
}
