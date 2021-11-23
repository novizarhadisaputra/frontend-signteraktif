<?php

namespace App\Http\Middleware;

use App\Models\ApiLog as ModelsApiLog;
use Closure;
use Illuminate\Http\Request;

class ApiLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $apiLog;

    public function __construct(ModelsApiLog $apiLog)
    {
        $this->apiLog = $apiLog;
    }
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $this->apiLog->create([
            'ip_address' => $request->ip(),
            'url' => $request->fullUrl(),
            'request_headers' => json_encode($request->header()),
            'request_method' => $request->method(),
            'request_body' => json_encode($request->input()),
            'status' => $response->status(),
            'response' => (int) $response->status() < 500 ? $response->content() : str_replace(' ', '', $response->content()),
        ]);
    }
}
