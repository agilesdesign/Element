<?php

namespace Element;

class Input extends AbstractElement
{
	const tag = 'input';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function __construct($type, $name, $readonly = false, $disabled = false)
	{	
		parent::__construct();
		
		parent::setAttribute('type', $type);
		parent::setAttribute('name', $name);
		
		if($readonly)
		{
			parent::setAttribute((new Attribute('readonly'))->append('readonly'));
		}
		
		if($disabled)
		{
			parent::setAttribute((new Attribute('disabled'))->append('disabled'));
		}
	}
}