<?php 

require 'functions.php';

$from=$_GET['f'];
$to=$_GET['t'];

if(!isset($from))
{
    return 0;
}
$site="https://www.forbes.com/advisor/money-transfer/currency-converter/".$from."-".$to."/";

$html = curl($site);

$idom = new DOMDocument();
@$idom->loadHTML($html);
$ixpath = new DOMXPath($idom);
//   //div[@class='page-content']//li/a
//   //div[@id='list']//a
/*		------------------tes -------------------------------*/

$conversion= $ixpath->evaluate("//h2[@class='result-box-conversion']/span");

$data=floatval($conversion->item(0)->nodeValue);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
