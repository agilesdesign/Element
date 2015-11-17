<?php

namespace Element;

class Image extends AbstractElement
{
	const tag = 'img';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function __construct($src, $alt = null)
	{	
		parent::__construct();
		
		$this->setAttribute((new Attribute('src'))->append($src);
		
		if(isset($alt))
		{
			$this->setAttribute((new Attribute('alt'))->append($alt));
		}
	}
}