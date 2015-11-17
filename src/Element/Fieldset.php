<?php

namespace Element;

class Fieldset extends AbstractElement
{
	const tag = 'fieldset';
	
	protected $tag = self::tag;
	
	public function __construct($disabled = false)
	{
		parent::__contruct();
		
		if($disabled)
		{
			parent::setAttribute((new Attribute('disabled'))->append('disabled'));
		}
	}
}