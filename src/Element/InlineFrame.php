<?php

namespace Element;

class InlineFrame extends AbstractElement
{	
	const tag = 'iframe';
	
	protected $tag = self::tag;
	
	public function __construct($src)
	{	
		parent::__construct();
		
		parent::setAttribute((new Attribute('src'))->append($src));
	}
}