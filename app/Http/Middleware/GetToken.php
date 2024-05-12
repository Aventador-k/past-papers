<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class GetToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $consumerKey = "WwokYEXlAAhwrSuZ80OrINULzuAI31uNkioL0nxiLQV8UlJ3";
        $consumerSecret = "Y61G3ArF2Njxl6aKE2AeljJ5DTWMUhtjNVoG9Q9mggm2oVpnOOcsACtTyNAN0GXc";
        $authKey = base64_encode($consumerKey . ":" . $consumerSecret);
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $authKey,
        ])->get("https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials");

        $request->request->add(['token' => $response['access_token']]);
        // dd($response);
        return $next($request);
    }
}
