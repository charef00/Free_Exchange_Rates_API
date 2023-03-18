
<?php 

require 'functions.php';

$from=$_GET['f'];
$to=$_GET['t'];

if(!isset($from))
{
    return 0;
}
$site="https://themoneyconverter.com/".$from."/".$to;

$html = curl($site);

$idom = new DOMDocument();
@$idom->loadHTML($html);
$ixpath = new DOMXPath($idom);
//   //div[@class='page-content']//li/a
//   //div[@id='list']//a
/*		------------------tes -------------------------------*/


//nodeValue
// getAttribute('value')
$orgin="https://themoneyconverter.com/";

$items= $ixpath->evaluate("/html/body/main/div[1]/div[2]/aside[1]/img");
$img=trim($orgin.$items->item(0)->getAttribute('src'));

$items= $ixpath->evaluate("/html/body/main/div[1]/div[2]/aside[1]/dl/dd[4]");
$symbol=trim($items->item(0)->nodeValue);


$from = array(
                "img"=>$img,
                 "symbol"=>$symbol
                );
$items= $ixpath->evaluate("/html/body/main/div[1]/div[2]/aside[2]/img");
$img=trim($orgin.$items->item(0)->getAttribute('src'));
                
$items= $ixpath->evaluate("/html/body/main/div[1]/div[2]/aside[2]/dl/dd[4]");
$symbol=trim($items->item(0)->nodeValue);
$to = array(
                "img"=>$img,
                "symbol"=>$symbol
                );
$items= $ixpath->evaluate("/html/body/main/div[1]/div[1]/form/div[1]/span");
$converter=trim($items->item(0)->nodeValue);
$arr=explode('=',$converter);
$converter=trim($arr[1]);
$data = array();
$data['converter'] = $converter;
$data['from'] = $from;
$data['to'] = $to;

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
