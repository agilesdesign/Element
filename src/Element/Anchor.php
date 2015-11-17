<?php

namespace Element;

class Anchor extends AbstractElement
{
	const tag = 'a';
	
	protected $tag = self::tag;
	
	public function __construct($href)
	{	
		parent::__construct();
		
		$this->setAttribute((new Attribute('href'))->append($href));
	}
}