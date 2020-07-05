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

	/**
	 * Create a Response object by status code and payload.
	 *
	 * @param int $statusCode
	 * @param Payload $payload
	 *
	 * @return Response
	 */
	public static function create(int $statusCode, Payload $payload): Response
	{
		return new self($statusCode, $payload);
	}

	/**
	 * Output the content to JSON format
	 *
	 * @return string
	 */
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

	/**
	 * Hidden Response constructor.
	 *
	 * @param int $statusCode
	 * @param Payload $payload
	 */
	protected function __construct(int $statusCode, Payload $payload)
	{
		$this->statusCode = $statusCode;
		$this->payload = $payload;
	}
}