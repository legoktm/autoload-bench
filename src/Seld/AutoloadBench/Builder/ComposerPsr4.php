<?php

namespace Seld\AutoloadBench\Builder;

use Seld\AutoloadBench\Builder;

class ComposerPsr4 extends Builder
{
	protected function build($classes, $path, $prefixMapLevel)
	{
		$code = <<<'EOF'
<?php

$loader = new \Seld\AutoloadBench\Loader\Composer();
$map = %s;

foreach ($map as $prefix => $path) {
    $pathPrefix = str_replace( '\\', '/', $prefix );
    $loader->addPsr4("$prefix\\", "$path/$pathPrefix");
}

return $loader;
EOF
		;

		$prefixes = $this->getNamespaceMap($classes, $path, $prefixMapLevel);

		file_put_contents($this->path.'/loader.php', sprintf($code, var_export($prefixes, true)));
	}
}
