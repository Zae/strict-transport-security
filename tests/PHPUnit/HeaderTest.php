<?php namespace Zae\StrictTransportSecurity\Tests\PHPUnit;

use Monolog\Logger;
use PHPUnit_Framework_TestCase;
use Zae\Monolog\Publish\Handler\PublishHandler;
use Zae\Monolog\Publish\Publisher\RedisPublisher;

/**
 * @author Ezra Pool <ezra@tsdme.nl>
 */

class HeaderTest extends PHPUnit_Framework_TestCase
{
	/**
	 *
	 */
	public function testSetHeader()
	{

	}

	public function tearDown()
	{
		\Mockery::close();
	}
}