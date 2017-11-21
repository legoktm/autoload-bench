<?php

namespace Seld\AutoloadBench\Loader;

class DoubleMap
{
	private $map;
	private $map2;

	public function __construct(array $map, array $map2)
	{
		$this->map = $map;
		$this->map2 = $map2;
	}

	public function loadClass($name)
	{
		if (isset($this->map[$name])) {
			$file = $this->map[$name];

			return true;
		} elseif ( isset($this->map2[$name])) {
			$file = $this->map2[$name];

			return true;
		}

		return false;
	}
}
