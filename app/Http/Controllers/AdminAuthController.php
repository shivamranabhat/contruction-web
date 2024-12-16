<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function signup()
    {
        return view('admin.auth.signup');
    }
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.login')->with('message','Account created successfully');
    }
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        $remember = $request->filled('remember');
        if (auth()->attempt($formFields, $remember)) {
            return redirect()->route('dashboard');
        }
        return back()->with('error','Invalid email or password.')->onlyInput('email');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('message','Logged out successfully!');
    }
    public function edit()
    {
        $account =auth()->user();
        return view('admin.profile',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|confirmed|min:6',
            'password_confirmation' => Rule::requiredIf($request->filled('password')),
        ], [
            'email.unique'=>'This email is already exists',
            'password_confirmation.required_if' => 'The password confirmation field is required.',
            'password.confirmed' => 'The password confirmation does not match the password.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $formFields = $validator->validated();
        
        // Update user information with the new data
        $user->name = $formFields['name'];
        $user->email = $formFields['email'];
        
        // Update password if a new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.profile')->with('message', 'Account updated successfully');
      
    }
}
