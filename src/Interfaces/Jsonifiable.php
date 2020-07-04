<?php

namespace PingCheng\ApiResponse\Interfaces;

interface Jsonifiable
{
	/**
	 * @return string Generate a JSON output based on the class data.
	 */
	public function toJson(): string;
}