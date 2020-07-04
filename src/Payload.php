<?php

namespace PingCheng\ApiResponse;

/**
 * Class Payload
 * Payload contains the actual data in a response.
 */
class Payload
{

	private array $payload = [];

	/**
	 * Set the payload by replacing it.
	 *
	 * @param string $key
	 * @param $value
	 */
	public function setPayload(string $key, $value): void
	{
		$this->payload[$key] = $value;
	}

	/**
	 * Bulk setup the payload.
	 *
	 * @param array $payload
	 */
	public function bulkSetPayload(array $payload): void
	{
		$this->payload = array_merge($this->payload, $payload);
	}

	/**
	 * Get the payload array.
	 *
	 * @return array
	 */
	public function getPayload(): array
	{
		return $this->payload;
	}
}