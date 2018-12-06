<?php

namespace App\Services;

use Auth;
use Laravel\Passport\ClientRepository;
use Session;

class CreateOauthAccess
{
    public static function generate()
    {
        $clientrepository = new ClientRepository();
        $clientrepository->createPersonalAccessClient(Auth::user()->id, Auth::user()->name, config('app.url'));
        $createToken = Auth::user()->createToken(Auth::user()->name);
        $createToken->token->save();
        Session::flash('accessToken', $createToken->accessToken);
    }
}
