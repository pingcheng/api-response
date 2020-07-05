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
	 * Create a Payload object and fill the payload content is provided.
	 *
	 * @param array|null $payload
	 *
	 * @return Payload
	 */
	public static function create(?array $payload = []): Payload
	{
		$self = new self();
		$self->bulkSetPayload($payload ?? []);
		return $self;
	}

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