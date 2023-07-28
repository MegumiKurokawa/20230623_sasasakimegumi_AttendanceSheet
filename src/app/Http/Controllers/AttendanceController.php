<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workhour;
use App\Models\Breaktime;
use Carbon\Carbon;
use illuminate\Support\Facades\Auth;
use App\Models\User;


class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('index', compact('user'));
    }

    public function startWork()
    {
        if(Auth::check()) {
            $user = Auth::user();

        $workHour = new WorkHour();
        $workHour->start_time = Carbon::now();
        $workHour->user_id = $user->id;
        $workHour->save();

        return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function endWork()
    {
        $workHour = WorkHour::latest()->first();

        if ($workHour) {
            $workHour->end_time = Carbon::now();
            $workHour->save();
        }

        return redirect('/');
    }

    public function startBreak()
    {
        $user = Auth::user();
        $workHour = Workhour::where('user_id', $user->id)->latest()->first();

        $breaktime = new Breaktime();
        $breaktime->start_time = Carbon::now();
        $breaktime->workhour_id = $workHour->id;
        $breaktime->save();

        return redirect('/');
    }

    public function endBreak()
    {
        $user = Auth::user();
        $workHour = Workhour::where('user_id', $user->id)->latest()->first();
        
        $breaktime = Breaktime::latest()->first();

        if ($breaktime) {
            $breaktime->end_time = Carbon::now();
            $breaktime->workhour_id = $workHour->id;
            $breaktime->save();
        }

        return redirect('/');
    }
}
