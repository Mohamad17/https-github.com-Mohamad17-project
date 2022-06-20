<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\ParsGreenService;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm(){
        return view('customer.auth.login-register');
    }

    public function LoginRegister(LoginRegisterRequest $request){
        $input= $request->all();
        if(filter_var($input['id'], FILTER_VALIDATE_EMAIL)){
            $type= 1; //1=>email
            $user= User::where('email', $input['id'])->first();
            if(empty($user)){
                $newUser['email'] = $input['id'];
            }
        }elseif(preg_match('/^09[0-9]{9}$/', $input['id'])){
            $type= 0; //0=>mobile
            $user= User::where('mobile', $input['id'])->first();
            if(empty($user)){
                $newUser['mobile'] = $input['id'];
            }
        }else{
            $errorText= 'شناسه وارد شده نه موبایل است و نه ایمیل';
            return redirect('customer.auth.login-register-form')->withErrors(['id'=>$errorText]);
        }

        if(empty($user)){
            $newUser['password'] = '15953648';
            $newUser['activation'] = 1;
            $newUser['user_type'] = 0;
            $user= User::create($newUser);
        }

        //send sms or email
        if($type==0){
            //send sms
            $otp= ParsGreenService::sendOtp($newUser['mobile']);

            //send email
        }elseif($type==1){
            $otp= rand(111111, 999999);
            $emailService= new EmailService();
            $details= [
                'title'=>'ایمیل ورود به سایت آمازون',
                'body'=>"کد ورود به فروشگاه آمازون : $otp"
            ];
            $emailService->setFrom('noreply@exalmple.com', 'example');
            $emailService->setDetails($details);
            $emailService->setTo($input['id']);
            $emailService->setSubject('کد احراز هویت');

            $messageService= new MessageService($emailService);
            $messageService->send();
        }
        // dd($otp);

         //create otp code
         $token= Str::random(64);
         $otpInputs=[
             'token'=>$token,
             'otp_code'=>$otp,
             'user_id'=>$user->id,
             'type'=>$type,
             'login_id' => $input['id'],
         ];
         Otp::create($otpInputs);

         return redirect()->route('customer.auth.login-confirm-form', $token);
    }

    public function loginConfirmForm($token){
        $otp= Otp::where('token', $token)->first();
        if(empty($otp)){
            $errorText= 'آدرس وارد شده معتبر نمی باشد';
            return redirect('customer.auth.login-register-form', $token)->withErrors(['id'=>$errorText]);
        }
        return view('customer.auth.login-confirm', compact('token', 'otp'));
    }
    
    public function loginConfirm(Request $request,$token){
        $request->validate([
            'confirm-code' => 'required'
        ]);
       
        $input= $request->all();

        $otp= Otp::where('token', $token)->where('used', 0)->where('created_at', '>=', Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if(empty($otp)){
            $errorText= 'آدرس وارد شده معتبر نمی باشد';
            return back()->withErrors(['id'=>$errorText]);
        }

        if($otp->otp_code!==$input['confirm-code']){
            $errorText= 'کد تأیید صحیح نمی باشد';
            return back()->withErrors(['id'=>$errorText]);
        }
        $otp->update(['used'=>1]);
        $user= $otp->user()->first();
        if($otp->type==0 && empty($user->mobile_verified_at)){
            $user->update(['mobile_verified_at'=> Carbon::now()]);
        }elseif($otp->type==1 && empty($user->email_verified_at)){
            $user->update(['email_verified_at'=> Carbon::now()]);
        }
        
        Auth::login($user);
        return redirect()->route('customer.home');

    }

    public function loginResendOtp($token){
        $perviuosOtp= Otp::where('token', $token)->where('used', 0)->where('created_at', '<=', Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if(empty($perviuosOtp)) return redirect()->route('customer.auth.login-register-form')->withErrors(['token'=> 'آدرس وارد شده نا معتبر است']);
        
        $user= $perviuosOtp->user()->first();
        $type= $perviuosOtp->type;

        //send sms or email
        if($type==0){
            //send sms
            $otp= ParsGreenService::sendOtp($user['mobile']);

            //send email
        }elseif($type==1){
            $otp= rand(111111, 999999);
            $emailService= new EmailService();
            $details= [
                'title'=>'ایمیل ورود به سایت آمازون',
                'body'=>"کد ورود به فروشگاه آمازون : $otp"
            ];
            $emailService->setFrom('noreply@exalmple.com', 'example');
            $emailService->setDetails($details);
            $emailService->setTo($perviuosOtp->login_id);
            $emailService->setSubject('کد احراز هویت');

            $messageService= new MessageService($emailService);
            $messageService->send();
        }
        // dd($otp);

         //create otp code
         $token= Str::random(64);
         $otpInputs=[
             'token'=>$token,
             'otp_code'=>$otp,
             'user_id'=>$user->id,
             'type'=>$type,
             'login_id' => $perviuosOtp->login_id,
         ];
         Otp::create($otpInputs);

         return redirect()->route('customer.auth.login-confirm-form', $token);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('customer.home');
    }
}
