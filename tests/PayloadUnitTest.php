<?php

use PHPUnit\Framework\TestCase;
use PingCheng\ApiResponse\Payload;

class PayloadUnitTest extends TestCase
{
	public function testNewPayloadWouldContainEmptyContent(): void
	{
		$payload = new Payload();
		$this->assertEmpty($payload->getPayload());
	}

	public function testPayloadCanBeSetByKeyAndValue(): void
	{
		$payload = new Payload();
		$payload->setPayload('key', 'value');
		$this->assertArrayHasKey('key', $payload->getPayload());
		$this->assertContains('value', $payload->getPayload());
	}

	public function testValueCanBeOverrideByTheSameKey(): void
	{
		$payload = new Payload();
		$payload->setPayload('a', 'a');
		$payload->setPayload('a', 'b');
		$this->assertCount(1, $payload->getPayload());
		$this->assertArrayHasKey('a', $payload->getPayload());
		$this->assertContains('b', $payload->getPayload());
	}

	public function testAbleToBulkSetPayload(): void
	{
		$payload = new Payload();
		$payload->setPayload('a', 'a');
		$payload->bulkSetPayload([
			'a' => 'aa',
			'b' => 'b',
		]);

		$data = $payload->getPayload();
		$this->assertCount(2, $data);
		$this->assertArrayHasKey('a', $data);
		$this->assertArrayHasKey('b', $data);
		$this->assertEquals('aa', $data['a']);
		$this->assertEquals('b', $data['b']);
	}

	public function testCreateWithNullWillReturnEmptyPayloadData(): void
	{
		$payload = Payload::create();
		$this->assertEmpty($payload->getPayload());
	}

	public function testCreateWithArrayWillPreFillPayloadData(): void
	{
		$data = [
			'a' => 'a',
			'b' => 'b',
		];
		$payload = Payload::create($data);
		$this->assertEquals($data, $payload->getPayload());
	}
}