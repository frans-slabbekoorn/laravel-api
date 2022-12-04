<?php

namespace App\Exceptions;

use App\Helpers\Json;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(fn (NotFoundHttpException $e) => Json::error($this->getTrace($e), 'Route not found', 404));

        $this->renderable(fn (Throwable $e) => Json::error($this->getTrace($e), $e->getMessage(), 500));
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @return void
     */
    public function report(Throwable $exception)
    {
    }

    /**
     * Get the trace of the exception.
     *
     * @param Throwable $exception
     *
     * @return array<int, array<string, mixed>>
     */
    public function getTrace(Throwable $e)
    {
        return App::environment('local') ? $e->getTrace() : [];
    }
}
