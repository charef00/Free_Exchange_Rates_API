<?php 

require 'functions.php';

$site="https://www.forbes.com/advisor/money-transfer/currency-converter/mad-usd/";

$html = curl($site);

$idom = new DOMDocument();
@$idom->loadHTML($html);
$ixpath = new DOMXPath($idom);
//   //div[@class='page-content']//li/a
//   //div[@id='list']//a
/*		------------------tes -------------------------------*/

$options = $ixpath->evaluate("//select[@id='from_currency']/option");
//nodeValue
// getAttribute('value')
$data=[];
for ($i = 0; $i < $options->length; $i++) 
{
    
    
   $option=$options->item($i);
   $data[$i][0]=trim($option->getAttribute('value'));
   $data[$i][1]=trim($option->nodeValue);
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);