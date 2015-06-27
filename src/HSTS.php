<?php namespace Zae\StrictTransportSecurity;

use Illuminate\Config\Repository;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author       Ezra Pool <ezra@tsdme.nl>
 */
class HSTS
{
	const HEADER_NAME = 'Strict-Transport-Security';

	/**
	 * @var Repository
	 */
	private $config;

	/**
	 * @var array
	 */
	protected $header = [];

	/**
	 * HSTS constructor.
	 *
	 * @param Repository $config
	 */
	public function __construct(Repository $config)
	{
		$this->config = $config;

		$this->buildCompleteHeader();
	}

	/**
	 * Set the max-age part of the header.
	 */
	protected function setMaxAge()
	{
		$max_age = $this->config->get('hsts.max-age', 31536000);
		$this->header[] = "max-age={$max_age}";
	}

	/**
	 * Set the includeSubdomains part of the header.
	 */
	protected function setIncludeSubdomains()
	{
		if ($this->config->get('hsts.includeSubdomains', false)) {
			$this->header[] = "includeSubDomains";
		}
	}

	/**
	 * Set the preload part of the header.
	 */
	protected function setPreload()
	{
		if ($this->config->get('hsts.preload', false)) {
			$this->header[] = "preload";
		}
	}

	/**
	 * Build the complete header
	 */
	protected function buildCompleteHeader()
	{
		$this->setMaxAge();
		$this->setIncludeSubdomains();
		$this->setPreload();
	}

	/**
	 * @param Response $response
	 */
	public function setHeader(Response &$response)
	{
		$response->headers->set(static::HEADER_NAME, join(';', $this->header), true);
	}
}