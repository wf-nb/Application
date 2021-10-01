<?php
/**
 * Random Comic Images
 * @author: Weifeng
 * @link: https://wfblog.net
 * @version: 1.0
 */

error_reporting(0);
header('Access-Control-Allow-Origin: *');

$action = $_GET['action'];
$list = file('comic.full.txt'); //修改引号中的内容 comic.full.txt 或者 comic.simple.txt
$rand = rand(0,count($list));
$image_url = trim($list[$rand]);

if($action == 'open'){
    header('Content-type: image/jpeg');
    echo file_get_contents($image_url);
}elseif($action == '302'){
	header("HTTP/1.1 302"); 
	header("Location: $image_url");
}else{
	header('Content-type: application/json');
	$data = array(
	    "code" => 200,
		"msg" => "获取随机动漫图片成功",
		"data" => array(
			"url" => $image_url
		)
	);
	echo json_encode($data,JSON_UNESCAPED_UNICODE);
}
?>