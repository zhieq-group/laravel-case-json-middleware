<?php

namespace ZhiEq\CaseJson\Middleware;

use Closure;
use Illuminate\Http\Request;
use ZhiEq\CaseJson\ConvertJsonKeyFormat;
use ZhiEq\Contracts\MiddlewareExceptRoute;

class StudlyCaseInputJson extends MiddlewareExceptRoute
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function subHandle($request, Closure $next)
    {
        if (!empty($request->input())) {
            $request->replace(ConvertJsonKeyFormat::convertJsonKeyFormat(json_encode($request->input()), ConvertJsonKeyFormat::FORMAT_STUDLY_CASE, true));
        }
        return $next($request);
    }
}
