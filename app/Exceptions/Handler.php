<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $class = get_class($exception);
        if ($class == 'League\OAuth2\Server\Exception\OAuthServerException') {
            return response()->json([
                'status'  => false,
                'message' => $exception->getMessage(),
                'code'    => $exception->getHttpStatusCode(),
            ],

            $exception->getHttpStatusCode());
        }

        if ($class == 'Laravel\Passport\Exceptions\OAuthServerException') {
            return response()->json([
                'status'  => false,
                'message'=> "username atau password salah",
                'code'    => 200
            ],

            200);
        }

        if ($class == 'Illuminate\Auth\AuthenticationException') {
            return response()->json([
                'status'  => false,
                'message'=> 'Unauthenticated.',
                'code'    => 401
            ],

            401);
        }

        return parent::render($request, $exception);
    }
}
