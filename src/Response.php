<?php

namespace PingCheng\ApiResponse;

use JsonException;
use PingCheng\ApiResponse\Interfaces\Jsonifiable;

/**
 * Class Response
 */
class Response implements Jsonifiable
{
	/**
	 * @var int The HTTP API response status code.
	 */
	private int $statusCode;

	/**
	 * @var Payload The payload in the response.
	 */
	private Payload $payload;

	public function toJson(): string
	{
		try {
			return json_encode(array_merge($this->payload->getPayload(), [
				'status_code' => $this->statusCode,
			]), JSON_THROW_ON_ERROR);
		} catch (JsonException $e) {
			return '{}';
		}
	}
}