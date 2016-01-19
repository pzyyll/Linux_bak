<?php
/**连接MYSQL函数
 *建议使用该函数
 * 连接MYSQL函数,通过常量的形式来连接数据库
 * 自定义配置文件，配置文件中自定义常量，包含需要使用的信息
 * @return resource
 */
function connect (){ 
    //连接mysql
    $link=@mysql_connect(DB_HOST,DB_USER,DB_PWD) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());
    //设置字符集
    mysql_set_charset(DB_CHARSET);
    //打开指定的数据库
    mysql_select_db(DB_DBNAME) or die('指定的数据库打开失败');
    return $link;
}
/**
 * 连接MYSQL函数
 * @param string $host
 * @param string $username
 * @param string $password
 * @param string $dbName
 * @param string $charset
 * @return resource
 */
function connect1($host,$username,$password,$dbName,$charset){
    //连接mysql
    $link=@mysql_connect($host,$username,$password) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());
    //设置字符集
    mysql_set_charset($charset);
    //打开指定的数据库
    mysql_select_db($dbName)or die('指定的数据库打开失败');    
    return $link;
    
}
//连接
/* $host='localhost';
$username='root';
$password='';
$charset='UTF8';
$dbName='homework';
$link=connect1($host, $username, $password, $dbName, $charset);
var_dump($link); */

/**
 * 连接MYSQL函数,需要在连接的时候传递一个数组
 * @param array $config
 * @return resource
 */
function connect2 ($config){
    //连接mysql
    $link=@mysql_connect($config['host'],$config['username'],$config['password']) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());
    //设置字符集
    mysql_set_charset($config['charset']);
    //打开指定的数据库
    mysql_select_db($config['dbName']) or die('指定的数据库打开失败');    
    return $link;
}
/* $config=array(
    'host'=>'localhost',
    'username'=>'root',
    'password'=>'',
    'charset'=>'UTF8',
    'dbName'=>'homework'    
);
$link=connect2($config);
var_dump($link); */

/**
 * 插入记录的操作
 * @param array $array
 * @param string $table
 * @return boolean
 */
function insert($array,$table){
    $keys=join(',',array_keys($array));
    $values="\"".join("\",\"", array_values($array))."\"";
    $sql="insert {$table}({$keys}) VALUES ({$values})";
    $res=mysql_query($sql) or die("插入失败:".mysql_error());
    if($res){
        return mysql_insert_id();
    }else{
        return false;
    }
}


/**
 * MYSQL更新操作
 * @param array $array
 * @param string $table
 * @param string $where
 * @return number|boolean
 */
function update($array,$table,$where=null){
    foreach ($array as $key=>$val){
        $sets.=$key."=\"".$val."\",";
    }
    $sets=rtrim($sets,','); //去掉SQL里的最后一个逗号
    $where=$where==null?'':' WHERE '.$where;
    $sql="UPDATE {$table} SET {$sets} {$where}";
    $res=mysql_query($sql) or die("<br/>更新失败:".mysql_error());
    if ($res){
        return mysql_affected_rows();
    }else {
        return false;
    }
}


/**
 * 删除记录的操作
 * @param string $table
 * @param string $where
 * @return number|boolean
 */
function delete($table,$where=null){
    $where=$where==null?'':' WHERE '.$where;
    $sql="DELETE FROM {$table}{$where}";
    $res=mysql_query($sql);
    if ($res){
        return mysql_affected_rows();
    }else{
        return false;
    }
}



/**
 * 查询一条记录
 * @param string $sql
 * @param string $result_type
 * @return boolean
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    if ($result && mysql_num_rows($result)>0){
        return mysql_fetch_array($result,$result_type);
    }else {
        return false;
    }
}





/**
 * 得到表中的所有记录
 * @param string $sql
 * @param string $result_type
 * @return boolean
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    if ($result && mysql_num_rows($result)>0){
        while ($row=mysql_fetch_array($result,$result_type)){
            $rows[]=$row;
        }
        return $rows;
    }else {
        return false;
    }
}


/**取得结果集中的记录的条数
 * @param string $sql
 * @return number|boolean
 */
function getTotalRows($sql){
    $result=mysql_query($sql);
    if($result){
        return mysql_num_rows($result);
    }else {
        return false;
    }
    
}

/**释放结果集
 * @param resource $result
 * @return boolean
 */
function  freeResult($result){
    return  mysql_free_result($result);
}



/**断开MYSQL
 * @param resource $link
 * @return boolean
 */
function close($link=null){
    return mysql_close($link);
}


/**得到客户端的信息
 * @return string
 */
function getClintInfo(){
    return mysql_get_client_info();
}


/**得到MYSQL服务器端的信息
 * @return string
 */
function getServerInfo($link=null){
    return mysql_get_server_info($link);
}



/**得到主机的信息
 * @return string
 */
function getHostInfo($link=null){
    return mysql_get_host_info($link);
}

/**得到协议信息
 * @return string
*/
function getProtoInfo($link=null){
    return mysql_get_proto_info($link);
}

/**使用表格显示多条记录
 * @return boolean
*/
function echoTInfos($rows,$keys){
	/*
	//获取表字段
	$keys = array_keys($item);
	
	//获取显示字段
	$values = array_values($item);
	
	//显示表头
	
	echo "<tr>";
	for($i=0;$i<count($values);$i++){
		echo "<th>$values[$i]</th>";
	}
	echo "</tr>"; 
	*/
	//显示具体信息
	for($i=0;$i<count($rows);$i++){
		echo "<tr>";
		for($j=0;$j<count($keys);$j++){
			echo "<td>{$rows[$i][$keys[$j]]}</td>";
		}
		echo "</tr>";
	}
	
}