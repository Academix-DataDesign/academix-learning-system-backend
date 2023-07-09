<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AccountActivation;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Cookie;

class AuthenticationController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function registerUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 401);
            }

            $email = $request->email;

            $client = new Client();

            $response = $client->request('GET', 'https://mailcheck.p.rapidapi.com/?domain=' . urlencode($email), [
                'headers' => [
                    'X-RapidAPI-Host' => 'mailcheck.p.rapidapi.com',
                    'X-RapidAPI-Key' => 'bcfdee6c9dmsh4e3903236f08f3ep1ec2e0jsn25dfcc1e60d7',
                ],
            ]);

            $responseBody = $response->getBody()->getContents();
            $responseJson = json_decode($responseBody);

            if ($responseJson->valid) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $email,
                    'password' => Hash::make($request->password),
                    'confirmation_token' => Str::random(40),
                ]);

                // Mail::to($user->email)->send(new AccountActivation($user));

                return response()->json([
                    'status' => true,
                    'message' => 'User Created Successfully',
                    'token' => $user->createToken("API TOKEN")->accessToken
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Email does not exists'
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function activateAccount($token)
    {
        $user = User::where('confirmation_token', $token)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid activation token',
            ], 404);
        }

        $user->confirmation_token = null;
        $user->status_id = 2;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Account activated successfully',
        ], 200);
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        $cacheKey = 'user_login:' . $request->email;
        $expirationTime = 60;

        if (Cache::has($cacheKey)) {
            $responseData = Cache::get($cacheKey);
        } else {
            try {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'email' => 'required|email',
                        'password' => 'required'
                    ]
                );

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $validator->errors()
                    ], 401);
                }

                if (!Auth::attempt($request->only(['email', 'password']))) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Email & Password do not match with our records.',
                    ], 401);
                }

                $user = User::where('email', $request->email)->first();

                if ($user->status_id === 1) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Account is not active.',
                    ], 401);
                }

                $accessToken = $user->createToken("API TOKEN")->accessToken;

                $responseData = [
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    'token' => $accessToken
                ];

                Cache::put($cacheKey, $responseData, $expirationTime);

                $ipAddress = $request->ip();

                $session = new Session();
                $session->user_id = $user->id;
                $session->ip_address = $ipAddress;
                $session->save();

                $cookie = new Cookie('api_token', $accessToken, time() + (60 * 60 * 24), '/', null, false, true);

                $response = response()->json($responseData, 200);
                $response->headers->setCookie($cookie);

                return $response;
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
        }

        return response()->json($responseData, $responseData['status'] ? 200 : 401);
    }


    public function logoutUser(Request $request)
    {
        Auth::logout();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully!',
        ]);
    }
}
