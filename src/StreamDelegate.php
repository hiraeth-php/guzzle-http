<?php

namespace Hiraeth\Guzzle;

use Hiraeth;
use GuzzleHttp;

/**
 *
 */
class StreamDelegate implements Hiraeth\Delegate
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
		return 'GuzzleHttp\Psr7\Stream';
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
			'Psr\Http\Message\StreamInterface'
		];
	}


	/**
	 * Get the instance of the class for which the delegate operates.
	 *
	 * @access public
	 * @param Hiraeth\Broker $broker The dependency injector instance
	 * @return Object The instance of the class for which the delegate operates
	 */
	public function __invoke(Hiraeth\Broker $broker)
	{
		$handle = fopen('php://temp',  'r+');

		return new GuzzleHttp\Psr7\Stream($handle);
	}
}
