<?php
levenshtein();
//����û�о�������Ҫ֪�����������ж��Ĳ�ͬ��ʱ����������������������������ġ����ܱȽϳ������ַ����Ĳ�ͬ�̶ȡ�
$str1 = "carrot";
$str2 = "carrrott";
echo levenshtein($str1, $str2); //Outputs 2

get_defined_vars()
//����һ����debug����ʱ�ǳ����õĺ����������������һ����ά���飬������������ж�����ı�����
print_r(get_defined_vars());

ignore_user_abort();
//������������ܾ���������û���ִֹ�нű���������������¿ͻ��˵��˳��ᵼ�·������˽ű�ֹͣ���С�

highlight_string();
//�������PHP������ʾ��ҳ����ʱ��highlight_string()
//�����ͻ��Ե÷ǳ����á��������������ṩ��PHP���������õ�PHP�﷨ͻ����ʾ�������ɫ������ʾ��
//���������������������һ��������һ���ַ�������ʾ����ַ�����Ҫ��ͻ����ʾ��
//�ڶ�������������ó�TRUE����������ͻ�Ѹ�����Ĵ��뵱�ɷ���ֵ���ء�
php_strip_whitespace();
//�������Ҳ��ǰ���show_source()�������ƣ�������ɾ���ļ����ע�ͺͿո����
get_browser();
//����������ȡbrowscap.ini�ļ������������������Ϣ��

gzcompress(), gzuncompress()
//��������������ѹ���ͽ�ѹ�ַ������ݡ����ǵ�ѹ�����ܴﵽ50% ���ҡ�
//����ĺ��� gzencode() �� gzdecode() Ҳ�ܴﵽ���ƽ������ʹ���˲�ͬ��ѹ���㷨��

register_shutdown_function()
//����������ܹ��ڽű���ֹǰ�ص�ע��ĺ���,Ҳ���ǵ� PHP ����ִ����ɺ�ִ�еĺ�����


  $backtrace = debug_backtrace();
	    array_shift($backtrace);
//function	�ַ���	��ǰ�ĺ�������
//line	����	��ǰ���кš�
//file	�ַ���	��ǰ���ļ�����
//class	�ַ���	��ǰ������
//object	����	��ǰ����


//����php�����쳣
   set_error_handler ( array ('App', 'appError' ) );
     static public function appError($errno, $errstr, $errfile, $errline) {
    switch ($errno) {
    case E_ERROR :
      case E_USER_ERROR :
        $errorStr = "[$errno] $errstr " . basename ( $errfile ) . " �� $errline ��.";
        if (C ( 'LOG_RECORD' ))
          Log::write ( $errorStr, Log::ERR );
        halt ( $errorStr );
        break;
      case E_STRICT :
        case E_USER_WARNING :
          case E_USER_NOTICE :
            default :
              $errorStr = "[$errno] $errstr " . basename ( $errfile ) . " �� $errline ��.";
              Log::record ( $errorStr, Log::NOTICE );
              break;
    }
 
  //�����쳣
  set_exception_handler ( array ('App', 'appException' ) );
 
 //��ȡ��ǰ����ģʽ
    echo php_sapi_name();  
	   // ֻ������cli��������  
        if (php_sapi_name() != "cli"){  
            die("only run in command line mode\n");  
        }  

		
?>