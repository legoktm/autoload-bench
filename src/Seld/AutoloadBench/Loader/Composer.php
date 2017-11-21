<?php

namespace Seld\AutoloadBench\Loader;

use Composer\Autoload\ClassLoader;

class Composer extends ClassLoader {
	/**
	 * Override to avoid actually loading the class
	 *
	 * @param string $class
	 *
	 * @return bool
	 */
	public function loadClass($class)
	{
		if ($file = $this->findFile($class)) {
			return true;
		}

		return false;
	}

}
