<?php

	setcookie('login',"", time()-13600, '/');
	header("Location: home.php");
?>