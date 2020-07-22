<?php

namespace App\Http\Middleware;

use App\Models\Cms as CMsModel;
use Closure;

class Cms
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cmsModel = CMsModel::findOrFail(1)->toArray();

        $cms = ["cms" => $cmsModel];

        $request->merge($cms);

        return $next($request);
    }
}
