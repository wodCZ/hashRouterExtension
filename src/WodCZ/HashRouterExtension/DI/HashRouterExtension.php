<?php


namespace WodCZ\HashRouterExtension\DI;

use Hashids\Hashids;
use Nette\DI;
use Nette\PhpGenerator\ClassType;
use WodCZ\HashRouterExtension\RouteStyler;

class CompilerException extends \Exception
{

}

class HashRouterExtension extends DI\CompilerExtension
{
	protected $defaults = [
		'styles' => ['id']
	];

	public function loadConfiguration()
	{
		$config = $this->getConfig($this->defaults);

		if ( ! isset($config['salt'])) {
			throw new CompilerException('Please provide salt in configuration');
		}

		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('hashids'))
			->setClass(Hashids::class, [$config['salt']]);

		$builder->addDefinition($this->prefix('styler'))
			->setClass(RouteStyler::class)
			->addSetup('addStyles', [$config['styles']]);

	}



	public function afterCompile(ClassType $class)
	{
		$init = $class->getMethod('initialize');
		$init->addBody('$this->getService(?);', [$this->prefix('styler')]);
	}

}
