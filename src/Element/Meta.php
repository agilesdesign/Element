<?php

namespace Element;

class Meta extends AbstractElement
{
	const tag = 'meta';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
// 	public function addMetaContent($value, $glue = ', ')
// 	{
// 		if(isset($this->getAttributes()['content']))
// 		{
// 			$this->getAttributes()['content'] .= $glue . $value;

// 			return $this;
// 		}
		
// 		$this->setAttribute('content', $value);
		
// 		return $this;
// 	}
}