<?php

namespace Hiraeth\Guzzle;

use Hiraeth;
use GuzzleHttp;
use Auryn;

/**
 *
 */
class ServerRequestDelegate implements Hiraeth\Delegate
{
	/**
	 * Get the class for which the delegate operates.
	 *
	 * @static
	 * @access public
	 * @return string The class for which the delegate operates
	 */
	static public function getClass()
	{
		return 'GuzzleHttp\Psr7\ServerRequest';
	}


	/**
	 * Get the interfaces for which the delegate provides a class.
	 *
	 * @static
	 * @access public
	 * @return array A list of interfaces for which the delegate provides a class
	 */
	static public function getInterfaces()
	{
		return [
			'Psr\Http\Message\ServerRequestInterface'
		];
	}


	/**
	 * Get the instance of the class for which the delegate operates.
	 *
	 * @access public
	 * @param Auryn\Injector $broker The dependency injector instance
	 * @return Object The instance of the class for which the delegate operates
	 */
	public function __invoke(Auryn\Injector $broker)
	{
		return GuzzleHttp\Psr7\ServerRequest::fromGlobals();
	}
}
