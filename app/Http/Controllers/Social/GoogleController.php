<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class GoogleController extends Controller
{
    // Login with Google
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function googleLogin() {
        // $user = Socialite::driver('google')->user();
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->getId())->first();
            if($isUser) {
                Auth::login($isUser);
                return redirect('/')->with('status','Đăng nhập với Google thành công!');
            } else {
                $avatar_file_name = 'testGoogle';
                if(!empty($user->getAvatar()) && $user->getAvatar()!='' && $user->getAvatar() != null) {
                    $fileContents = file_get_contents($user->getAvatar());
                    File::put(base_path() . '/public/uploads/userImg' . '/' . $user->getId() . ".jpg", $fileContents);
                }
                $avatar_file_name =  $user->getId() . ".jpg";

                $createUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'role' => '0',
                    'image' => $avatar_file_name,    
                ]);
    
                Auth::login($createUser);
                return redirect('/')->with('status','Đăng nhập với Google thành công!');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    } 
}
