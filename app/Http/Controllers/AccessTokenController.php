<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController as PassportAccessTokenController;


use App\Model\User;

class AccessTokenController extends PassportAccessTokenController
{
    public function issueToken(ServerRequestInterface $request)
    {
        $user = [];
        try {
            $tokenResponse = parent::issueToken($request);
            $data = json_decode($tokenResponse->getContent(), true);
            if (isset($data["error"])) {
                $error = 'invalid_credentials';
                $message = 'The user credentials were incorrect.';

                if (isset($data['error'])) {
                    $error = $data['error'];
                }

                if (isset($data['message'])) {
                    $message = $data['message'];
                }

                throw new OAuthServerException($message, 6, $error, 401);
            }

            if (isset($request->getParsedBody()['username'])) {
                $user = User::where('username', $request->getParsedBody()['username'])->first();

                $data['user'] = $user;
            }


            return response()->json(['status' => true, 'data' => $data, 'message' => 'Login Berhasil']);
        } catch (ClientException $exception) {
            $error = json_decode($exception->getResponse()->getBody());
            throw OAuthServerException::invalidRequest('access_token', object_get($error, 'error.message'));
        }
    }
}