<?php

namespace App\Http\Controllers;

use App\Models\AppUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'nama'  => 'required|string',
            'email' => 'required|email|unique:app_user',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new AppUser;
            $user->nama     = $request->input('nama');
            $user->email    = $request->input('email');
            $user->id_role    = $request->input('id_role');
            $plainPassword  = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            // Cek duplikat data
            $duplicate_data = $user->where('email', $user->email)->first();
            if ($duplicate_data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Duplicate data',
                    'data' => $user,

                ], 425);
            } else {

                $user->save();
            }

            //return successful response
            return response()->json([
                'success' => true,
                'message' => 'User added successfully!',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $e
            ], 409);
        }
    }

    public function login(Request $request)
    {

        //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        $user = AppUser::where('email', $request->email)->first();

        if ($user) {

            $data_user = [
                'id' => $user->id,
                'nama' => $user->nama,
                'email' => $user->email,
                'role' => $user->role,
            ];

            if (Hash::check($request->password, $user->password)) {
                $token = base64_encode(Str::random(100));

                $user->update([
                    'token' => $token
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Success Login',
                    'data' => [
                        'data' => $data_user,
                        'token' => $token,
                    ]
                ], 200);
            } else if (md5($request->password, $user->password)) {
                $token = base64_encode(Str::random(100));

                $user->update([
                    'token' => $token
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Success Login',
                    'data' => [
                        'data' => $data_user,
                        'token' => $token,
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Login Fail! Password Wrong',
                    'data' => '',
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Fail! Email Not Found',
                'data' => '',
            ], 400);
        }
    }

}
