<?php

namespace ReqResLog;

use Closure;
use Illuminate\Support\Facades\Log;

class ReqResLogMiddleware
{
    public function handle($request, Closure $next)
    {
        Log::debug("<- {$request->method()} {$request->path()}", $request->all());

        $response = $next($request);

        $arrayContent = $response->getOriginalContent();
        if (!is_array($arrayContent)) {
            $arrayContent = [];
        }

        Log::debug("-> {$response->status()}", $arrayContent);

        return $response;
    }
}
