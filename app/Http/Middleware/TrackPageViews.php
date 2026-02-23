<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;

class TrackPageViews
{
	public function handle(Request $request, Closure $next)
	{
		$response = $next($request);

		// loga só GET e evita ajax
		if ($request->isMethod('get') && ! $request->ajax()) {

			$path = '/' . ltrim($request->path(), '/');

			// ignora assets
			if (!preg_match('#^/(storage|build|favicon\.ico)#', $path)) {
				PageView::create([
					'user_id'    => optional($request->user())->id,
					'route_name' => optional($request->route())->getName(),
					'path'       => $path,
					'method'     => $request->method(),
					'ip'         => $request->ip(),
					'user_agent' => substr((string) $request->userAgent(), 0, 255),
				]);
			}
		}

		return $response;
	}
}
