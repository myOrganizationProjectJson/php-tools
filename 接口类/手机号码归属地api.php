 <?php
   $number=$_REQUEST['phone'];
	    if($number){
    	    $xml=file_get_contents("http://www.096.me/api.php?phone=$number&mode=xml");
    	    $obj_xml=simplexml_load_string($xml);
    	     foreach($obj_xml->children() as $child)   //��ȡXML���������ÿһ���ӽڵ㣬Ҳ��һ������������Ķ���
    	     {
    	         echo $child->phonenum;
    	         echo $child->location;
    	         echo $child->phoneJx;
    	     }
	     }
?>