<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $unreadNotifications = $user->unreadNotifications; 
        $unreadCount = $unreadNotifications->count();
        // $only5unreadNotifs = $unreadNotifications->take(5)->get();

        if ($request->ajax()) {
            return response()->json([
                "unreadNotifications" => $unreadNotifications,
                // "only5unreadNotifs" => $only5unreadNotifs,
                "unreadCount" => $unreadCount
            ]);
        }
        return view('dashboard.home',["notifications" => $unreadNotifications]);


        // $notifications = [];
        // foreach ($user->unreadNotifications as $notification) {
        //     $notifications = $notification->type;
        // }
    }


        public function markAsRead($notification ){

            $user = auth()->user();
            $notification = $user->unreadNotifications->where('id',$notification);
            // Mark Notification as Read
            $notification->markAsRead();
    
            // Mark all notifications as read

            // return response()->json([
            //     'success' => true,
            //     'unreadNotifications' => $user->unreadNotifications,
            //     'notification' => $notification,
                // "request" => $request->user_id,
                // 'notification_id' => $notification_id,
            // ]);
            return redirect()->back();
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
