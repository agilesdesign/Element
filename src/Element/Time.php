<?php

namespace Element;

class Time extends AbstractElement
{
	const tag = 'time';
	
	protected $tag = self::tag;
	
	public function __construct($datetime)
	{
		parent::__construct();
		
		parent::setAttribute((new Attribute('datetime'))->append($datetime));
	}
}