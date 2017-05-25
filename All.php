<?php

  require('simple_html_dom.php');
  include_once('Amazon.php');
  include_once('ebay.php');

  if(isset($_GET['q'])){
  
   $_SESSION['search']=$_GET['q'];
   $arr['Amazon']['title']=getTitleAma();
   $arr['Amazon']['Price']=getPriceAma();
   cleanAmazon();
   if(getTitleEbay()==null){
   $arr['ebay']['title']='not available';
   $arr['ebay']['Price']='not available';
   }
   else{
   $arr['ebay']['title']=getTitleEbay();
   $arr['ebay']['Price']=getPriceEbay();
   }
   echo json_encode($arr);
   cleanEbay();
 }
?>