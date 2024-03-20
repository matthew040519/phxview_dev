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
use App\Models\directinvite;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\conversion;
use App\Models\unilevel;

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

        $params['member_package'] = member_package::where(['username' => Auth::user()->member->username, 'active' => 1])->first();

        $params['task'] = task::all();

        return view('member.index')->with('params', $params);
    }

    public function getTaskData()
    {
        $params = [];

        $member_task_id = Request()->task_id;

        $date = Carbon::now()->timezone('Asia/Manila')->format('Y-m-d');

        $member_task = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $date])->orderBy('id', 'DESC')->limit(1)->first();

        $count_task = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $date])->count();

        $max_count = membertask::where(['member_id' => Auth::user()->id, 'tdate' => $date, 'batch' => 10])->max('count');

        if($count_task > 0 )
        {
            if($member_task->batch == 10 && $max_count == 3)
            {
                return response()->json([
                    'success' => false,
                    'status' => "No task Available!",
                ], 200);
            } 
            else 
            {
                $task_id = $member_task->task_id + 1;

                $task = task::where('id', $task_id)->first();
                if($task == NULL)
                {
                    $task = task::where('id', $member_task_id)->first();
                }
            }
        }
        else
        {
            $task = task::limit(1)->first();
        }

        $params['task'] = $task;

        return response()->json([
            'success' => true,
            'task' => $task,
        ], 200);
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

        $conversion = conversion::select('withdraw')->where(['member_id' => Auth::user()->id, 'type' => 'PHX TOKEN'])->sum('withdraw');

        $total = floor($memberincomes) - floor($conversion);

        return response()->json([
            'success' => true,
            'total_income' => $total,
        ], 200);
    }

    public function Token()
    {
        $conversion = conversion::select('conversion')->where(['member_id' => Auth::user()->id, 'type' => 'PHX TOKEN'])->sum('conversion');
        $aznt = conversion::select('conversion')->where(['member_id' => Auth::user()->id, 'type' => 'AZNT TOKEN'])->sum('conversion');
        $aznt_bal = conversion::select('withdraw')->where(['member_id' => Auth::user()->id, 'type' => 'AZNT TOKEN'])->sum('withdraw');
        $emarket = conversion::select('conversion')->where(['member_id' => Auth::user()->id, 'type' => 'E-Wallet'])->sum('conversion');
        $emarket_bal = conversion::select('withdraw')->where(['member_id' => Auth::user()->id, 'type' => 'E-Wallet', 'transfer' => 0])->sum('withdraw');
        $withdrawal_bal = conversion::select('withdraw')->where(['member_id' => Auth::user()->id, 'type' => 'WITHDRAW AZNT'])->sum('withdraw');
        $sponsor = directinvite::where('sponsor', Auth::user()->member->username)->sum('amount');
        $unilevel = unilevel::where('username', Auth::user()->member->username)->sum('amount');

        $totalconversion = $conversion - ($aznt_bal + $emarket_bal);

        return response()->json([
            'success' => true,
            'conversion' => (float)$totalconversion,
            'aznt' => floatval($aznt),
            'emarket' => floatval($emarket),
            'withdrawal' => floatval($withdrawal_bal),
            'sponsor' => floatval($sponsor),
            'unilevel' => floatval($unilevel),
        ], 200);
    }

    public function games()
    {
        return view('member.games');
    }

    public function ds_to_dc(Request $request)
    {
        $validated = $request->validate([
            'convert' => 'required|max:255',
            'balance' => 'required',
        ]);

        $convert = $request->convert;
        $balance = $request->balance;

        if($convert > $balance)
        {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }

        $tdate = Carbon::now()->timezone('Asia/Manila')->format('Y-m-d');
        
        memberincome::create([
            'member_id' => Auth::user()->id,
            'batch' =>  1, 
            'tdate' =>  $tdate,
            'income' => $request->convert,
            'type' => 1
        ]);

        directinvite::create([
            'sponsor' => Auth::user()->member->username,
            'username' => Auth::user()->member->username,
            'amount' => -$convert,
            'type' => 1,
        ]);

        return redirect()->back()->with('status', 'Transfer Successfully')->with('color', 'success');

    }

    public function unilevel_to_dc(Request $request)
    {
        $validated = $request->validate([
            'convert' => 'required|max:255',
            'balance' => 'required',
        ]);

        if($request->convert > $request->balance)
        {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }

        $tdate = Carbon::now()->timezone('Asia/Manila')->format('Y-m-d');

        unilevel::create([
            'member_id' => Auth::user()->id,
            'username' => Auth::user()->member->username,
            'amount' => -$request->convert
        ]);

        memberincome::create([
            'member_id' => Auth::user()->id,
            'batch' =>  1, 
            'tdate' =>  $tdate,
            'income' => $request->convert,
            'type' => 1
        ]);

        return redirect()->back()->with('status', 'Transfer Successfully')->with('color', 'success');
    }
}
