
<?php

	function get_extension($mail){
		$test = explode("@",$mail);
		return $test[1];
	}

	function get_id($mail){
		$test = explode("@",$mail);
		return $test[0];
	}

?>
