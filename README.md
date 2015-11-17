# Introduction
PHP Class providing an object-oriented interface to build Elements (HTML, XML);
# Documentation

## HTML Element
### Basic Example
#### Code
```php

use \Element as Element;

echo (new Element\Div())
	->addClass('banana')
	->setAttribute('id', 'fuse-banana')
	->add('Banana Div')->render();

```
#### HTML Representation
```html
<div id="fuse-banana" class="banana">
	Banana Div
</div>
```

### Advanced Example
#### Code
```php

use \Element as Element;

$ul = new Element\UnorderedList();
$ul->setAttribute('id', 'banana-ul');

// mockup menu data
// likely coming from a data source
$items = array(
	array('text' => 'One', 'link' => '#one'),
	array('text' => 'Two', 'link' => '#two'),
	array('text' => 'Three', 'link' => '#three'),
);

foreach($items as $i)
{
	// create new <li>
	$item = new Element\ListItem();
	$item->setAttribute('id', strtolower($i['text']));
	
	// create new <a>
	// requires value for href attribute
	// should hold item's text
	$anchor = new Element\Anchor($i['link']);
	$anchor->add($i['text']);
	
	// add <a> to <li>
	$item->add($anchor);
	
	//add <li> to <ul>
	$ul->add($item);
}

// <div> to place <ul> in
$div = new Element\Div();
$div->setAttribute('id', 'ul-wrapper');

// surround <ul> with <div id="ul-wrapper">
// returns object passed into wrap ($div)
	// contents of returned object ($div) now set to $ul object
$div = $ul->wrap($div);

// prepend to the content of $div
// formatter will automatically wrap this text in a <p>
$div->add('Before unordered list', true);

// append to the content of $div
// formatter will automatically wrap this text in a <p>
$div->add('After unordered list', true);

// give class "ul-item" to every <li>
$div = Element\Helper::fixChildrenClass($div, 'ListItem', 'ul-item');

echo $div->render();
```

#### HTML Representation
```html
<div id="ul-wrapper">
	Before unordered list
	<ul id="banana-ul">
		<li id="one">
			<a href="#one">One</a>
		</li>
		<li id="two">
			<a href="#two">Two</a>
		</li>
		<li id="three">
			<a href="#three">Three</a>
		</li>
	</ul>
	After unordered list
</div>
```

### Extending Elements
```php
<?php

namespace \MyHtmlFramework;

use \Element as Element;

class Banana extends Element\Div
{	
	protected $classBase = 'banana';
	
	public function __construct($context = 'ripe')
	{	
		parent::__construct();
		
		$this->addClass($this->classBase . '-' . $context);
		
		parent::setAttribute('role', 'fruit');
	}
}
```


#### HTML Representation
```html
<div class="banana banana-ripe" role="fruit">
</div>
```

### Notes
There are instances when the object you are creating could be rendered as one of many element tags.
Bootstrap 3 Buttons for example could be: `<a>` or `<button>`.

In this case extend AbstractElement, accept the tag as a parameter to set tag property.
