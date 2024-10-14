<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->role = 'user'; // Set default role as 'user'
        $user->status = 'pending'; // Set status as 'pending'
        $user->password = Hash::make($request->password);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $user->image = $imagePath;
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            return back()->withErrors(['register' => 'Error saving user: ' . $e->getMessage()]);
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Send OTP via WhatsApp using Fonte
        if ($this->sendOtpWhatsApp($request->phone, $otp)) {
            // Store OTP in session
            session(['otp' => $otp, 'user_id' => $user->id]);
            return redirect()->route('auth.verifyOtp')->with('success', 'Registration successful, please verify your phone.');
        } else {
            return back()->withErrors(['phone' => 'Failed to send OTP. Please try again.']);
        }
    }

    public function sendOtpWhatsApp($phone, $otp)
    {
        $apiKey = env('FONTE_API_KEY');
        $url = "https://api.fonnte.com/send"; 

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $phone . '|Fonnte|User', // Format target
                'message' => "Your OTP code is: $otp",
                'countryCode' => '62', // Kode negara
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $apiKey,
            ],
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            Log::error('CURL Error: ' . $error_msg);
        }

        curl_close($curl);

        // Log the response
        Log::info('Response from Fonte: ' . $response);

        return isset($response) && !isset($error_msg); // Return true if the message was sent successfully
    }

    public function showVerifyOtpForm()
    {
        return view('verifyOtp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|integer']);

        if ($request->otp == session('otp')) {
            $user = User::find(session('user_id'));
            $user->status = 'active'; // Update status after verification
            $user->email_verified_at = now(); // Set email verified date
            $user->save();

            // Clear the OTP session
            session()->forget(['otp', 'user_id']);

            return redirect()->route('login')->with('success', 'Registration successful, you can login now.');
        }

        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Try to authenticate using email
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard'); // Redirect to intended page after login
        }

        // Try to authenticate using phone (if email fails)
        $user = User::where('phone', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
