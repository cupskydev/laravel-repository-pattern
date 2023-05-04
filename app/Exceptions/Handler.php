<?php

namespace App\Exceptions;

use BadMethodCallException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (ValidationException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (RouteNotFoundException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (RelationNotFoundException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_METHOD_NOT_ALLOWED);
        });

        $this->renderable(function (QueryException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        });

        $this->renderable(function (BindingResolutionException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        });

        $this->renderable(function (BadMethodCallException $e, $request) {
            throw new FailedException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        });
    }
}
