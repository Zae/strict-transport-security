<?php namespace Zae\StrictTransportSecurity\ServiceProvider;

use Illuminate\Support\ServiceProvider;

/**
 * @author       Ezra Pool <ezra@tsdme.nl>
 */
class L4HTSTServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$hsts = $this->app->make('Zae\StrictTransportSecurity\HSTS');
		$middle = $this->app->make('Zae\StrictTransportSecurity\Middleware\L4\StrictTransportSecurity', [$this->app, $hsts]);

		$this->app->middleware( $middle, [$hsts] );
	}
}