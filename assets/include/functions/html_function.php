<?php
function getHtmlBody($html_path)
{
	$objHtml = new DOMDocument;
	$objBody = new DOMDocument;
	$objHtml->loadHTML(file_get_contents($html_path));
	$body = $objHtml->getElementsByTagName('body')->item(0);
	foreach ($body->childNodes as $child)
	{
    		$objBody->appendChild($objBody->importNode($child, true));
	}

	return $objBody->saveHTML();
}
?>