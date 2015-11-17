<?php

namespace Element;

class Button extends AbstractElement
{
	const tag = 'button'
	
	protected $tag = self::tag;
	
	public function __construct()
	{	
		parent::__construct();
		
		parent::setAttribute((new Attribute('type'))->append('button'));
	}
}