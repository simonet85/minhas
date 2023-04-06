<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvents;
use Illuminate\Http\Request;

class CalendarEventsController extends Controller
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
    
    public function index(Request $request)
    {
        $formatted_events = [];
        if ($request->ajax()) {
            $events = CalendarEvents::all();
            foreach ($events as $event) {
                $formatted_events[] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start_time,
                    'end' => $event->end_time,
                    'description' => $event->description,
                    'action' => [
                        'delete' => route('calendarevents.destroy', $event->id),
                        'show' => route('calendarevents.show', $event->id),
                        'edit' => route('calendarevents.edit', $event->id),
                    ],
   
                ];
            }
            return response()->json($formatted_events);
        }        

      
        return view("dashboard.home");
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
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
            'title.required' => 'Le champ titre est requis.',
            'description.required' => 'Le champ description est requis.',
            'start_time.required' => 'Le champ heure de début est requis.',
            'start_time.date' => 'Le champ heure de début doit être une date valide.',
            'end_time.required' => 'Le champ heure de fin est requis.',
            'end_time.date' => 'Le champ heure de fin doit être une date valide.',
            'end_time.after' => 'Le champ heure de fin doit être postérieure à l\'heure de début.',
        ]);
        

        $event = CalendarEvents::create($request->all());

        return redirect()->route("calendarevents.create")->with('success', 'Événements créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalendarEvents  $calendarEvents
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = CalendarEvents::find($id);
        return view("dashboard.home")->with("event", $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalendarEvents  $calendarEvents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = CalendarEvents::find($id);
        return view("dashboard.calendarevents-edit")->with("event", $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalendarEvents  $calendarEvents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
            'title.required' => 'Le champ titre est requis.',
            'description.required' => 'Le champ description est requis.',
            'start_time.required' => 'Le champ heure de début est requis.',
            'start_time.date' => 'Le champ heure de début doit être une date valide.',
            'end_time.required' => 'Le champ heure de fin est requis.',
            'end_time.date' => 'Le champ heure de fin doit être une date valide.',
            'end_time.after' => 'Le champ heure de fin doit être postérieure à l\'heure de début.',
        ]);

        $event = CalendarEvents::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->save();
        
        return redirect()->back()->with("success", "Événement modifier avec succés!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalendarEvents  $calendarEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = CalendarEvents::find($id)->delete();

    	return redirect()->back()->with("success", "Événement supprimé avec succés!");
    }
}
