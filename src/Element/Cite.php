<?php

namespace Element;

class Cite extends AbstractElement
{
	const tag = 'cite';
	
	protected $tag = self::tag;
	
	public function __construct($title)
	{
		parent::construct();
		
		parent::setAttribute((new Attribute('title'))->append($title));
	}
}