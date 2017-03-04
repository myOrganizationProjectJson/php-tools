<?php


//server�� serverSoap.php

$soap = new SoapServer(null,array('uri'=>"http://192.168.1.179/"));//This uri is your SERVER ip.
$soap->addFunction('minus_func');                                                 //Register the function
$soap->addFunction(SOAP_FUNCTIONS_ALL);
$soap->handle();

function minus_func($i, $j){
    $res = $i - $j;
    return $res;
}

//client�� clientSoap.php
try {
    $client = new SoapClient(null,
        array('location' =>"http://192.168.1.179/test/serverSoap.php",'uri' => "http://127.0.0.1/")
    );
    echo $client->minus_func(100,99);

} catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}



////���ǿͻ��˵��÷������˺��������ӣ������ٸ��class�ġ�

//server�� serverSoap.php
$classExample = array();

$soap = new SoapServer(null,array('uri'=>"http://192.168.1.179/",'classExample'=>$classExample));
$soap->setClass('chesterClass');
$soap->handle();

class chesterClass {
    public $name = 'Chester';

    function getName() {
        return $this->name;
    }
}

//client�� clientSoap.php

try {
    $client = new SoapClient(null,
        array('location' =>"http://192.168.1.179/test/serverSoap.php",'uri' => "http://127.0.0.1/")
    );
    echo $client->getName();

} catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}
