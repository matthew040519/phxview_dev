<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\member;
use App\Models\tree;
use App\Models\directinvite;
use App\Models\member_package;
use App\Models\Province;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required',
                'password' => 'required',
                'user_code' => 'required'
            ]);

            $user_code = $request->user_code;
            $com_code = $request->code;

            if($user_code != $com_code)
            {
                return redirect()->back()->with('status', 'Code Not Match!');
            }

            if($validateUser->fails()){
                return redirect()->back()->with('status', 'Wrong Username or Password!');
                // return response()->json([
                //     'status' => false,
                //     'message' => 'validation error',
                //     'errors' => $validateUser->errors()
                // ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return redirect()->back()->with('status', 'Wrong Username or Password!');
                // return response()->json([
                //     'status' => false,
                //     'message' => 'Email & Password does not match with our record.',
                // ], 401);
            }

            $user = User::where('email', $request->email)->first();

            $request->session()->regenerate();

            if($user->role == 1)
            {
                return redirect()->intended('admin/dashboard');
            } 
            else if($user->role == 0)
            {
                return redirect()->intended('member/memberdashboard');
            }

            

            // return response()->json([
            //     'status' => true,
            //     'data' => $user,
            //     'message' => 'User Logged In Successfully',
            //     'token' => $user->createToken("API TOKEN")->plainTextToken
            // ], 200);

        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Wrong Username or Password!');
            // return response()->json([
            //     'status' => false,
            //     'message' => $th->getMessage()
            // ], 500);
        }
    }

    public function logout()
    {
        Auth::logout();
     
        session()->invalidate();
     
        session()->regenerateToken();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'User Logged Out Successfully',
        // ], 200);
     
        return redirect('/');
    }

    public function register()
    {
        $username = Request()->username;

        $params = [];
        if($username != "")
        {
            $params['username'] = $username;
        }
        else
        {
            $params['username'] = NULL;
        }
        
        $params['province'] = Province::orderBy('name','asc')->get();

        return view('register')->with('params', $params);
    }

    public function addmember(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:members|unique:users,name|max:255',
            'password' => 'required',
            'first_name' => 'required',
            // 'middle_name' => 'required',
            'last_name' => 'required',
            // 'birthday' => 'required',
            // 'gender' => 'required',
            'email' => 'required|unique:members|unique:users',
            // 'contact_number' => 'required',
            // 'province_id' => 'required',
            // 'city_id' => 'required',
            // 'brgy_id' => 'required',
            'sponsor' => 'required|exists:members,username',
            'upline' => ['required', 'exists:members,username',
                Rule::exists('trees')->where(function (Builder $query) {
                    return $query->where('complete', 0);
                }),
            ],
        ]);

        if(User::where('name', $request->first_name.' '.$request->last_name)->count() > 0)
        {
            return redirect()->back()->with('status', 'Name is already taken.')->with('color', 'danger');
        }

        $upline = tree::where('upline', $request->upline)->first();

        if($member_packages = member_package::where(['username' => $request->sponsor, 'active' => 1])->count() == 0){
            return redirect()->back()->with('status', 'Sponsor must setup package.')->with('color', 'danger');
        }

        if($request->position == 'left')
        {
            if($upline->first != "" && $upline->second != "")
            {
                return redirect()->back()->with('status', 'Position is already taken.')->with('color', 'danger');
            }
        }
        else if($request->position == 'right')
        {
            if($upline->third != "" && $upline->fourth != "")
            {
                return redirect()->back()->with('status', 'Position is already taken.')->with('color', 'danger');
            }
        }


        $code = Str::random(8);

        member::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            // 'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            // 'birthday' => $request->birthday,
            // 'gender' => $request->gender,
            'email' => $request->email,
            // 'contact_number' => $request->contact_number,
            // 'province_code' => $request->province_id,
            // 'city_code' => $request->city_id,
            // 'brgy_code' => $request->brgy_id,
            'member_code' => $code,
            'sponsor' => $request->sponsor,
            'upline' => $request->upline,
        ]);

        user::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->username,
            'role' => 0,
            'password' => Hash::make($request->password)
        ]);

        tree::create([
            'upline' => $request->username,
        ]);

        $position = "";

        $upline = tree::where('upline', $request->upline)->first();
        
        if($request->position == 'left')
        {
            if($upline->first == "")
            {
                $position = "first";
            }
            else if($upline->second == ""){
                $position = "second";
            }
        }
        else {
            if($upline->fourth == ""){
                $position = "fourth";
            }
            else if($upline->third == ""){
                $position = "third";
            }
        }
        
        

        tree::where('upline', $request->upline)->update([$position => $request->username]);
        member::where('username', $request->username)->update(['position' => $request->position]);
        $updated_upline = tree::where('upline', $request->upline)->first();
        if($updated_upline->first != "" && $updated_upline->second != "" && $updated_upline->third != "" && $updated_upline->fourth != "")
        {
            tree::where('upline', $request->upline)->update(['complete' => 1]);
        }
        
        return redirect()->back()->with('status', 'Member Add Successfully')->with('color', 'success');

    }
}
