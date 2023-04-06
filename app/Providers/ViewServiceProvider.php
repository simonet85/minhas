<?php

namespace App\Providers;

use App\Models\CalendarEvents;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Define a view composer for the news view
        View::composer('news', function ($view) {
           // Get the valid events             
           $events = CalendarEvents::orderBy('created_at', 'desc')->paginate(10);

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
            // Share the valid events with the news view  
            $view->with(['validEvents' => $valid_events, 'invalidEvents'=> $invalid_events]); 
         }); 
        
    }
}
