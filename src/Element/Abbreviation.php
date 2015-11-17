<?php

namespace Element;

class Blockquote extends AbstractElement
{
	const tag = 'abbr';
	
	protected $tag = self::tag;
	
	public function __construct($title)
	{
		parent::__construct();
		
		parent::setAttribute((new Attribute('title'))->append($title));
	}
}