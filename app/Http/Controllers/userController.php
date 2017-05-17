<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

class userController extends Controller
{

    public function postSignUp(Request $request)
    {
          $this->validate($request, [
               'email' => 'required|email|unique:users',
               'firstName' => 'required|max:120',
               'password' => 'required|min:4'
          ]);

          $email = $request['email'];
          $firstName = $request['firstName'];
          $password = bcrypt($request['password']);

          $user = new User();
          $user->email = $email;
          $user->firstName = $firstName;
          $user->password = $password;

          $user->save();

          Auth::login($user);

          return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {
         $this->validate($request, [
              'email' => 'required',
              'password' => 'required'
         ]);
         if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
              return redirect()->route('dashboard', compact('message'));
         }
         return redirect()->back();
    }

    public function getLogOut()
    {
         Auth::logout();

         return redirect()->route('home');
    }

    public function getAcount()
    {
         return view('account', ['user' => Auth::user()]);
    }

    public function postSaveAccount(Request $request)
    {
         $user = Auth::user();
         $user->firstName = $request['first_name'];
         $updateUser = $user->update();

         if($updateUser){
            $message = 'The account Successfully updated';
          }
         return redirect()->route('account')->with(['message' => $message]);
    }

}
