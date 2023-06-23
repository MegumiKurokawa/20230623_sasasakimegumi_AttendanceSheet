<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workhour;
use App\Models\Breaktime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('index');
    }

       public function store(Request $request)
    {
       if (Auth::check()) {
       
            // POSTデータからボタンの種類を判定
            $buttonType = $request->input('buttonType');

            if ($buttonType === 'startWork') {
                // 開始時刻を保存する処理
                $workhour = new Workhour();
                $workhour->start_time = Carbon::now();
                $workhour->save();
            } elseif ($buttonType === 'endWork') {
                // 終了時刻を保存する処理
                $workhour = Workhour::latest()->first();
                $workhour->end_time = Carbon::now();
                $workhour->save();
            } elseif ($buttonType === 'startBreak') {
                // 休憩開始時刻を保存する処理
                $breaktime = new Breaktime();
                $breaktime->start_time = Carbon::now();
                $breaktime->save();
            } elseif ($buttonType === 'endBreak') {
                // 休憩終了時刻を保存する処理
                $breaktime = Breaktime::latest()->first();
                $breaktime->end_time = Carbon::now();
                $breaktime->save();
            }
        }
        return redirect('/');
    }

}
