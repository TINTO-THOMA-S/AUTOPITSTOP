<?php
	include_once("connections.inc");
	function setDatas($sql){
		mysql_query($sql);
	}
	
	function getDatas($sql){
		$dt = mysql_query($sql);
		$table = array();
		$rno = mysql_num_rows($dt);
		$cno = mysql_num_fields($dt);
		for($i=0;$i<$rno;$i++){
			$row = mysql_fetch_array($dt);
			for($j=0;$j<$cno;$j++){
				$table[$i][$j] = $row[$j];
			}
		}
		return $table;
	}
	
	function nextPage($path){
		echo "<script> parent.location.href='$path'; </script>";
	}
	
	function msgbox($msg){
		//$msg = str_replace("'","-",$msg);
		echo "<script> alert('$msg'); </script>";
	}
?>