<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workhour;
use App\Models\Breaktime;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function startWork()
    {
        $workHour = new WorkHour();
        $workHour->start_time = Carbon::now();
        $workHour->save();

        return redirect('/');
    }

    public function endWork()
    {
        $workHour = WorkHour::latest()->first();

        if ($workHour) {
            $workHour->start_time = Carbon::now();
            $workHour->save();
        }

        return redirect('/');
    }

    public function startBreak()
    {
        $breaktime = new Breaktime();
        $breaktime->start_time = Carbon::now();
        $breaktime->save();

        return redirect('/');
    }

    public function endBreak()
    {
        $breaktime = Breaktime::latest()->first();

        if ($breaktime) {
            $breaktime->end_time = Carbon::now();
            $breaktime->save();
        }

        return redirect('/');
    }
}
