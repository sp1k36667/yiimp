<?php

class SiaRPC
{
	private $password;

	private $proto;
	private $host;
	private $port;

	// Information and debugging
	public $status;
	public $error;
	public $raw_response;
	public $response;

	private $id = 0;

	function __construct($host='localhost', $port=9980, $password='')
	{
		$this->proto    = 'http';
		$this->host     = $host;
		$this->port     = $port;
		$this->password = $password;
	}

	function rpcget($url, $params=array())
	{
		$curl = curl_init("{$this->proto}://{$this->host}:{$this->port}{$url}");
		$options = array(
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_POST           => true,
			CURLOPT_HTTPHEADER     => array(
				'Content-Type: application/json',
				'User-Agent: Sia-Agent',
			),
		);
		curl_setopt_array($curl, $options);
		if (!empty($this->password)) {
			curl_setopt($curl, CURLOPT_USERPWD, $this->password);
		}
		$this->raw_response = curl_exec($curl);

		$this->response = json_decode($this->raw_response, TRUE);

		// If the status is not 200, something is wrong
		$this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		// If there was no error, this will be an empty string
		$curl_error = curl_error($curl);

		curl_close($curl);

		if (!empty($curl_error)) {
			$this->error = $curl_error;
		}

		return $this->response;
	}
}
