<?php

 require('simple_html_dom.php');
	
	function getUrl(){
		if(isset($_GET['q'])){
		  $url=file_get_html("https://www.flipkart.com/search?q=".str_replace(' ','+',$_GET['q']));
   	      return $url;
		}
	}
	
	function getTitle(){
		if(!empty(getUrl())){
		$ul=getUrl()->find('div._3yI_5w',0);
		$div=$ul->find('div._3liAhj',0);
		$a=$div->find('a._2cLu-l',0);
		$text=$a->plaintext;
		return $text;
		}
	}
	
	function getPrice(){
		
		
	}
	
	function getJSON(){
		
	$arr['title']=getTitle();
	//$arr['Price']=getPrice();
	echo json_encode($arr);	
	}
	
	getJSON();





?>