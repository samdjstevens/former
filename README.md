# Former - a PHP 5.4+ Form Macro Package

An ultra simple HTML form element builder, for PHP 5.4+

## Usage

To use the package, just create an instance of `Spanky\Former\ElementFactory` from 
which you will create the form elements with.

```php
use Spanky\Former\ElementFactory as FormerElementFactory;

$former = new FormerElementFactory();
```

### Creating Elements

To create a new form element, call the appropriate method on the `ElementFactory` instance. 
The only required parameter for each element type is the name. Once casted to a string 
(e.g. via an `echo`) the object will equal the compiled HTML of the element.

#### Text Inputs

```php
$former->text('input_name', 'value', ['class' => 'myClass', 'id' => 'myId']);
```

#### Hidden inputs

```php
$former->hidden('input_name', 'value', ['class' => 'myClass', 'id' => 'myId']);
```

#### File inputs

```php
$former->file('input_name', ['class' => 'myClass', 'id' => 'myId']);
```

#### Email inputs

```php
$former->email('input_name', 'value', ['class' => 'myClass', 'id' => 'myId']);
```

#### Select Boxes

```php
$former->select('input_name', ['Option 1', 'Option 2'], 'value', ['class' => 'myClass', 'id' => 'myId']);
```

Calling the ```placeholder()``` method on a select box element will prepend an additional `<option></option>` 
tag to the list contained within, with an empty value by default.

#### Other inputs

To create other `<input>` elements, call the `input()` method, passing the desired input type 
as the first parameter.

```php
$former->input('color', 'color_picker', ['Option 1', 'Option 2'], 'value', ['class' => 'myClass', 'id' => 'myId']);
```

### Setting attributes with method chaining

Instead of passing an array of attributes when creating the element, they can be set after the
object is initialised, via method the ```attr()``` method.

```php
$former->text('name')->attr('class', 'myClass')->attr('id', 'myId');
```

Attributes can also be set by calling the method of the attribute you wish to set, passing in the 
value as the only parameter.

```php
$former->text('name')->class('myClass');
```

