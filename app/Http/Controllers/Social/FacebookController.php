<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\File;

class FacebookController extends Controller
{
     // Login with Facebook
     public function facebookRedirect() {
        return Socialite::driver('facebook')->redirect();
    }
    // Facebook callback
    public function facebookLogin() {
        $user = Socialite::driver('facebook')->user();
         // lấy avatar
            // $avatar = $user->avatar_original . "&access_token={$user->token}";
            // $created_at = $updated_at = date('Y-m-d H:i:s');
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->getId())->first();
            // check user có tồn tại trong hệ thống hay không
            if($isUser) {
                Auth::login($isUser);
                return redirect('/')->with('status','Đăng nhập với Facebook thành công!');
            } else {
                $avatar_file_name = 'testFacebook';
                if(!empty($user->getAvatar()) && $user->getAvatar()!='' && $user->getAvatar() != null)
                {
                    $fileContents = file_get_contents($user->getAvatar());
                    File::put(base_path() . '/public/uploads/userImg' . '/' . $user->getId() . ".jpg", $fileContents);
                }
                $avatar_file_name =  $user->getId() . ".jpg";

                $createUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'facebook_id' => $user->getId(),
                    'role' => '0',
                    'image' => $avatar_file_name,    
                ]);
    
                Auth::login($createUser);
                return redirect('/')->with('status','Đăng nhập với Facebook thành công!');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage()); // nếu lỗi thì in thông báo lỗi
        }
    } 
}
