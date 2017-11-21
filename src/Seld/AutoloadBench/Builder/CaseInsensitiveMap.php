<?php

namespace Seld\AutoloadBench\Builder;

use Seld\AutoloadBench\Builder;

class CaseInsensitiveMap extends Builder
{
	protected function build($classes, $path, $prefixMapLevel)
	{
		$code = '<?php return new \Seld\AutoloadBench\Loader\CaseInsensitiveMap(%s);';

		foreach ($classes as $class) {
			$map[$class] = $path.'/'.strtr($class, '\\', '/').'.php';
		}

		file_put_contents($this->path.'/loader.php', sprintf($code, var_export($map, true)));
	}
}
