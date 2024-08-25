<!DOCTYPE html>
<html>
	<head>
		<title><?php ini_set("memory_limit", "512M"); $title = file_get_contents("title.txt"); echo $title; ?></title>
     <link href="favicon.ico" rel="shortcut icon" />
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/mdui.min.css"></link>
		<script src="js/mdui.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			p {
				display: inline;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body>
		<div class="mdui-toolbar mdui-color-blue-700">
			<span class="mdui-typo-title"><?php echo $title; ?></span>
		</div>
		<div class="mdui-card mdui-m-x-2 mdui-p-x-2 mdui-p-b-2" style="font-family:Roboto;">
			<h2 class="mdui-typo-display-1 mdui-m-l-2">选号</h1>
			<?php
			$data = json_decode(file_get_contents("id.json"), true);
			$year = date("Y");
			$number = [];
				for($j = 0; $j < 10000; $j++) {
					$number[] = $year . sprintf("%04d", $j);
				}
			$perPage = 50;
			$currentPage = isset($_GET["page"]) ? $_GET["page"] : 1;
			$totalPages = ceil(count($number) / $perPage);
			$startIndex = ($currentPage - 1) * $perPage;
			$currentPageNumbers = array_slice($number, $startIndex, $perPage);
			$pendingid = json_decode(file_get_contents("pendingid.json"), true);
			foreach($currentPageNumbers as $number) {
				if(!in_array($number, $data) && !in_array($number, $pendingid)) {
					echo "<p class=\"mdui-m-y-2 mdui-m-l-4\">$number</p><a href=\"join.php?id=$number\">选择</a>";
				}
			}
			echo "<br>";
			if($currentPage > 1) {
				echo "<a href=\"?page=" . ($currentPage - 1) . "\">上一页</a>";
			}
			if($currentPage < $totalPages) {
				echo "<a href=\"?page=" . ($currentPage + 1) . "\">下一页</a>";
			}
			?>
		</div>
	</body>
<center>
<h3>Copyright &copy;2024 Miao ICP all right reserved</h3>
<h3>代码共享，作者泯轲，请勿盗取资源！！！</h3>
</center>
</html>