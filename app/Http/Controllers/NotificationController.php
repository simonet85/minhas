<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
      $this->middleware(["auth"]);  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Fetching the unread notifications
        $user = auth()->user();
        $notifications = $user->notifications()->paginate(5); 
        $unreadCount = $notifications->count();
        // $only5unreadNotifs = $unreadNotifications->take(5)->get();

        if ($request->ajax()) {
            return response()->json([
                "unreadNotifications" => $notifications,
                "unreadCount" => $unreadCount
            ]);
        }
        return view('dashboard.home');


    }


    public function markAsRead($notificationId ){
        
        $user = auth()->user();
        // $notifications = $user->unreadNotifications->where('id',$notification)->get();
        // Mark Notification as Read
        $notification = $user->notifications()->find($notificationId);
        // Mark all notifications as read

        if ($notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }

    public function unreadNotificatifications(){
        $user = Auth::user();
        // $unreadNotifications = $user->unreadNotifications;
        $unreadNotifications = $user->unreadNotifications()->paginate(5);

        return view('dashboard.home', compact('unreadNotifications'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
