<?php
        
	function getUrlEbay(){
		 $a=$_SESSION['search'];		 
		 $url=file_get_html("http://www.ebay.in/sch/i.html?_from=R40&_sacat=0&_nkw=".str_replace(' ','+',$a));
   	      return $url;
    }
	
	function getTitleEbay(){
		 $ul=getUrlEbay()->find('ul#ListViewInner',0);
		 if($ul==null){
		    return null;   
	     }
	  else{
		  
		  $li=$ul->find('li#item3ada490b19',0);
		    if($li==null){
		      return null;	 
		   }
		    else{
		    $h=$li->find('h3.lvtitle',0);
		    $a=$h->find('a',0);
		    $title=$a->plaintext;
	        return $title;
		}
		  
	  }
	}
	
	function getPriceEbay(){
		$ul=getUrlEbay()->find('ul#ListViewInner',0);
		$li=$ul->find('li#item3ada490b19',0);
		$ul1=$li->find('ul.lvprices',0);
		$li1=$ul1->find('li.lvprice',0);
		$span=$li1->find('span.bold',0);
		$text=$span->plaintext;
		return $text;
	}
	
	function cleanEbay(){
		$html=getUrlEbay();
		$html->clear();
		unset($html);
	}
	function customError() {
     $error = error_get_last();
     if ($error['type'] === E_ERROR) { 
         echo 'fatal ocuurs';     
     } 
  }
  
  register_shutdown_function('customError');
  
?>