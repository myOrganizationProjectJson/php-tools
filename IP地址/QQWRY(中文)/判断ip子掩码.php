<?php
///////////////////ip2longһ����
function ip2int($ip){
	    list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip);
	    return ($ip1<<24)|($ip2<<16)|($ip3<<8)|($ip4);
	}
	
	
function ip2int($ip){
    //�����Ȱ�ip��Ϊ�Ķ�,$ip1,$ip2,$ip3,$ip4
    list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip);
    //Ȼ���һ�γ���256�����η����ڶ��γ���256��ƽ���������γ���256
    //�⼴�����ǵõ���ֵ
    return $ip1*pow(256,3)+$ip2*pow(256,2)+$ip3*256+$ip4;
}


///////////////////ip2longһ����


	

/**
 * �ж�ip �ǲ����� �������
 * @param  $CIDR
 * @param  $IP
 * @return boolean
 */
function netMatchW ($CIDR,$IP) {
	list ($net, $mask) = explode ('/', $CIDR);
	return ( ip2long ($IP) & ~((1 << (32 - $mask)) - 1) ) == ip2long ($net);
}

/**
 *  �ж�ip �ǲ����� ������� 192.168.0.1/24
 */
function netMatch($CIDR, $IP){
    list ($net, $mask) = explode ('/', $CIDR);
    $mask1 = 32 - $mask;
    return ((ip2long($IP) >> $mask1) == (ip2long($net) >> $mask1));
}

/**
 *  �ж�ip �ǲ����� ������� 192.168.0.1/255.255.255.0
 */
function ip_binay($ip){
    $ip_array = explode(".",$ip);
    $t = '';
    foreach($ip_array as $v)
    {
        $tmp = decbin($v);
        $tmp_len = strlen(decbin($v));
        if($tmp_len < 8)
            $t .= str_repeat( "0",(8 - $tmp_len) ).$tmp;
        else
            $t .= $tmp;
    }
    return $t;

}

$server_ip = "0.0.0.0"; //��ַ��

$mask_ip = "0.0.0.0"; //��������
$client_ip='192.168.1.11';//�ͻ���ip
echo $D=ip_binay($client_ip);
$is_ip_in=0;
$M = ip_binay($mask_ip);
$temp = $D & $M;
$N = ip_binay( $server_ip );
if( $temp == $N ){
    $is_ip_in=1;
}
if($is_ip_in){
    echo "���ip���ڸ������£�";
}else{
    echo 'NO';
}
