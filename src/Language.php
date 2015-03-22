<?php
namespace SimoTod\Language;

class Language 
{
	protected $language;

	public function __construct($default) 
	{
		if (!is_string($default)) {
			throw new Exception('Not a string.');
		}
		$this->language = $default;
	}

	public function set($language) 
	{
		if (!is_string($language)) {
			throw new Exception('Not a string.');
		}
		$this->language = $language;
	}

	public function get() 
	{
		return $this->language;
	}

	public function __toString() 
	{
		return $this->get();
	}
}