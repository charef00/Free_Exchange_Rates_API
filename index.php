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
$data=array();
$array=array();
for ($i = 0; $i < $options->length; $i++) 
{
   $option=$options->item($i);
   $ele=array();
   array_push($ele,trim($option->getAttribute('value')));
   array_push($ele,trim($option->nodeValue));
   array_push($data,$ele);
}
$array['currencies']=$data;

header('Content-Type: application/json; charset=utf-8');
echo json_encode($array);