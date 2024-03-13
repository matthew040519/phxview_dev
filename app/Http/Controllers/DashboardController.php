<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\task;
use App\Models\package;
use App\Models\member_package;
use App\Models\memberincome;
use App\Models\membertask;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function province()
    {
        $city_id = Request()->city_id;

        $brgy = Http::get("https://psgc.gitlab.io/api/cities-municipalities/$city_id/barangays/");

        // $brgyData['data'] = $brgy;

        return $brgy;
        
    }

    public function memberdashboard()
    {
        $params = [];

        $params['task'] = task::all();

        return view('member.index');
    }

    public function getTaskData()
    {
        $params = [];

        $date = Carbon::now()->timezone('Asia/Manila')->format('Y-m-d');

        $member_task = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $date])->orderBy('id', 'DESC')->limit(1)->first();

        $count_task = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $date])->count();

        if($count_task > 0)
        {
            $task_id = $member_task->task_id + 1;

            $task = task::where('id', $task_id)->first();
        }
        else
        {
            $task = task::limit(1)->first();
        }

        $params['task'] = $task;

        return json_encode($params);
    }

    public function insertMemberTask()
    {
        $task_id = Request()->id;

        $tdate = Carbon::now()->timezone('Asia/Manila')->format('Y-m-d');

        $member_task_count = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $tdate])->count();
        $member_task = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $tdate])->first();
        $member_task_max = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $tdate])->max('count');
        $member_task_batch = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $tdate])->max('batch');
        $batch = 1;
        $count = 0;

        if($member_task_count > 0)
        {
            $member_task_count = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $tdate, 'batch' => $member_task_batch])->count();
            if($member_task->batch == "" || $member_task_count <= 2)
            {
                $batch = $member_task_batch;
            }
            else 
            {
                $batch = $member_task_batch += 1;
            }
        }

        if($member_task_max == "")
        {
            $count = 1;
        } else {
            $member_task_max = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $tdate, 'batch' => $member_task_batch])->max('count');
            $count = $member_task_max + 1;
        }

        membertask::create([
            'member_id' => Auth::user()->id,
            'batch' => $batch, 
            'task_id' => $task_id,
            'tdate' => $tdate,
            'count' => $count
        ]);

        return response()->json([
            'success' => true,
            'count' => $count,
            'batch' => $batch,
        ], 200);
    }

    public function memberIncome()
    {
        $batch = Request()->batch;

        $tdate = Carbon::now()->timezone('Asia/Manila')->format('Y-m-d');

        $member_package = member_package::where(['active' => 1, 'username' => Auth::user()->member->username])->first();
        $package = package::where('id', $member_package->package_id)->first();

        memberincome::create([
            'member_id' => Auth::user()->id,
            'batch' =>  $batch, 
            'tdate' =>  $tdate,
            'income' => $package->dc_token
        ]);

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function RewardsWallet()
    {
        $memberincomes = memberincome::select('income')->where('member_id', Auth::user()->id)->sum('income');

        return response()->json([
            'success' => true,
            'total_income' => number_format($memberincomes, 2),
        ], 200);
    }
}
