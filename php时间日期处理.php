<?php   
     date("Y-m-d H:i:s")
	
	 echo strtotime(date("Y-m-d")); //ʱ���
	
  	 $today=date("Y-m-d H:i:s"); 
	 
     $todays=date("Y-m-d",strtotime('+1 day'));//����

     $Lstart=date("Ym01",strtotime("$create_time -1 month")); //�ϸ��µ�һ��
	 
	  $Lend=date("Ymd",strtotime("$Lstart +1 month -1 day"));//�������һ��

     $today=strtotime($today);
     $todays=strtotime($todays);