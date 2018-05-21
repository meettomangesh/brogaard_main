<?php

class DB
{
	var $Host = DB_HOST;			// Hostname of our MySQL server
	var $Database = DB_NAME;		// Logical database name on that server
	var $User = DB_USER;			// Database user
	var $Password = DB_PASS;		// Database user's password
	var $Link_ID = 0;				// Result of mysql_connect()
	var $Query_ID = 0;				// Result of most recent mysql_query()
	var $Record	= array();			// Current mysql_fetch_array()-result
	var $Row;						// Current row number
	var $Errno = 0;					// Error state of query
	var $Error = "";
	
	function generateCode($length = 10) 
	{
	   $password="";
	   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	   srand((double)microtime()*1000000);
	   for ($i=0; $i<$length; $i++)
	   {
		  $password .= substr ($chars, rand() % strlen($chars), 1);
	   }
	   return $password;
	}
			
	function clean_mysql($value)
	{
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string"); // i.e. PHP >= v4.3.0
		if ($new_enough_php) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if ($magic_quotes_active) {
				$value = stripslashes($value);
			}
			$value = mysql_real_escape_string($value);
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if (!$magic_quotes_active) {
				$value = addslashes($value);
			}
			// if magic quotes are active, then the slashes already exist
		}
		return ($value);
	}

	
	

	function halt($msg)
	{
		echo("</TD></TR></TABLE><B>Database error:</B> $msg<BR>\n");
		echo("<B>MySQL error</B>: $this->Errno ($this->Error)<BR>\n");
		//die("Session halted.");
	}

	function connect()
	{
	  
		if($this->Link_ID == 0)
		{
			$this->Link_ID = mysql_connect($this->Host, $this->User, $this->Password);
			if (!$this->Link_ID)
			{
				$this->halt("Link_ID == false, connect failed");
			}
			$SelectResult = mysql_select_db($this->Database, $this->Link_ID);
			if(!$SelectResult)
			{
				$this->Errno = mysql_errno($this->Link_ID);
				$this->Error = mysql_error($this->Link_ID);
				$this->halt("cannot select database <I>".$this->Database."</I>");
			}
		}
	}

	function query($Query_String)
	{
		$this->connect();
		// mysql_query("SET NAMES 'utf-8'", $this->Link_ID);
		 //mysql_query("SET CHARACTER SET 'utf-8'",$this->Link_ID);
		 mysql_query("set time_zone='+05:30'",$this->Link_ID);
		$this->Query_ID = mysql_query($Query_String,$this->Link_ID);
		$this->Row = 0;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		if (!$this->Query_ID)
		{
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}

	function next_record()
	{
		$this->Record = mysql_fetch_array($this->Query_ID);
		$this->Row += 1;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$stat = is_array($this->Record);
		if (!$stat)
		{
			mysql_free_result($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $this->Record;
		
	}


	function get_last_id()
	{
		return mysql_insert_id(); 
	}
	

	function num_rows()
	{
		return mysql_num_rows($this->Query_ID);
	}

	function affected_rows()
	{
		return mysql_affected_rows($this->Link_ID);
	}

	function optimize($tbl_name)
	{
		$this->connect();
		$this->Query_ID = @mysql_query("OPTIMIZE TABLE $tbl_name",$this->Link_ID);
	}

	function clean_results()
	{
		if($this->Query_ID != 0) mysql_free_result($this->Query_ID);
	}

	function close()
	{
		if($this->Link_ID != 0) mysql_close($this->Link_ID);
	}	
######### Check Injection ################
	function no_injection($string){
	
	$string = htmlspecialchars($string);
	$string = trim($string);
	$string = stripslashes($string);
	$string = mysql_real_escape_string($string);
	
	return $string;
	}
######### End of Check Injection ################
}







class DB2
{
	var $Host = DB_HOST2;			// Hostname of our MySQL server
	var $Database = DB_NAME2;		// Logical database name on that server
	var $User = DB_USER2;			// Database user
	var $Password = DB_PASS2;		// Database user's password
	var $Link_ID = 0;				// Result of mysql_connect()
	var $Query_ID = 0;				// Result of most recent mysql_query()
	var $Record	= array();			// Current mysql_fetch_array()-result
	var $Row;						// Current row number
	var $Errno = 0;					// Error state of query
	var $Error = "";

	function halt($msg)
	{
		echo("</TD></TR></TABLE><B>Database error:</B> $msg<BR>\n");
		echo("<B>MySQL error</B>: $this->Errno ($this->Error)<BR>\n");
		//die("Session halted.");
	}

	function connect()
	{
	  
		if($this->Link_ID == 0)
		{
			$this->Link_ID = mysql_connect($this->Host, $this->User, $this->Password);
			if (!$this->Link_ID)
			{
				$this->halt("Link_ID == false, connect failed");
			}
			$SelectResult = mysql_select_db($this->Database, $this->Link_ID);
			if(!$SelectResult)
			{
				$this->Errno = mysql_errno($this->Link_ID);
				$this->Error = mysql_error($this->Link_ID);
				$this->halt("cannot select database <I>".$this->Database."</I>");
			}
		}
	}

	function query($Query_String)
	{
		$this->connect();
		// mysql_query("SET NAMES 'utf-8'", $this->Link_ID);
		 //mysql_query("SET CHARACTER SET 'utf-8'",$this->Link_ID);
		 mysql_query("set time_zone='+05:30'",$this->Link_ID);
		$this->Query_ID = mysql_query($Query_String,$this->Link_ID);
		$this->Row = 0;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		if (!$this->Query_ID)
		{
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}

	function next_record()
	{
		$this->Record = mysql_fetch_array($this->Query_ID);
		$this->Row += 1;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$stat = is_array($this->Record);
		if (!$stat)
		{
			mysql_free_result($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $this->Record;
		
	}


	function get_last_id()
	{
		return mysql_insert_id(); 
	}
	

	function num_rows()
	{
		return mysql_num_rows($this->Query_ID);
	}

	function affected_rows()
	{
		return mysql_affected_rows($this->Link_ID);
	}

	function optimize($tbl_name)
	{
		$this->connect();
		$this->Query_ID = @mysql_query("OPTIMIZE TABLE $tbl_name",$this->Link_ID);
	}

	function clean_results()
	{
		if($this->Query_ID != 0) mysql_free_result($this->Query_ID);
	}

	function close()
	{
		if($this->Link_ID != 0) mysql_close($this->Link_ID);
	}	
######### Check Injection ################
	function no_injection($string){
	
	$string = htmlspecialchars($string);
	$string = trim($string);
	$string = stripslashes($string);
	$string = mysql_real_escape_string($string);
	
	return $string;
	}
######### End of Check Injection ################
}





?>