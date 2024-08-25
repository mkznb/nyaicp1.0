<!DOCTYPE html>
<html>
	<head>
		<title><?php $title = file_get_contents("title.txt"); $domain = file_get_contents("domain.txt"); echo $title; ?></title>
     <link href="favicon.ico" rel="shortcut icon" />
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/mdui.min.css"></link>
		<script src="js/mdui.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body>
		<div class="mdui-toolbar mdui-color-blue-700">
			<span class="mdui-typo-title"><?php echo $title; ?></span>
		</div>
		<div class="mdui-card mdui-m-x-2 mdui-p-x-2 mdui-p-b-2">
			<p class="mdui-typo-display-1 mdui-m-l-2">关于<?php echo $title; ?></p>
			<p>请在这里填写您的简介<br>本页面可以使用html元素编辑<br>本网站代码制作者:泯轲<br>如有问题联系邮箱3589067134@qq.com</p>
		</div>
	</body>
<center>
<h3>Copyright &copy;2024 Miao ICP all right reserved</h3>
<h3>代码共享，作者泯轲，请勿盗取资源！！！</h3>
</center>
</html>