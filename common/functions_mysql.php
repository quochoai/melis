<?php
#function included every pages
class mysql 
{
	// Define Variables
	var $errno;
	var $error;
	var $error_msg;
	var $link;
	var $sql;
	var $query;
	/*==========================*\
	|| Error Handling Functions ||
	\*==========================*/
	// PHP Equivalent: mysql_connect
	function connect($host, $user, $pass, $db) {
		$this->link = @mysqli_connect($host, $user, $pass, $db);
		if(!$this->link) {
			$this->errno = 0;
			$this->error = "Connection failed to " . $host . ".";
			$this->error_msg = $this->errno . ": " . $this->error;
			return $this->printError($this->error_msg,0);
		} else {
			return $this->link;
		}
	}
	// Get Errors
	function getError() {
		if(empty($this->error))
		{
			$this->errno = mysqli_errno($this->link);
			$this->error = mysqli_error($this->link);
		}
		return $this->error.' (code:'.$this->errno.')';
	}
	// Print Error Message
	function printError($msg1,$msg2) {
		printf("<b>ERROR! </b> %s <i>%s</i>", $msg1,$msg2);
		exit;
	}
	function close() {
		mysqli_close($this->link);
	}
    
	function query($sql) {  
		$query = mysqli_query($this->link, $sql);
		if(!$query) {
			$this->error_msg = $this->printError($this->link->error,$sql);
			return $this->error_msg;
		} else {
			return $query;
		}
	}
    function query_mysql($select,$table, $where = '1=1') {
	    $sql = "select $select from $table where $where";   
		$query = @mysqli_query($this->link, $sql);
		if(!$query) {
			$this->error_msg = $this->printError($this->getError(),$sql);
			return $this->error_msg;
		} else {
			return $query;
		}
	}
	function affected_rows() {
		return mysqli_affected_rows($this->link);
	}
	
	function escape_string($string) {
		return mysqli_escape_string($string);
	}
    
	function fetch_array($query) {
		return mysqli_fetch_array($query, MYSQLI_ASSOC);
	}
    
	function fetch_field($query) {
		$query = mysqli_fetch_field($query);
		if(!$query) {
			$this->errno = 0;
			$this->error = "No information available!";
			$this->error_msg = $this->errno . ": " . $this->error;
			return $this->printError($this->error_msg,0);
		} else {
			return $query;
		}
	}
	
	function fetch_row($query) {
		return mysqli_fetch_row($query);
	}
	
	function fetch_assoc($query) {
		return mysqli_fetch_assoc($query);
	}
		
	function free_result($query) {
		mysqli_free_result($query);
	}
	
	function insert_id() {
		return mysqli_insert_id($this->link);
	}

	function num_fields($query) {
		return mysqli_num_fields($query);
	}
	
	function num_rows($query) {
		return mysqli_num_rows($query);
	}

	function real_escape_string($string) {
		return mysqli_real_escape_string($this->link, $string);
	}
	
	function insert($data = array(),$table){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
	
	function update($data = array(),$table,$where=""){
		$values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
	
	function delete($table,$where){
		$sql = "delete from " . $table . $where;
		$query = $this->query($sql);
		return $query;
	}
	
	function mahoa($p) {
		$mk = "#*@".$p."#@*";
		$pass = md5($mk.substr(md5($mk), 2, 4));
		$p1 = md5(substr(md5($pass),2,17));
		$pass1 = md5(md5(md5($p1).substr(md5($p1), 1, 15)));
		$p2 = md5(md5(substr(md5($pass1),4,13)));
		$pass2 = md5(md5(md5($p2).substr(md5($p2), 5, 14)));
		$p3 = md5(md5(md5($pass2).substr($pass2,8,10)."!@#$"));
		$pass3 = md5(md5(md5($p3).substr($p3, 1, 9).'%^$#'));
		$p4 = md5(md5(md5($pass3).substr(md5($pass3),5,16))).'$#%^';
		$pass4 = md5(md5(md5($p4).substr(md5($p2), 3, 14).'!@$#%'));
        $p5 = md5(md5(md5($pass4).substr(md5($pass4),2,17))).'$#%^';
		$pass5 = md5(md5(md5($p5).substr(md5($p3), 3, 14).'!@$#%'));
        $p6 = md5(md5(md5($pass5).substr(md5($pass5),4,18))).'$#%^';
		$pass6 = md5(md5(md5($p6).substr(md5($p6), 1, 21).'!@$#%'));
        $p7 = md5(md5(md5($pass6).substr(md5($pass6),6,18))).'$#%^';
		$pass7 = md5(md5(md5($p7).substr(md5($p7), 2, 12).'!@$#%'));
		$password = substr(md5($pass6),5,9).':::'.md5(md5($pass7))."::".substr(md5($pass7),2,18).":#$*@!";
		return $password;
	}
    
	function login_user($user, $password, $remember) {
	   $tb = "admins";
       $su = $this->query("select id, user, pass from $tb where user = '$user' and kichhoat = 1 and deleted_at is null");
       $nu = $this->num_rows($su);
       if($nu){
            $ru = $this->fetch_array($su);
            $pass = $ru['pass'];
            if($password == $pass) {
                $_SESSION['is_logined'] = $ru['id'];
                if ($remember == 1) {
                    $cookie_value = $ru['id'];
                    setcookie('islogined', $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day 
                }
                $data['landangnhap'] = date("Y-m-d H:i:s");
                $update_login = $this->update($data, $tb, " where id = ".$ru['id']);
                
                $data_log['log_type'] = 1;
                $data_log['content'] = "Đăng nhập tại IP: ".$_SERVER['REMOTE_ADDR'];
                $data_log['created_by'] = $ru['id'];
                $data_log['created_at'] = date("Y-m-d H:i:s");
                $sin = $this->insert($data_log, "logs");
                echo '1';
            } else echo '3'; 
       } else echo '2';
	}
    // insert data
    function insertData($data = array(),$table){
		$key = "";
		$value = "";
        $created_at = $updated_at = date("Y-m-d H:i:s");
        foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
        $key .= ",created_at";
        $value .= ",'" .$created_at."'";
        $key .= ",updated_at";
        $value .= ",'" .$updated_at."'";
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
    function insertDataBy($data = array(),$table, $user_id){
		$key = "";
		$value = "";
        $created_at = $updated_at = date("Y-m-d H:i:s");
        foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
        $key .= ",created_by";
        $value .= ",'" .$user_id."'";
        $key .= ",updated_by";
        $value .= ",'" .$user_id."'";
        $key .= ",created_at";
        $value .= ",'" .$created_at."'";
        $key .= ",updated_at";
        $value .= ",'" .$updated_at."'";
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
    function updateData($data = array(), $table, $where = ""){
        $value = "";
		foreach($data as $k => $v){
			$value .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
        $value .=", updated_at = '" . date("Y-m-d H:i:s") ."' "; 
		if($value{0} == ",") $value{0} = " ";
		$sql = "update " . $table . " set " . $value.$where;
		$query = $this->query($sql);
		return $query;
	}
    function updateDataBy($data = array(), $table, $where = "", $user_id){
        $value = "";
		foreach($data as $k => $v){
			$value .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
        $value .=", updated_by = '" .$user_id ."' ";
        $value .=", updated_at = '" . date("Y-m-d H:i:s") ."' "; 
		if($value{0} == ",") $value{0} = " ";
		$sql = "update " . $table . " set " . $value.$where;
		$query = $this->query($sql);
		return $query;
	}
    function softDelete($table, $where){
        $values = " deleted_at = '".date("Y-m-d H:i:s")."'";
        $sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
    function softDeleteBy($table, $where, $user_id){
        $values = " deleted_by = '".$user_id."' ";
        $values .= ", deleted_at = '".date("Y-m-d H:i:s")."' ";
        $sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
    // count number record
    function number_record($table, $where = '1')
    {
        $s = $this->query("select count(id) as number_record from $table where $where");
        $r = $this->fetch_array($s);
        return $r['number_record'];
    }
    
	// get data all record
    function getAll($select = '*', $table, $where = '1=1', $order = "id desc")
    {
        $data = array();
        $s = $s = $this->query("select $select from $table where $where order by $order");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
    // get data 1 record (include max, min, average)
    function getOne($select = "*", $table, $where = '1', $order = "id desc")
    {
        $s = $s = $this->query("select $select from $table where $where order by $order");
        $r = $this->fetch_array($s);  
        return $r;
	}
	
    // get data by id
    function getById($select = "*", $table, $id, $where = "") 
    {
        $s = $this->query("select $select from $table where id = $id $where");
        $r = $this->fetch_array($s);
        return $r;
    }
    // get max
    function getMax($select = "id", $table, $where = "") {
        if ($where != "")
            $w = "where $where";
        else
            $w = "";
        $s = $this->query("select max($select) as maxs from $table $w");
        $r = $this->fetch_array($s);
        return $r;
    }
}
