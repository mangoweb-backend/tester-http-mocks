<?php declare(strict_types = 1);

namespace Mangoweb\Tester\HttpMocks\Bridges\Infrastructure;

use Mangoweb\Tester\Infrastructure\MangoTesterExtension;
use Nette\DI\CompilerExtension;

class HttpExtension extends CompilerExtension
{

	/** @var string[] */
	public $defaults = [
		'baseUrl' => 'https://test.dev',
	];

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();
		$config = $this->validateConfig($this->defaults);

		$builder->addDefinition($this->prefix('mocksContainerHook'))
			->setType(HttpMocksContainerHook::class)
			->setArguments([$config['baseUrl']])
			->addTag(MangoTesterExtension::TAG_HOOK);
	}
}
