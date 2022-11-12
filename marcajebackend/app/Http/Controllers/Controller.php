<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Controller extends BaseController
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $email=$request->get('email');
        $user = DB::table('users')->where('email', $email)->get();

        return response()->json(compact('user','token'),201);
        //return response()->json(compact('token'));
    }
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            return response()->json(compact('user'));
    }
    public function register(Request $request)
        {
                $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'tipo_usuario' => 'required|max:2',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password|min:6',
            ]);

            if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
            }

            $user = User::create([
                'nombre' => $request->get('nombre'),
                'email' => $request->get('email'),
                'tipo_usuario' => $request->get('tipo_usuario'),
                'estado' => 1,
                'password' => Hash::make($request->get('password')),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user','token'),201);
        }
        public function obtenerUsuarios(){

            $usuario = DB::table('users')->where('estado',1)->get();
            return $usuario;
        }
    public function index()
    {
        $usuario = DB::table('users')->where('estado',1)->get();
        return $usuario;
    }
    public function show($id)
    {
        $usuario = User::find($id);
        return $usuario;
    }
    public function showByEmail($email)
    {
        $usuario = DB::table('users')->where('email', $email)->get();
        return $usuario;
    }
    public function update(Request $request,  $id)
    {
        $usuario = User::find($id);
        $usuario->update([
            'nombre' => $request->get('nombre'),
            'email' => $request->get('email'),
            'tipo_usuario' => $request->get('tipo_usuario'),
            'password' => Hash::make($request->get('password')),
        ]);
        return response ()->json([
            'message' => "Usuario Actualizado Satisfactoriamente!",
            'usuario' => $usuario
        ], 200);
    }
    public function destroy(Request $request,$id)
    {
        $usuario = User::find($id);
        
        $usuario->update([
            'estado' => 0,
        ]);
        return response ()->json([
            'message' => "Usuario inahabilitado correctamente!",
            'user' => $usuario
        ], 200);
    }
}
