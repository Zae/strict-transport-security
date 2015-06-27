<?php namespace Zae\StrictTransportSecurity\Middleware\L5;

use Closure;
use Illuminate\Http\Request;
use Zae\StrictTransportSecurity\HSTS;

/**
 * Class HSTS
 *
 * @author Ezra Pool <ezra@tsdme.nl>
 */
class StrictTransportSecurity
{
	/**
	 * @var HSTS
	 */
	private $hsts;

	/**
	 * StrictTransportSecurity constructor.
	 */
	public function __construct(HSTS $hsts)
	{
		$this->hsts = $hsts;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Closure  $next
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function handle(Request $request, Closure $next)
	{
		$response = $next($request);

		$this->hsts->setHeader($response);

		return $response;
	}
}
