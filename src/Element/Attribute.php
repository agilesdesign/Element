<?php

namespace Element;

class Attribute
{	
	protected $name;
	
	protected $values = array();
	
	protected $separator;
	
	public function __construct($name, $separator = ' ')
	{
		$this->name = $name;
		$this->separator = $separator;
	}
	
	public function append($value)
	{
		if(!(in_array($value, $this->values)))
		{
			$this->values[] = $value;
		}
		
		return $this;
	}
	
	public function get($property)
	{
		return $this->{$property};
	}
	
	public function set($property, $value)
	{
		$this->{$property} = array($value);
		
		return $this;
	}
	
	public function remove($value)
	{
		if(($key = array_search($value, $this->values)) !== false)
		{
			unset($this->values[$key]);
		}
		
		return $this;
	}
}