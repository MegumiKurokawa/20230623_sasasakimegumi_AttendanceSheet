<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workhour;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Breaktime;

class DateController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->format('Y-m-d'));
        $carbonDate = Carbon::createFromFormat('Y-m-d', $date);

        if ($request->has('forward')) {
            $carbonDate->addDay();
        } elseif ($request->has('back')) {
            $carbonDate->subDay();
        }

        $workhours = Workhour::with('user')->where('date', $carbonDate->format('Y-m-d'))->paginate(5);


        $users = User::all();
        $totalBreaks = [];
        foreach ($workhours as $workhour) {
            $breaktimes = Breaktime::where('workhour_id', $workhour->id)->get();
            $totalBreakSeconds = 0;
            foreach ($breaktimes as $breaktime) {
                $endTime = new Carbon($breaktime->end_time);
                $startTime = new Carbon($breaktime->start_time);
                $diffInSeconds = $endTime->diffInSeconds($startTime);
                $totalBreakSeconds += $diffInSeconds;
            }

            $hours = floor($totalBreakSeconds / 3600);
            $minutes = floor(($totalBreakSeconds % 3600) / 60);
            $seconds = $totalBreakSeconds % 60;
            $totalBreaks = "$hours:$minutes:$seconds";
            $workhour->breaktime = $totalBreaks;
       

        $totalWorks = [];
            $totalWorkSeconds = 0;
                $endWork = new Carbon($workhour->end_time);
                $startWork = new Carbon($workhour->start_time);
                $diffWorkSeconds = $endWork->diffInSeconds($startWork);
                $totalWorkSeconds = $diffWorkSeconds - $totalBreakSeconds;


        $totalHours = floor($totalWorkSeconds / 3600);
        $totalMinutes = floor(($totalWorkSeconds % 3600) / 60);
        $totalSeconds = $totalWorkSeconds % 60;
        $totalWorks = "$totalHours:$totalMinutes:$totalSeconds";
        $workhour->worktime = $totalWorks;
        }

        return view('date', compact('workhours', 'carbonDate', 'users', 'totalBreaks'));
    }
}
