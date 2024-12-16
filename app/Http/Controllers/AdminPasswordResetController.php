<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerifyToken;
use App\Models\User;
use App\Mail\ResetPassword;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;



class AdminPasswordResetController extends Controller
{
    public function index()
    {
        return view('admin.auth.forgot');
    }
    public function getResetOtp($email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'There is no account with this email address.');
        }
        return view('admin.auth.forgot-token-verify', compact('email'));
    }

    public function sendResetOtp(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|email',
            ]);

            $user = User::where('email', $request->email)->where('role',1)->first();

            if (!$user) {
                return back()->with('error', 'There is no account with this email address.');
            }

            $token = $this->generateToken();
            $existingToken = VerifyToken::where('email',$request->email)->first();
            if($existingToken)
            {
                $existingToken->delete();
            }
            VerifyToken::create([
                'token' => $token,
                'email' => $request->email,
                'is_verified' => false,
            ]);

            Mail::to($request->email)->send(new ResetPassword($token));
            return Redirect::to('/dashboard/send-reset-otp/email=' . $request->email)->with(['token' => $token, 'email' => $request->email]);
        } catch (\Exception $e) {
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    
    public function verifyToken(Request $request, $email)
    {
        try{
            $request->validate([
                'token' => 'required',
            ]);

            $verifyToken = VerifyToken::where('email', $email)
                ->where('token', $request->token)
                ->where('is_verified', false) 
                ->first();

            if (!$verifyToken) {
                return back()->with('error', 'Invalid token. Please try again.');
            }

            // Mark the token as verified
            $verifyToken->is_verified = true;
            $verifyToken->save();

            return redirect()->route('admin.reset.password', [
                'email' => $request->email,
                'otp' => $request->token,
            ]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function resetPassword($email, $otp)
    {
        try{
            $verifyToken = VerifyToken::where('email', $email)
                ->where('token', $otp)
                ->where('is_verified', 1)
                ->first();

            if (!$verifyToken) {
                return redirect()->route('admin.forgot.password')->with('error', 'Invalid or expired token.');
            }

            return view('admin.auth.reset-password',compact('email'));
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }




    public function updatePassword(Request $request,$email)
    {
        try{
            $formFields = $request->validate([
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required',
            ]);

            $user = User::where('email', $email)->where('role',1)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'We could not find an account with this email address.']);
            }

            // Update the user's password
            $password = bcrypt($formFields['password']);
            $updated = $user->update(['password' => $password]);

            if($updated)
            {
                VerifyToken::where('email', $request->email)->delete();
            }

            return redirect()->route('admin.login')->with('success', 'Your password has been reset.');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    protected function generateToken()
    {
        return rand(10, 1000000);
    }
}
