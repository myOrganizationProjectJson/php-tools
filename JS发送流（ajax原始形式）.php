<?php
/**
 * php ����http post get ����
 */
header("Content-type:text/html;charset=utf-8");
function send_post($url, $post_data) {
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'GET',//or GET
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // ��ʱʱ�䣨��λ:s��
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
//ʹ�÷���
$post_data = array(
    'username' => 'stclair2201',
  'password' => 'handan'
  );
  $result=send_post('http://www.ddf.com', $post_data);
  
  print_r($result);
  //PHP���շ���
  /**
   * $input=file_get_contents("php://input");
		file_put_contents("java.xml",$input);
		print_r($input);
   */
   
   
   
   
   
   
?>


<script>
//javascript������

function createXmlObj(){ 
	  var signatures = ["Msxml2.DOMDocument.5.0","Msxml2.DOMDocument.4.0","Msxml2.DOMDocument.3.0","Msxml2.DOMDocument","Microsoft.XmlDom"];
	  for(var i = 0;i<signatures.length;i++){ 
	   try{ 
	    var xmlDom = new ActiveXObject(signatures[i]); 
	   }catch(e){ 
	    //���Դ���,����������һ���汾 
	   } 
	  } 
	  return xmlDom.xml; 
	} 

	/* 
	����XMLHttpRequest������� 
	*/ 
	function createXMLhttp(){ 
	  var xmlhttp; 
	  try{ 
	   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
	  }catch(e){ 
	   try{ 
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
	   }catch(e){ 
	    try{ 
	     xmlhttp = new XMLHttpRequest(); 
	    }catch(e){} 
	   } 
	  } 
	  return xmlhttp; 
	} 

	function sendInfor(){ 
	//var XmlObj = createXmlObj(); 
	//alert(XmlObj); 
	//���ݲ�ͬ�������������ͬ��XMLHttpRequest���� 
	var xmlhttp = createXMLhttp(); 
	xmlhttp.open("post",'/index.php?s=/Index_ceshi',false); 
	//���������HTTPͷ 
	//xmlhttp.setRequestHeader("Content-Type"," application/utf-8 ");   
	     xmlhttp.setRequestHeader("Content-Type","text/html;charset=UTF-8");    
         xmlhttp.send("ceshiyixia"); 		
         //xmlhttp.send(JSON.stringify(objects)); 	//����json		 
	     xmlhttp.onreadystatechange=function(){ 
	     if (xmlhttp.readyState==4){ 
	          alert("���ͳɹ�!"); 
			  var aa = xmlhttp.responseText;
			  alert(aa);
	     } 
	   }   
	    //�������� 
	  
	   // var aa = xmlhttp.ResponseText;//�õ���̨���ݹ�����text�ı���Ϣ 
	
	
	//var test =xmlhttp.responseStream;//�õ���̨���ݹ�������������Ϣ--һ�㲻�� 
	//alert(aa); 
	//�Ѻ�̨���ݹ�������Ϣaa��js�ŵ�ҳ����ָ����λ�� 
	} 
</script>