<?php

namespace Element;

class Select extends AbstractElement
{
	const tag = 'select';
	
	protected $tag = self::tag;
	
	public function __construct($multiple = false)
	{
		parent::__contruct();
		
		if($multiple)
		{
			parent::setAttribute((new Attribute('multiple'))->append(''));
		}
	}
}