<?php


use PHPUnit\Framework\TestCase;
use PingCheng\ApiResponse\Payload;
use PingCheng\ApiResponse\Response;

class ResponseUnitTest extends TestCase
{
	public function testConstructorIsNotPublic(): void
	{
		$reflection = new ReflectionClass(Response::class);
		$constructor = $reflection->getConstructor();
		$this->assertFalse($constructor->isPublic());
	}

	/**
	 * @throws JsonException
	 */
	public function testToJsonShouldReturnCorrectString(): void
	{
		$data = [
			'data' => 'data',
			'message' => 'message',
		];
		$jsonString = json_encode(array_merge($data, ['status_code' => 200]), JSON_THROW_ON_ERROR);
		$response = Response::create(200, Payload::create($data));
		$this->assertEquals($jsonString, $response->toJson());
	}
}