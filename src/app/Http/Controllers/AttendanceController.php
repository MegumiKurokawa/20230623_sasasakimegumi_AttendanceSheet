<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workhour;
use App\Models\Breaktime;
use Carbon\Carbon;
use illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $latestWorkHour = Workhour::where('user_id', $user->id)->whereDate('date', Carbon::today())->latest()->first();

        $latestBreakTime = ['start_time' => false];

        if ($latestWorkHour) {
            $latestBreakTime = Breaktime::where('workhour_id', $latestWorkHour->id)->latest()->first();
        }

        return view('index', ['user' => $user, 'latestWorkHour' => $latestWorkHour, 'latestBreakTime' => $latestBreakTime]);
    }

    public function startWork()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $latestWorkHour = Workhour::where('user_id', $user->id)->whereDate('date', Carbon::today())->latest()->first();

            if (!$latestWorkHour) {
                $workHour = new Workhour();
                $workHour->start_time = Carbon::now();
                $workHour->date = Carbon::today()->format('Y-m-d');
                $workHour->user_id = $user->id;
                $workHour->save();
            }

            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function endWork()
    {
        $user = Auth::user();
        $latestWorkHour = Workhour::where('user_id', $user->id)->whereDate('date', Carbon::today())->latest()->first();

        if ($latestWorkHour) {
            $latestWorkHour->end_time = Carbon::now();
            $latestWorkHour->date = Carbon::today()->format('Y-m-d');
            $latestWorkHour->save();
        }

        return redirect('/');
    }

    public function startBreak()
    {
        $user = Auth::user();
        $latestWorkHour = Workhour::where('user_id', $user->id)->whereDate('date', Carbon::today())->latest()->first();

        $latestBreakTime = null;

        if ($latestWorkHour) {
            $latestBreakTime = Breaktime::where('workhour_id', $latestWorkHour->id)->latest()->first();
        }

        if ($latestWorkHour && !$latestWorkHour->end_time) {
            $breaktime = new Breaktime();
            $breaktime->start_time = Carbon::now();
            $breaktime->end_time = Carbon::now();
            $breaktime->workhour_id = $latestWorkHour->id;
            $breaktime->save();
        }

        return redirect('/');
    }

    public function endBreak()
    {
        $user = Auth::user();
        $latestWorkHour = Workhour::where('user_id', $user->id)->whereDate('date', Carbon::today())->latest()->first();

        $latestBreakTime = null;

        if ($latestWorkHour) {
            $latestBreakTime = Breaktime::where('workhour_id', $latestWorkHour->id)->latest()->first();
        }

        if ($latestWorkHour && !$latestWorkHour->end_time && $latestBreakTime && $latestBreakTime->start_time) {
            $latestBreakTime->end_time = Carbon::now();
            $latestBreakTime->workhour_id = $latestWorkHour->id;
            $latestBreakTime->save();
        }

        return redirect('/');
    }
}
