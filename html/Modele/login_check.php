<?php

function isLoggedIn(){
	if($_SESSION['isLoggedIn']==true){
		return true;
	}
	else{
		return false;
	}
}

?>