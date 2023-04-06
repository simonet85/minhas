<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function __construct(){
        return $this->middleware(["auth"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $profile = $user->profile;
            // dd($user);
            return view("dashboard.home",[
                // "profile" => $profile,
                 "user"   => $user,
                 "profile"   => $profile,
            ]);
        }
        // //Find the auth user id
        // $id = Auth::user()->id;
        // //Get the user profile data
        // $profile = User::find($id);

 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        $profile->about = $request->input('about');
        $profile->phone = $request->input('phone');
        $profile->twitter_url = $request->input('twitter_url');
        $profile->facebook_url = $request->input('facebook_url');
        $profile->instagram_url = $request->input('instagram_url');
        $profile->linkedin_url = $request->input('linkedin_url');




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
            $img->resize(120, 120);
            
            // Upload Image
            $path = $request->file('photo')->storeAs('public/users/', $fileNameToStore);

            $img->save('storage/users/'.$fileNameToStore);

            // Update User's photo field
            $user->photo = $fileNameToStore;
            $user->save();
        }

        /*$user->profile()->save($profile) creates a new Profile model
         instance or updates an existing one, and associates it with the authenticated user.
         */ 
        $updatedUser = User::find($user->id);
        $updatedUser->name = $request->input('name');
        $updatedUser->email = $request->input('email');
        $updatedUser->job = $request->input('job');
        $updatedUser->place = $request->input('place');
        $updatedUser->save();
        $user->profile()->save($profile);
            
        return redirect()->back()->with('success', 'Profil Modifié avec succés.');
    }

    /**
     * Change password .
     *
     * @param  \App\Models\User 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $valiadtor = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ],[
            'current_password.required' => 'Le Mot de passe actuel est requis',
            'new_password.required' => 'Le Nouveau Mot de passe  est requis',
            'new_password.min' => 'Le Nouveau Mot de passe doit avoir un minimum de :min charactére.',
            'confirm_password.required' => 'Veuillez confirmer votre nouveau mot de passe',
            'confirm_password.same' => 'Le nouveau mot de passe et le mot de passe de confirmation doivent correspondre.',
        ]);

        if($valiadtor->fails()){
            return redirect()->back()->withErrors($valiadtor);
        }

        //Update the user's password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Le mot de passe a été mis à jour avec succès');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
