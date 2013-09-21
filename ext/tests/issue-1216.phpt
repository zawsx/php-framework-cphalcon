--TEST--
XSS - https://github.com/phalcon/cphalcon/issues/1216
--SKIPIF--
<?php include('skipif.inc'); ?>
--FILE--
<?php
$di = new \Phalcon\DI\FactoryDefault();
$e  = new \Phalcon\Forms\Element\Text('TEXT');
echo \Phalcon\Tag::linkTo(array('url"', '<>', 'class' => 'class"')), PHP_EOL;
echo \Phalcon\Tag::textField(array('name"', 'class' => 'class"')), PHP_EOL;
echo \Phalcon\Tag::checkField(array('name"', 'class' => 'class"')), PHP_EOL;
echo \Phalcon\Tag::form(array('<', 'method' => '>')), PHP_EOL;
echo \Phalcon\Tag::textArea(array('<', 'cols' => '<')), PHP_EOL;
echo \Phalcon\Tag::stylesheetLink(array('href' => '<', 'local' => false, 'type' => '>')), PHP_EOL;
echo \Phalcon\Tag::javascriptInclude(array('src' => '<', 'local' => false, 'type' => '>')), PHP_EOL;
echo \Phalcon\Tag::image(array('src' => '<', 'alt' => '>'), false), PHP_EOL;
echo \Phalcon\Tag::tagHtml('br', array('class' => '<'), true, false, false), PHP_EOL;
echo \Phalcon\Tag\Select::selectField(array('name' => '<', 'value' => '>', 'id' => ''), array('"' => '"', '>' => 'test')), PHP_EOL;
echo "DONE", PHP_EOL;
?>
--EXPECT--
<a href="/tests/url&quot;" class="class&quot;"><></a>
<input type="text" class="class&quot;" name="name&quot;" id="name&quot;" value="" />
<input type="checkbox" class="class&quot;" name="name&quot;" id="name&quot;" value="" />
<form method="&gt;" action="/tests/&lt;">
<textarea cols="&lt;" name="&lt;" id="&lt;"></textarea>
<link rel="stylesheet" href="&lt;" type="&gt;" />

<script src="&lt;" type="&gt;"></script>

<img src="&lt;" alt="&gt;" />
<br class="&lt;" />
<select name="&lt;" id="">
	<option value="&quot;">"</option>
	<option selected="selected" value="&gt;">test</option>
</select>
DONE
