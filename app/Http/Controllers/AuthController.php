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
            }else if (md5($request->password, $user->password)) {
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

    public function users(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Master Data Users',
            'data' =>  AppUser::OrderBy('id', 'DESC')->paginate(5),
        ], 200);
    }
    public function usersLogin(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://suratonline.bandung.go.id/api/index.php/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $request->email,'password' => $request->password,'regid' => $request->password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function vaksinTerkini()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://data.bandung.go.id/service/index.php/vaksinasi/terkini',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function agendaKegiatan(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://suratonline.bandung.go.id/api/index.php/agenda',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('token' => $request->token,'start' => $request->start,'end' => $request->end),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function cuaca(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://mantra.bandung.go.id/mantra/json/diskominfo/cuaca/sekarang',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }
}
