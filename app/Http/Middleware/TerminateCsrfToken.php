<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TerminateCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function terminate($request, $response)
    {
        if ($request->is('payment/proses-data/*') && $request->isMethod('post')) {
            // Ensure CSRF token is included in the response
            $response->headers->set('X-CSRF-TOKEN', csrf_token());
        }

        return $response;
    }
}
