<?php

namespace App\Http\Controllers;

use App\Models\LatestNews;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
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
        $lastestNews = LatestNews::orderBy("updated_at")->get();
        return view("dashboard.home")->with("lastestNews", $lastestNews);
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
            'title' => 'required|string|max:100',
            'text' => 'required|max:150',
            'button' => 'max:25',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le champ titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas être supérieur à :max caractères.',
            'text.required' => 'Le champ texte est obligatoire.',
            'text.max' => 'Le champ texte ne doit pas être supérieur à :max caractères.',
            'button.max' => 'Le champ bouton ne doit pas être supérieur à :max caractères.',
        ]);
        
        // If the validation passes, continue with the rest of the code
        $lastestNews = new LatestNews;
        $lastestNews->title = $validatedData['title'];
        $lastestNews->text = $validatedData['text'];
        $lastestNews->button = $validatedData['button'];
        $lastestNews->save();

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Info créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LatestNews  $latestNews
     * @return \Illuminate\Http\Response
     */
    public function show(LatestNews $latestNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LatestNews  $latestNews
     * @return \Illuminate\Http\Response
     */
    public function edit(LatestNews $latestNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LatestNews  $latestNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LatestNews $latestNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LatestNews  $latestNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(LatestNews $latestNews)
    {
        //
    }
}
