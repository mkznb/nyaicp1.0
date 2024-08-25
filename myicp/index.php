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
		<style>
			button {
				display: inline;
			}
		</style>
	</head>
	<body>
		<div class="mdui-toolbar mdui-color-blue-700">
			<span class="mdui-typo-title"><?php echo $title; ?></span>
		</div>
		<div class="mdui-card mdui-m-x-2 mdui-p-x-2 mdui-p-b-2">
			<p class="mdui-typo-display-1 mdui-m-l-2"><?php echo $title; ?>查询</p>
			<?php
			function searchArray($array, $value) {
				$results = [];
				foreach($array as $key => $item) {
					if($item === $value) {
						$results[] = $array;
					} else if(is_array($item)) {
						$subResults = searchArray($item, $value);
						if(!empty($subResults)) {
							$results = array_merge($results, $subResults);
						}
					}
				}
				return $results;
			}
			$info = json_decode(file_get_contents("idinfo.json"), true);
			if(!empty($_GET["id"])) {
				$id = json_decode(file_get_contents("id.json"), true);
				$pendingid = json_decode(file_get_contents("pendingid.json"), true);
				if(in_array($_GET["id"], $id)) {
					$array = searchArray($info, $_GET["id"]);
					echo "<p class=\"mdui-typo-headline mdui-m-l-3\">{$_GET["id"]}</p><h4>域名: <a href=\"{$array[0]["domain"]}\">{$array[0]["domain"]}</a></h4><h4>介绍: {$array[0]["description"]}</h4><h4>站长: {$array[0]["master"]}</h4><h4>邮箱: {$array[0]["email"]}</h4>";	
				} else if(in_array($_GET["id"], $pendingid)) {
					echo "<p class=\"mdui-typo-headline mdui-m-l-3\">{$_GET["id"]}正在审核</p>";
				} else {
					echo "<p class=\"mdui-typo-headline mdui-m-l-3\">{$_GET["id"]}不存在</p>";
				}
			} else {
				$lastElement = end($info);
				echo "<form action=\"index.php\" method=\"GET\"><div class=\"mdui-textfield\"><input class=\"mdui-textfield-input\" type=\"text\" name=\"id\" placeholder=\"输入编号\" /></div><input type=\"submit\" class=\"mdui-btn mdui-btn-raised mdui-ripple mdui-color-teal\" value=\"查询\"></form><a href=\"join.php\"><button class=\"mdui-btn mdui-btn-raised mdui-ripple mdui-color-teal mdui-m-y-1\">立即加入</button></a><a href=\"about.php\"><button class=\"mdui-btn mdui-btn-raised mdui-ripple mdui-color-teal\">关于</button></a><a href=\"留言板/\"><button class=\"mdui-btn mdui-btn-raised mdui-ripple mdui-color-teal\">留言板</button></a><p>最后一个注册: {$lastElement["id"]} - {$lastElement["domain"]} - {$lastElement["description"]}</p>";
			}
			?>
			<h3>公告</h3>
			<p>暂时木有公告！</p>
		</div>
	</body>
<center>
<h3>Copyright &copy;2024 Miao ICP all right reserved</h3>
<h3>代码共享，作者泯轲，请勿盗取资源！！！</h3>
</center>
</html>