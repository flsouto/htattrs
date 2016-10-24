# HtAttrs

This package can be used to build html tag attributes through a simple, array-based API.

## Installation

Use composer:

```
composer require flsouto/htattrs
```

## Usage

Building html attributes:

```
<?php

require_once('vendor/autoload.php');

$attrs = new FlSouto\HtAttrs();
$attrs['name'] = 'test';
$attrs['onclick'] = 'alert("Test!")';

echo "<a $attrs>Click me</a>";
```

The above code will produce:

```
<a name="test" onclick="alert(&quot;Test!&quot;)">Click me</a>
```

Since the HtAttrs class extends php's native *\ArrayObject*, you could initialize it with an array:

 ```
<?php

require_once('vendor/autoload.php');

$attrs = new FlSouto\HtAttrs([
    'name' => 'test',
    'onclick' => 'alert("Test!")'
]);

echo "<a $attrs>Click me</a>";
```

The above code will produce:

```
<a name="test" onclick="alert(&quot;Test!&quot;)">Click me</a>
```

## The Especial Style Attribute

The style attribute is always an instance of the FlSouto\HtAttrStyle class, which in turn produces a list of inline css properties when outputted:

```
<?php

require_once('vendor/autoload.php');

$attrs = new FlSouto\HtAttrs([
    'name' => 'test',
    'onclick' => 'alert("Test!")'
]);

$attrs['style']['color'] = 'black';

// it's also possible to get the object:
$style = $attrs['style'];
$style['padding'] = '5px';

echo "<a $attrs>Click me</a>";
```
The above code outputs:

```
<a name="test" onclick="alert(&quot;Test!&quot;)" style="color:black;padding:5px">Click me</a>
```

