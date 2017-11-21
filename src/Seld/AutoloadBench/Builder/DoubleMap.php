<?php

namespace Seld\AutoloadBench\Builder;

use Seld\AutoloadBench\Builder;

class DoubleMap extends Builder
{
	protected function build($classes, $path, $prefixMapLevel)
	{
		$code = '<?php return new \Seld\AutoloadBench\Loader\DoubleMap(%s, %s);';

		$count = 0;
		$map = [];
		$map2 = [];
		foreach ($classes as $class) {
			$full = $path.'/'.strtr($class, '\\', '/').'.php';
			// Split the classes into two arrays
			if ( $count % 1 === 0 ) {
				$map[$class] = $full;
			} else {
				$map2[$class] = $full;
			}
			$count++;
		}

		file_put_contents($this->path.'/loader.php', sprintf($code, var_export($map, true), var_export($map2, true)));
	}
}
