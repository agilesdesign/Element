<?php

namespace Element;

class Link extends AbstractElement
{
	const tag = 'link';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function __construct($href, $rel, $type = null)
	{
		parent::__construct();
		
		parent::setAttribute((new Attribute('href'))->append($href));
		parent::setAttribute((new Attribute('rel'))->append($rel));
		
		if(isset($type))
		{
			parent:setAttribute((new Attribute('type'))->append($type));
		}
	}
}