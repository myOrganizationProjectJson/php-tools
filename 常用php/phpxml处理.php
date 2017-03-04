<?php

    /**
     * xml ת��������
     * $file �ļ�·��
     */
     function xml_to_array($file){
        if($this->xml_parser($file)==false){
            return false;
        }
        $array = (array)(simplexml_load_string($file));
        foreach ($array as $key=>$item){
            $array[$key]  =  $this->struct_to_array((array)$item);
        }
        return $array;
    }
     function struct_to_array($item) {
        if(!is_string($item)) {
            $item = (array)$item;
            foreach ($item as $key=>$val){
                $item[$key]  = $this->struct_to_array($val);
            }
        }
        return $item;
    }
   function xml_parser($str){
      $xml_parser = xml_parser_create();
      if(!xml_parse($xml_parser,$str,true)){
          xml_parser_free($xml_parser);
          return false;
      }else {
          return (json_decode(json_encode(simplexml_load_string($str)),true));
      }
  }

	/**
	 * תxml
	 * @param unknown $data
	 * @param string $rootNodeName
	 * @param number $stand
	 * @return mixed
	 */
	 function arraytoXml($data,$stand=1,$rootNodeName = 'resp'){
        header("Content-type: text/xml");
        $standalone='';
        ($stand==1)&&$standalone="standalone='yes'";
        $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8' $standalone ?><$rootNodeName />");
	
	    foreach($data as $key => $value){
	        if (is_numeric($key)){
	            $key = "unknownNode_". (string) $key;
	        }
	        $key = preg_replace('/[^a-z-_]/i', '', $key);
	        if (is_array($value)){
	            $node = $xml->addChild($key);
	            $this->toXml($value, $rootNodeName, $node);
	        }else{
	            $value = htmlentities($value);
	            $xml->addChild($key,$value);
	        }
	    }
	    $reXml=$xml->asXML();
	    
	    //����־
	    $backtrace = debug_backtrace();
	    array_shift($backtrace);
	    $this->setLog($reXml,$backtrace[0]['function']);
	    return $reXml;
	}
	
	
	
	////////
	//////////////////��ȡ���Ե�///////////////////////
	      $ptXml=file_get_contents($url);
     
        
         $doc=new DOMDocument();
         $doc->loadXML($ptXml);
         $A=$doc->getElementsByTagName("request");
         
         $A=$A->item(0)->getElementsByTagName("amount");
         
         $win=doubleval($A->item(0)->getattribute('wins'));
         
         $jackpot=doubleval($A->item(0)->nodeValue);
		 ///////////////////////////////////////////////////
		 
	
	
	
	
	
	
	