<?php

namespace Element;

abstract class AbstractElement
{
	protected $tag;
	
	protected $singleton = false;

	protected $classBase;
	
	public $attributes;
	
	public $contents = array();
	
	public $jquery = array();
	
	public function __construct()
	{
		if(isset($this->classBase))
		{
			$this->addClass($this->classBase);
		}
	}
	public function get($property)
	{
		return $this->{$property};
	}
	
	public function addStyle($property, $value)
	{
		if(!isset($this->attributes['style']))
		{
			$this->attributes['style'] = new Attribute('style', ';');
		}
		
		$this->attributes['style']->append($property . ': ' . $value);
		
		return $this;
	}
	
	public function addClass($class)
	{
		if(isset($class) && $class != '')
		{
			if(!isset($this->attributes['class']))
			{
				$this->attributes['class'] = new Attribute('class');
			}
			
			$this->attributes['class']->append($class);
		}

		return $this;
	}
	
	public function removeClass($class)
	{
		$this->attributes['class']->remove($class);
		
		return $this;
	}
	
	public function add($contents, $prepend = false)
	{
		if(!$prepend)
		{
			$this->contents[] = $contents;
		}
		else
		{
			array_unshift($this->contents, $contents);
		}
		
		return $this;
	}
	
	public function wrap(AbstractElement $element)
	{
		$element->add($this);
		
		return $element;
	}
	
	public function wrapContent(AbstractElement $element)
	{	
		$element->add($this->contents);
		
		$this->contents = array($element);
		
		return $this;
	}
	
	public function getAttribute($name)
	{
		return $this->attributes[$name];
	}
	
	public function setAttribute(Attribute $attribute)
	{
		if($attribute->get('name') == 'class' && $attribute->get('name') == 'style')
		{
			return $this;
		}
		
		$this->attributes[$attribute->get('name')] = $attribute;
	
		return $this;
	}
	
	private function attributesToString(array $array, $inner_glue = '=', $outer_glue = ' ', $keepOuterKey = false)
	{
		$output = array();

		foreach ($array as $key => $item)
		{
			if (is_array($item))
			{
				if ($keepOuterKey)
				{
					$output[] = $key;
				}

				// This is value is an array, go and do it again!
				$output[] = $this->attributesToString($item, $inner_glue, $outer_glue, $keepOuterKey);
			}
			else
			{
				$output[] = $key . $inner_glue . '"' . $item . '"';
			}
		}

		return implode($outer_glue, $output);
	}
	
	public function removeChildByAttribute($elementType, $name, $value, $recurse = false)
	{
		$classPath = '\AbstractElement\\' . $elementType;
		
		foreach($this->contents as $key => $content)
		{
			if(is_a($content, $classPath) && $content->attributes[$name] == $value)
			{
				unset($this->contents[$key]);
			}
			
			if($recurse && is_a($content, '\Element'))
			{
				$content->removeChildByAttribute($elementType, $name, $value, $recurse);
			}
		}
	}
	
	public function getAttributes()
	{
		return $this->attributes;
	}
	
	public function build()
	{
		return $this;
	}
}