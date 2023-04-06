<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Users registered today
        $todayUsers = User::whereDate('created_at', today())->count();
        //Users registered monthly
        $todayMonthUsers = User::whereYear('created_at', '=', today()->year)->whereMonth('created_at', '=', today()->month)->count();
        //Total Users
        $totalUser = User::count();
        if ($request->ajax()) {
            return response()->json([
                'todayUsers' => $todayUsers,
                'todayMonthUsers' => $todayMonthUsers,
                'totalUser' => $totalUser 
            ]);
        }
        return view("dashboard.home");
    }



    public function getMonthlyUsers()
    {
        $users = User::selectRaw('count(*) as users_count, MONTH(created_at) as month')
                    ->groupBy('month')
                    ->get();

        $labels = [];
        $data = [];
        foreach ($users as $user) {
            // $labels[] = Carbon::create()->month($user->month)->format('F');
            // $labels[] = Carbon::create()->month($user->month)->locale('fr')->format('F');
            $labels[] = Carbon::create()->month($user->month)->locale('fr')->isoFormat('MMMM');

            $data[] = $user->users_count;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }


}
