<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
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
        if($exception instanceof TokenMismatchException){
            return response()->json([
                'redirect' => in_array($request->getMethod(), ['POST', 'PUT'])  && url()->previous() ? url()->previous() : url()->current(),
                'direct' => true
            ]);
        }
        if(method_exists($exception, 'redirectTo')){
            if($request->expectsJson()){
                return response()->json([
                    'redirect' => $exception->redirectTo(),
                    'direct' => true
                ]);
            }else{
                return redirect($exception->redirectTo());
            }
        }
        return parent::render($request, $exception);
    }
}
