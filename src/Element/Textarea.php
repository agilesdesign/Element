<?php

namespace Element;

class Textarea extends AbstractElement
{
	const tag = 'textarea';
	
	protected $tag = self::tag;
	
	public function __construct($placeholder = null, $rows = null)
	{
		parent::__construct();
		
		if(isset($placeholder))
		{
			parent::setAttribute((new Attribute('placeholder'))->append($placeholder));
		}
		
		if(isset($rows))
		{
			parent::setAttribute((new Attribute('rows'))->append($rows));
		}
	}
}