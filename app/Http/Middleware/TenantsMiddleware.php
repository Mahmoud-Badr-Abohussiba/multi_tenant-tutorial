<?php

namespace App\Http\Middleware;

use App\Facade\TenantsFacade;
use App\Models\Tenant;
use App\Services\TenantService;
use Closure;
use Illuminate\Http\Request;


class TenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host =$request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
        TenantsFacade::switchToTenant($tenant);
        return $next($request);
    }
}
