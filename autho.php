<?php
if(isset($_GET['code'])){
	echo "code:".$_GET['code'];
}else{
	echo "error";	
}