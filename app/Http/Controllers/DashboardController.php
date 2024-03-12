<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\task;
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

        $member_task = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $date])->orderBy('count', 'DESC')->limit(1)->first();

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
}
