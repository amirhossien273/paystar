<?php


namespace App\services\LoginServices;


use Illuminate\Http\Request;

class Login
{

    public function handle(Request $request)
    {
        if (! $token = auth('api')->attempt(['email' => $request->email, 'password'=>$request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function createNewToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json(['token' => $token,'type'=>'bearer']);
    }
}
