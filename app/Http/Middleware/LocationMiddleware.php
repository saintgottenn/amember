<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationMiddleware
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
        if (!session()->has('user_location')) {
            // $ip = $request->ip(); 
            // $apiKey = env('IPAPI_KEY'); 

            // $response = Http::get("http://api.ipapi.com/{$ip}?access_key={$apiKey}");

            // if ($response->successful()) {
            //     $locationData = $response->json();
            //     session(['user_location' => $locationData]);
            // }
        }

        return $next($request);
    }
}
