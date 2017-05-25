<?php

	function getUrlAmazon(){
		  $a=$_SESSION['search'];
		  $url=file_get_html("http://www.amazon.in/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords=".str_replace(' ','+',$a));
   	      return $url;
	}
	
	function getTitleAma(){
		$ul=getUrlAmazon()->find('ul#s-results-list-atf',0);
		$li=$ul->find('li',0);
		$a=$li->find('a',1);
		$title=$a->plaintext;
		$arr=$title;
		return $arr;
	}
	
	function getPriceAma(){
		
		$ul=getUrlAmazon()->find('ul#s-results-list-atf',0);
		$li=$ul->find('li',0);
		$a=$li->find('a',4);
		$title=$a->plaintext;
		$arr=$title;
		return $arr;
	}
	function cleanAmazon(){
		$html=getUrlAmazon();
		$html->clear();
		unset($html);
	}
?>