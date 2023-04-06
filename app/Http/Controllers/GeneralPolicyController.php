<?php

namespace App\Http\Controllers;

use App\Models\GeneralPolicy;
use Illuminate\Http\Request;

class GeneralPolicyController extends Controller
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
        $policies = GeneralPolicy::orderBy('created_at', 'desc')->paginate(10);
        return view("dashboard.home")->with("policies", $policies);
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Le champ titre est requis.',
            'description.required' => 'Le champ description est requis.',
        ]);
        

        $event = GeneralPolicy::create($request->all());

        return redirect()->back()->with('success', 'Déclaration créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralPolicy  $generalPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralPolicy $generalPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralPolicy  $generalPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralPolicy $generalPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralPolicy  $generalPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Le champ titre est requis.',
            'description.required' => 'Le champ description est requis.',
        ]);

        $event = GeneralPolicy::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->save();
        
        return redirect()->back()->with("success", "Déclaration modifier avec succés!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralPolicy  $generalPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = GeneralPolicy::find($id)->delete();

    	return redirect()->back()->with("success", "Déclaration supprimé avec succés!");
    }
}
