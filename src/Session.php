<?php declare(strict_types = 1);

namespace Mangoweb\Tester\HttpMocks;

use Nette;


class Session extends Nette\Http\Session
{

	/** @var SessionSection[] */
	private $sections = [];

	/** @var bool */
	private $started = FALSE;

	/** @var bool */
	private $exists = FALSE;

	/** @var string */
	private $id;


	public function __construct()
	{
	}


	public function start(): void
	{
		$this->started = TRUE;
	}


	public function isStarted(): bool
	{
		return $this->started;
	}


	public function close(): void
	{
		$this->started = FALSE;
	}


	public function destroy(): void
	{
		$this->started = FALSE;
	}


	public function exists(): bool
	{
		return $this->exists;
	}


	public function setFakeExists(bool $exists): void
	{
		$this->exists = $exists;
	}


	public function regenerateId(): void
	{
	}


	public function getId(): string
	{
		return $this->id;
	}


	public function setFakeId($id)
	{
		$this->id = $id;
	}


	public function getSection($section, $class = SessionSection::class): Nette\Http\SessionSection
	{
		if (isset($this->sections[$section])) {
			return $this->sections[$section];
		}

		$sessionSection = parent::getSection($section, $class);
		assert($sessionSection instanceof SessionSection);

		return $this->sections[$section] = $sessionSection;
	}


	public function hasSection($section): bool
	{
		return isset($this->sections[$section]);
	}


	public function getIterator(): \Iterator
	{
		return new \ArrayIterator(array_keys($this->sections));
	}


	public function clean(): void
	{
	}


	public function setName($name)
	{
		return $this;
	}


	public function getName(): string
	{
		return '';
	}


	public function setOptions(array $options)
	{
		return $this;
	}


	public function getOptions(): array
	{
		return [];
	}


	public function setExpiration($time)
	{
		return $this;
	}


	public function setCookieParameters($path, $domain = NULL, $secure = NULL, $samesite = NULL)
	{
		return $this;
	}


	public function getCookieParameters(): array
	{
		return [];
	}


	public function setSavePath($path)
	{
		return $this;
	}


	public function setStorage(Nette\Http\ISessionStorage $storage)
	{
	}


	public function setHandler(\SessionHandlerInterface $handler)
	{
	}
}
