<?php

namespace Element;

class TableBody extends AbstractElement
{
	const tag = 'tbody';
	
	protected $tag = self::tag;
	
	public function addRow(AbstractElement\TableRow $row, $prepend = false)
	{
		parent::add($row, $prepend);
		
		return $this;
	}
}