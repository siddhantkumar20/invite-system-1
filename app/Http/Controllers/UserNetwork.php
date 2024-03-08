<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Network;

use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserNetwork extends Controller
{
    public function loadPage()
    {
        return view('welcome');
    }

    public function totalDisplay()
    {
        return view('total');
    }

    public function getData()
    {
        $network = Network::all();
        $count = Network::count();
        return response()->json([
            'count'=>$count,
            'network'=>$network
        ]);
    }

    public function admin()
    {
        $network = Network::all();
        $data = compact('network');
        return view("admin")->with($data);
    }

    public function loadRegister()
    {
        return view("register");
    }


    //Registration
    public function registered(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // Provide Code
        $inviteCode = Str::random(10);
    
        if(isset($request->invite_code)){

            $userData = User::where('invite_code',$request->invite_code)->get();
            if(count($userData) > 0){
                $user_id = User::insertGetId([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'invite_code' => $inviteCode,
                ]);

                Network::insert([
                    'invite_code' => $request->invite_code,
                    'user_id' => $user_id,
                    'user_name' => $request->name,
                    'user_email' => $request->email,
                    'parent_user_id' => $userData[0]['id'],
                    'parent_user_name' => $userData[0]['name'],
                    'parent_user_email' => $userData[0]['email'],
                    'using' => $request->using
                ]);
            }
            else{
                return back()->with('error','Please provide valid invite code');
            }
        }else{
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'invite_code' => $inviteCode
            ]);
        }

        //Send Mail with Information
        $domain = URL::to('/');
        $url1 = $domain.'/invite-register?ref='.$inviteCode;
        $url2 = $domain.'/register';

        $data['url1'] = $url1;
        $data['url2'] = $url2;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['inviteCode'] = $inviteCode;
        $data['title'] = 'Registered';
        
        Mail::send('emails.registerMail',['data'=> $data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });

        return back()->with('success','You have been registered');
    }

    // Register Using Link
    public function loadInviteRegister(Request $request)
    {
        if(isset($request->ref)){
            $invite = $request->ref;
            $userData = User::where('invite_code',$invite)->get();

            if(count($userData) > 0){
                return view('inviteregister',compact('invite'));
            }else{
                return view('404');
            }
        }else{
            return redirect('/');
        }
    }

    // Login function
    public function loadLogin()
    {
        return view('login');
    }


    // Login using credentials
    public function userLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $userData = User::where('email',$request->email)->first();
        if (!$userData) 
        {
            return back()->with('error', 'Not Registered');
        }

        else 
        {
            if(Hash::check($request->password,$userData->password))
            {
                $request->session()->put('id',$userData->id);
                return redirect("dashboard/{$userData->id}");
            }
            
            else
            {
                return back()->with('error', 'Incorrect Password');
            }
        }
    }


    public function loadDashboard($id){
        $userData = User::find($id);

    if (!$userData) {
        return redirect('/')->with('error', 'User not found');
    }

    $network = Network::where('parent_user_id', $id)->get();
    $data = compact('network');
    return view('dashboard', ['userData' => $userData])->with($data);
    }


    public function sendInvite($id, Request $request)
    {
        $request->validate([
            'email'=>'required|email',
        ]);

        $userData = User::where('id',$id)->first();
        $inviteCode = $userData->invite_code;
        //Send Mail with Information
        $domain = URL::to('/');
        $url1 = $domain.'/invite-register?ref='.$inviteCode;
        $url2 = $domain.'/register';

        $data['url1'] = $url1;
        $data['url2'] = $url2;
        $data['email'] = $request->email;
        $data['inviteCode'] = $inviteCode;
        $data['sendername'] = $userData->name;
        $data['sender'] = $userData->email;
        $data['title'] = 'Invitation';
        
        Mail::send('emails.sendInviteMail',['data'=> $data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });

        return back()->with('success','Invitation Sent !!');
    }
}
