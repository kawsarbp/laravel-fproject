<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

//use Dotenv\Validator;
use App\Http\Requests\UserRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function singlepost()
    {
        return view('frontend.single-post');
    }

//    user register
    public function userRegister()
    {
        return view('frontend.auth.register');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
//            'photo' => 'required|image',
            'password' => 'required|confirmed',
        ]);

        /*$photo = $request->file('photo');
        if ($photo->isValid()) {
            $file_name = rand(11111111, 99999999) . date('ydmhis.') . $photo->getClientOriginalExtension();
            $photo->storeAs('photo',$file_name);
        }*/

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Success');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();

    }

//    user login
    public function userLogin()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        if (auth()->attempt($data)) {
            return redirect('/');
        } else {
            session()->flash('type','danger');
            session()->flash('message','Dose not match!');
            return redirect()->back();
        }
    }
//    logout
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
