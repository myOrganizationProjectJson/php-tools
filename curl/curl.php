<?php



	 function curlJson($url,$data='',$H='',$type='POST'){
	   // $data_string = json_encode($data);
	    //echo $data_string;
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        //curl_setopt($ch, CURLOPT_NOSIGNAL,true);//֧�ֺ��뼶��ʱ����
        //curl_setopt($ch, CURLOPT_TIMEOUT_MS,1);  //��ʱ���룬cURL 7.16.2�б����롣��PHP 5.2.3��
		//curl_setopt($ch, CURLOPT_TIMEOUT,1); //���ó�ʱ
	    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //����֤֤��
	    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //����֤֤��
	    curl_setopt($ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	   // curl_setopt($ch, CURLOPT_HTTPHEADER, $H );
	    $result = curl_exec($ch);

	    return $result;
	}

	echo curlJson("http://www.baishunkang.com/test.php");
	
	file_put_contents('test.xml', microtime(true));
   /**
    * curl
    * @param unknown $url
    * @param unknown $data
    * @param unknown $H
    * @return mixed
    */
    function curlRequest($url,$data='',$type='POST'){
        if($type=='GET')
          ECHO $url=$url.'?'.http_build_query($data);
       $ch = curl_init($url);
      // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //����֤֤��
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //����֤֤��
       curl_setopt($ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       //curl_setopt($ch, CURLOPT_HTTPHEADER, $H );
       $result = curl_exec($ch);
       
       print_r($result);
       
       return $result;
   }
	
	
	
	
	 /**
    * ���������Ա�HTML��ʽ���죨Ĭ�ϣ�
    * @param $para_temp �����������
    * @param $method �ύ��ʽ������ֵ��ѡ��post��get
    * @param $button_name ȷ�ϰ�ť��ʾ����
    * @return �ύ��HTML�ı�
    */
   function buildRequestForm($url,$para_temp,$method='POST', $button_name='') {
   
       $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='".$url."' method='".$method."'>";
       while (list ($key, $val) = each ($para_temp)) {
           $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
       }
        if($button_name)
        $sHtml = $sHtml."<input type='submit' value='".$button_name."'></form>";
        $sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
   
       return $sHtml;
   }
   
   
   
   //curl ���� socket5
   function agent(){
		$curl=curl_init();
		curl_setopt($curl,CURLOPT_URL, "http://www.24k88.com");
		//curl_setopt($curl,CURLOPT_HEADER,1);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_POST,1);
		
		///����
		curl_setopt($curl,CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);//ʹ����SOCKS5����
		curl_setopt($curl, CURLOPT_PROXY, "61.218.72.2:9999");
		curl_setopt ($ch, CURLOPT_PROXYUSERPWD, "botulism:MwutduPBSGWwf");
		///����
		
		//$data = array('user' => "geek", 'password' => 'fuck');
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, 1);�����HTTP����
		//curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');cookie�㶮��
		
		
		///֤��
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);   // ֻ����CA�䲼��֤��  
        curl_setopt($ch, CURLOPT_CAINFO, $cacert); // CA��֤�飨������֤����վ֤���Ƿ���CA�䲼��  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // ���֤�����Ƿ�������
		
		
		echo $request = curl_exec($curl);
		//var_dump($request);
		curl_close($curl);

   
   }
	
	
	
	/*
	*
curl_setopt($tuCurl, CURLOPT_URL, $url);
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, $header);
curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($tuCurl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($tuCurl, CURLOPT_SSLCERT, $path . '.pem');
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_SSLKEY, $path . '.key');

	*/
?>



