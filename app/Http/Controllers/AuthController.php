<?php

namespace App\Http\Controllers;

use App\Models\AppUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
        * @OA\Post(
        * path="/api/v1/register",
        * operationId="Register",
        * tags={"Register"},
        * summary="User Register",
        * description="User Register here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"nama","email", "password", "password_confirmation"},
        *               @OA\Property(property="nama", type="string"),
        *               @OA\Property(property="email", type="string"),
        *               @OA\Property(property="password", type="string", format="password"),
        *               @OA\Property(property="password_confirmation", type="string", format="password")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
    */
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
            $duplicate_data = $user->where( 'email', $user->email )->first();
            if ( $duplicate_data ) {
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

    /**
        * @OA\Post(
        * path="/api/v1/login",
        * operationId="authLogin",
        * tags={"Login"},
        * summary="User Login",
        * description="Login User Here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"email", "password"},
        *               @OA\Property(property="email", type="string"),
        *               @OA\Property(property="password", type="string", format="password"),
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Login Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Login Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
    */
    public function login(Request $request)
    {
        
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        $user = AppUser::where('email',$request->email)->first();

        $data_user = [
            'id' => $user->id, 
            'nama' => $user->nama, 
            'email' => $user->email, 
        ];

        if($user){
            
            

            if (Hash::check($request->password, $user->password)) {
                $token = base64_encode(Str::random(100));

                    $user->update([
                        'token' => $token
                    ]);
                    return response()->json([
                        'success' => true,
                        'message' => 'Success Login',
                        'data'=>[
                            'data'=>$data_user,
                            'token'=> $token,
                        ]
                    ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Login Fail! Password Wrong',
                    'data' => '',
                ],400);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Login Fail! Email Not Found',
                'data' => '',
            ],400);
        }
    }

    /**
     * @OA\Get(
        *     tags={"Users"},
        *     summary="Returns a list of users",
        *     description="Returns a object of users",
        *     path="/api/v1/users",
        *      @OA\Response(
        *          response=200,
        *          description="Get Data Successfully",
        *          @OA\JsonContent()
        *       ),
        * )
    */
    public function users(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Master Data Users',
            'data' =>  AppUser::OrderBy('id', 'DESC')->paginate(2),
        ],400);
    }



}