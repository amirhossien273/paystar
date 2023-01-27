<?php

namespace App\Http\Controllers\v1\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\services\LoginServices\Login;
use App\Http\Requests\v1\LoginRequest;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request, Login $login)
    {
        return $login->handle($request);
    }
}
