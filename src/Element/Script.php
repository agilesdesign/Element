<?php

namespace Element;

class Script extends AbstractElement
{
	const tag = 'script';
	
	protected $tag = self::tag;
	
	public function __construct($src = null, $type = null, $defer = false, $async = false)
	{
		parent::__construct();
		
		if(isset($src))
		{
			parent::setAttribute((new Attribute('src'))->append($src));
		}
		
		if(isset($type))
		{
			parent::setAttribute((new Attribute('type'))->append($type));
		}
		
		if($defer)
		{
			parent::setAttribute((new Attribute('defer'))->append($defer));
		}
		
		if($async)
		{
			parent::setAttribute((new Attribute('async'))->append($async));
		}
	}
}