<?php

namespace Element;

class Table extends AbstractElement
{
	const tag = 'table';
	
	protected $tag = self::tag;
	
	protected $head;
	
	protected $body;
	
	public function __construct(AbstractElement\TableHead $head = null)
	{
		parent::__construct();
		
		$this->head = $head;
		$this->body = new AbstractElement\TableBody();
	}
	
	public function addRow(AbstractElement\TableRow $row, $prepend = false)
	{
		$this->body->addRow($row, $prepend);
			
		return $this;
	}
	
	public function build()
	{
		$this->add($this->head);
		$this->add($this->body);
	}
}

// namespace Element;

// class Table extends AbstractElement
// {
// 	const tag = 'table';
	
// 	protected $tag = self::tag;
	
// 	protected $head = false;
	
// 	public function __construct(AbstractElement\TableHead $head = null)
// 	{
// 		parent::__construct();
		
// 		if(isset($head))
// 		{
// 			$this->head = true;
			
// 			parent::add($head);
// 		}
		
// 		$body = new AbstractElement\TableBody();
		
// 		parent::add($body);
// 	}
	
// 	public function addRow(AbstractElement\TableRow $row, $prepend = false)
// 	{
// 		if($this->head)
// 		{
// 			$this->contents[1]->addRow($row, $prepend);
			
// 			return $this;
// 		}
		
// 		$this->contents[0]->addRow($row, $prepend);
		
// 		return $this;
// 	}
// }
?>