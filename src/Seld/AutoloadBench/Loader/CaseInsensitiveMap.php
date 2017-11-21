<?php

namespace Seld\AutoloadBench\Loader;

class CaseInsensitiveMap {
	private $map;
	private $lowerMap;

	public function __construct(array $map)
	{
		$this->map = $map;
	}

	public function loadClass($name)
	{
		if (isset($this->map[$name])) {
			$file = $this->map[$name];

			return true;
		}

		if ( $this->lowerMap === null ) {
			$this->lowerMap = array_change_key_case( $this->map, CASE_LOWER );
		}

		if ( isset( $this->lowerMap[$name] ) ) {
			$file = $this->lowerMap[$name];

			return true;
		}

		return false;
	}
}
