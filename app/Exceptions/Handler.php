<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        //for not object found exception
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->wantsJson()) {
                return response()->json([
                    'result' => false,
                    'status' => Response::HTTP_NOT_FOUND,
                    "message" => "Object not found"
                ], 404);
            }
        });

        //user has no permisission exception
        $this->renderable(function (AccessDeniedHttpException $e, $request) {
            if ($request->wantsJson()) {
                return response()->json([
                    'result' => false,
                    'status' => Response::HTTP_FORBIDDEN,
                    'message' => "This action is unauthorized.",
                ], 403);
            }
        });

        //user has no permisission exception
        $this->renderable(function (QueryException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'result' => false,
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => "Internal server error.",
                    'error' => $th->getMessage()
                ], 403);
            }
        });

        //change sanctum return message
        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'result' => false,
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'message' => "Unauthenticated.",

                ], 401);
            }
        });
    }
}
