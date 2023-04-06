<?php

namespace App\Http\Controllers;

use Directory;
use App\Models\Faq;
use App\Models\User;
use App\Models\Profile;
use App\Models\Direction;
use App\Models\HomeBanner;
use App\Models\LatestNews;
use App\Models\HomeSection;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Models\GeneralPolicy;
use App\Models\CalendarEvents;
use App\Models\ProfesionalDev;
use Illuminate\Support\Carbon;
use App\Models\MissionObjectif;
use App\Models\SupportServices;

class FrontController extends Controller
{
    //Return banner page
    // public function banner(){
    //     $banners = HomeBanner::orderBy('created_at', 'desc')->first();
    //     return view('partials._banner', ['banners' => $banners]);
    // }
    //Return index page
    public function index(){

        $banners = HomeBanner::orderBy('created_at', 'desc')->first();
        $intro = HomeSection::where('section_name', 'intro')->first();
        $service = HomeSection::where('section_name', 'service')->first();
        $mission = HomeSection::where('section_name', 'mission')->first();
        $plaidoyer = HomeSection::where('section_name', 'plaidoyer')->first();
        $latestNews = LatestNews::orderBy('created_at','desc')->get();
        $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        
        return view('index')->with([
            'banners' => $banners,
            'intro' => $intro,
            'service' => $service,
            'mission' => $mission,
            'plaidoyer' => $plaidoyer,
            'latestNews' => $latestNews,
            'site_settings' => $site_settings,
        ]);
    }
    //Return about page
    public function about(){
        $missions = MissionObjectif::orderBy('created_at', 'asc')->paginate(10);
        $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        return view('about', ['missions' => $missions, 'site_settings' => $site_settings]);
    }
    public function direction(){
        $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $directions = Direction::orderBy('created_at', 'asc')->paginate(10);
        return view('direction', ['directions' => $directions, 'site_settings' =>  $site_settings]);
    }
    //Return about page
    public function campagnes(){
        $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        return view('campagnes', compact('site_settings'));
    }
    //Return about page
    public function contact(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        return view('contact', compact('site_settings'));
    }
    //Return about page
    public function development(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $profesionals = ProfesionalDev::orderBy('created_at', 'asc')->paginate(10);
        return view('development', compact('profesionals', 'site_settings'));
    }

    // readmore page
    public function readmore($id){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $profesional = ProfesionalDev::where('id', $id)->orderBy('created_at', 'asc')->first();
        return view('readmore', compact('profesional', 'site_settings'));
    }
    //Return events page
    public function events(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $events = CalendarEvents::orderBy('created_at', 'asc')->paginate(10);

        // Create empty arrays for valid and invalid events
        $valid_events = [];
        $invalid_events = [];

        // Loop through the paginated events and check if each event is valid
        foreach ($events as $event) {
            $start_time = Carbon::parse($event->start_time);
            $end_time = Carbon::parse($event->end_time);
            $current_time = Carbon::now();

            $is_valid = $current_time->between($start_time, $end_time);
            if (!$is_valid) {
                // event is still valid
                $valid_events[] = $event;
            } else {
                // event has ended or hasn't started yet
                $invalid_events[] = $event;
            }
        }

        // Render the valid and invalid events in your view
        return view('events',[
            'valid_events' => $valid_events,
            'invalid_events' => $invalid_events,
            'events' => $events,
            'site_settings' => $site_settings,
        ]);
    }

    //Return about page
    public function faq(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $faqs = Faq::orderBy('created_at', 'asc')->paginate(10);
        return view('faq', compact('faqs', "site_settings"));
    }
    //Return about page
    public function login(){
        return view('login');
    }
    //Return about page
    public function members_info(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $users = User::all();
        
        return view('members_info', ['users' => $users, "site_settings" =>  $site_settings]);
    }
    //Return about page
    public function membership(){
        return view('membership');
    }
    //Return news page
    public function news(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $latestNews = LatestNews::orderBy('created_at', 'asc')->paginate(10);
        return view('news', ['latestNews' => $latestNews, 'site_settings' =>  $site_settings]);
    }
    //Return about page
    public function policy(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $policies = GeneralPolicy::orderBy('created_at', 'asc')->paginate(10);
        return view('policy', compact('policies', 'site_settings'));
    }
    //Return about page
    public function support(){
         $site_settings = SiteSettings::orderBY('created_at', 'desc')->first();
        $services = SupportServices::orderBy('created_at', 'asc')->paginate(10);
        return view('support', compact('services', 'site_settings'));
    }

}
