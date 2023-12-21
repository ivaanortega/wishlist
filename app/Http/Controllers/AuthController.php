<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {

        //trycatch

       try{
            $user = Socialite::driver('google')->user();
        
            $finduser = User::where('google_id', $user->id)->first();
    
            if($finduser){
    
                Auth::login($finduser);
    
                
    
            }else{
                //check if user already exists in our database
                $registeredUser = User::where('email', $user->email)->first();
                if($registeredUser){
                    $registeredUser->google_id = $user->id;
                    $registeredUser->save();
                    $newUser = $registeredUser;
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
                }
                
    
                Auth::login($newUser);
    
            }
            
        }catch (Exception $e) {
            //escribir un log en cosola con el error
            error_log($e->getMessage());
        }
        
        return redirect()->intended('lists');
       
           
      
       
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}




