<?php

function clear_vars($var)
{
	$var = str_replace('<', '', $var);
	$var = str_replace('>', '', $var);
	$var = str_replace('|', '', $var);

	return $var;
}

function format_vars($vars = [], $startChar = '<', $endChar = '>', $separator = '|')
{
	$result = $startChar;
	$result .= implode($separator, $vars);
	$result .= $endChar;

	return $result;
}
