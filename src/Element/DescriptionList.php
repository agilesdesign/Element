<?php

namespace Element;

class DescriptionList extends AbstractElement
{
	const tag = 'dl';
	
	protected $tag = self::tag;
	
	public function __consturct(AbstractElement\DescriptionTerm $term = null, AbstractElement\DescriptionDefinition $definition = null)
	{
		parent::__construct();
		
		parent::add($term);
		parent::add($definition);
	}
}