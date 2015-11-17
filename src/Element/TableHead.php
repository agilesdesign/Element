<?php

namespace Element;

class TableHead extends AbstractElement
{
	const tag = 'thead';
	
	protected $tag = self::tag;
	
	public function __construct(AbstractElement\TableRow $row = null)
	{
		if(isset($row))
		{
			parent::add($row);
		}
	}
	
	public function addRow(AbstractElement\TableRow $row, $prepend = false)
	{
		parent::add($row, $prepend);
		
		return $this;
	}
}