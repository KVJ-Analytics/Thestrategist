<?php 
	$config['img_path'] = '/cms/images/upload'; // Relative to domain name
	echo $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . $config['img_path'];
?>