<?php declare(strict_types = 1);

namespace Mangoweb\Tester\HttpMocks;

use Nette;


class SessionSection extends Nette\Http\SessionSection
{

	private $data = [];


	public function __construct(Nette\Http\Session $session, $name)
	{
		parent::__construct($session, $name);
	}


	public function getIterator(): \Iterator
	{
		return new \ArrayIterator($this->data);
	}


	public function __set(string $name, $value): void
	{
		$this->data[$name] = $value;
	}


	public function &__get($name)
	{
		if ($this->warnOnUndefined && !array_key_exists($name, $this->data)) {
			trigger_error("The variable '$name' does not exist in session section", E_USER_NOTICE);
		}

		return $this->data[$name];
	}


	public function __isset($name): bool
	{
		return isset($this->data[$name]);
	}


	public function __unset($name): void
	{
		unset($this->data[$name]);
	}


	public function setExpiration($time, $variables = NULL)
	{
		return $this;
	}


	public function removeExpiration($variables = NULL): void
	{
	}


	public function remove(): void
	{
		$this->data = [];
	}

}
