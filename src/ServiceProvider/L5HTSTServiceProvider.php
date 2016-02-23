<?php namespace Zae\StrictTransportSecurity\ServiceProvider;

use Illuminate\Support\ServiceProvider;

/**
 * @author       Ezra Pool <ezra@tsdme.nl>
 */
class L5HTSTServiceProvider extends ServiceProvider
{

	public function register()
	{

	}
	
	public function boot()
        {
            $this->publishes([
                __DIR__.'/../config/hsts.php' => config_path('hsts.php')
            ], 'config');
        }
}