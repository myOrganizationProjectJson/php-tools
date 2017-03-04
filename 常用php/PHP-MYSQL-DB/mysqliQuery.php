<?php
header("Content-type:text/html;charset=utf-8");
define ( 'RUIFENGCMS', '1' );
set_time_limit(0);
error_reporting(E_ALL^E_NOTICE);

$dbConfig=array(
    'DB_HOST'=>'localhost',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_NAME'=>'game',
    'DB_PORT'=>'3306',
    'DB_PREFIX'=>'rfcorp_'
    
);
define ( 'DB_CONFIG', serialize($dbConfig));
define ( 'DB_TIME_ZONE', '+8:00' );//+00:00
define ( 'DEFAULT_TIMEZONE', 'Asia/Shanghai' );//Etc/GMT


date_default_timezone_set(DEFAULT_TIMEZONE);
class mysqlSqlQuery{
    private  $dbhost;
    private  $dbuser;
    private  $dbpw;
    private  $dbname;
    private  $tablepre;
    public   $sql;
    /**
    * ���캯�� ��ʼ�������� 
    */
    public function __construct(){
        $CONFIG=unserialize(DB_CONFIG);
        
        $this->dbhost=$CONFIG['DB_HOST'];
        $this->dbuser=$CONFIG['DB_USER'];
        $this->dbpw=$CONFIG['DB_PWD'];
        $this->dbname=$CONFIG['DB_NAME'];
        
        $this->dbport=$CONFIG['DB_PORT'];
        $this->tablepre=$CONFIG['DB_PREFIX'];
    }
    /**
    * �������ݿ�
    */
    public function connects(){
        $con=new mysqli ( "$this->dbhost", "$this->dbuser", "$this->dbpw", "$this->dbname", "$this->dbport" );
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        $con->query('set names utf8');
        $con->query("set time_zone = '".DB_TIME_ZONE."';");
        
        return $con;
    }
  /**
   * insert����
   * @param �����ı��� $name
   * @param �������ֶ� $files
   * @param ���������� $data
   * @return resource
   */
    public function inserts($name,$files='',$data=''){
        $con=$this->connects();
        if(!empty($name)){
            $sql="INSERT INTO {$this->tablepre}$name ($files) VALUES ($data)";
        }
        if($this->sql==true){
            echo '<br/>';
            echo $sql;
        }
        $result=$con->query($sql);
        $con->close();
        return $result;
    }
    
    /**
     * ִ��һ��sql
     * @param ִ�е�sql $sql
     * @return multitype:
     */
    public function querys($sql=''){
        $con=$this->connects();
        if(empty($sql)){
            $sql="SELECT COUNT(*) TABLES, table_schema FROM information_schema.TABLES WHERE table_schema = '$this->dbname' GROUP BY table_schema";
        }
        if($this->sql==true){
            echo '<br/>';
            echo $sql;
        }
        $result=$con->query($sql);
        $con->close();
        return $result;
    }
  
}