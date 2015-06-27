<?php namespace Zae\StrictTransportSecurity\Middleware\L4;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Zae\StrictTransportSecurity\HSTS;

/**
 * @author       Ezra Pool <ezra@tsdme.nl>
 */
class StrictTransportSecurity implements HttpKernelInterface
{
	/**
	 * @var HttpKernelInterface
	 */
	private $app;

	/**
	 * @var HSTS
	 */
	private $hsts;

	/**
	 * StrictTransportSecurity constructor.
	 *
	 * @param HttpKernelInterface $app
	 * @param HSTS                $hsts
	 */
	public function __construct(HttpKernelInterface $app, HSTS $hsts)
	{
		$this->app = $app;
		$this->hsts = $hsts;
	}

	/**
	 * Handles a Request to convert it to a Response.
	 *
	 * When $catch is true, the implementation must catch all exceptions
	 * and do its best to convert them to a Response instance.
	 *
	 * @param \Symfony\Component\HttpFoundation\Request $request A Request instance
	 * @param int     $type    The type of the request
	 *                         (one of HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST)
	 * @param bool    $catch   Whether to catch exceptions or not
	 *
	 * @return \Symfony\Component\HttpFoundation\Response A Response instance
	 *
	 * @throws \Exception When an Exception occurs during processing
	 *
	 * @api
	 */
	public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
	{
		$response = $this->app->handle($request, $type, $catch);

		$this->hsts->setHeader($response);

		return $response;
	}
}