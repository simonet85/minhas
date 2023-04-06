<?php

// Controller
namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller 
{ 

    public function index()
    {
        $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();

        return view('dashboard.home', compact('site_settings'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated_data = $request->validate([
            'site_name' => 'required|string',
            'contact_mobile' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'site_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle File Upload
        if($request->hasFile('site_logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('site_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('site_logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $img = Image::make($request->file('site_logo')->getRealPath());

            //Resize the image
            $img->resize(100, 50);


            // Check if the file exists before deleting it
            if (Storage::exists('public/site_logos/'.$fileNameToStore)) {
                Storage::delete('public/site_logos/'.$fileNameToStore);
            }
            

            // Upload Image
            $path = $request->file('site_logo')->storeAs('public/site_logos/', $fileNameToStore);
            $img->save('storage/site_logos/'.$fileNameToStore);


        }

        $site_settings = new SiteSettings();
        $site_settings->site_name = $validated_data['site_name']; 
        $site_settings->contact_mobile = $validated_data['contact_mobile']; 
        $site_settings->contact_email = $validated_data['contact_email']; 
        $site_settings->social_facebook = $validated_data['social_facebook'] ;
        $site_settings->social_twitter = $validated_data['social_twitter'];
        $site_settings->social_linkedin = $validated_data['social_linkedin'] ;
        // $site_settings->site_logo = $validated_data['site_logo'] ;
        // if (Storage::exists('site_logo')) {
        //     Storage::delete($site_settings->site_logo);
        // }
        $site_settings->site_logo = $fileNameToStore;
        $site_settings->save();

        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }
}
