<?php
if(!empty($_POST["name"]) && !empty($_POST["message"])) {
$list = json_decode(file_get_contents("list.json"), true);
$list[] = ["name" => $_POST["name"], "message" => $_POST["message"]];
file_put_contents("list.json", json_encode($list));
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php $title = file_get_contents("../title.txt"); $domain = file_get_contents("../domain.txt"); echo $title; ?></title>
     <link href="favicon.ico" rel="shortcut icon" />
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/mdui.min.css"></link>
		<script src="../js/mdui.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../custom.css">
	</head>
	<body>
		<div class="mdui-toolbar mdui-color-blue-700">
			<span class="mdui-typo-title"><?php echo $title; ?></span>
		</div>
		<div class="mdui-card mdui-m-x-2 mdui-p-x-2 mdui-p-b-2">
			<form action="index.php" method="post">
				<p>留言:</p>
				<input type="text" name="message">
				<p>名称:</p>
				<input type="text" name="name">
				<input type="submit" value="留言">
			</form>
			<?php
				$list = json_decode(file_get_contents("list.json"), true);
				foreach($list as $item) {
					echo "<h2>{$item["name"]}:</h2><pre>{$item["message"]}</pre>";
				}
			?>
		</div>
	</body>
<center>
<h3>Copyright &copy;2024 Miao ICP all right reserved</h3>
<img style="width:20px;height:20px;margin-bottom:-4px" src="https://icp.k9b.cn/img.jpg"><a href="https://icp.k9b.cn/?id=MiaoICP" target="_blank">MiaoICP</a>丨
<img style="width:20px;height:20px;margin-bottom:-4px" src="https://img2.imgtp.com/2024/05/13/hG8KCYmh.jpg"> <a href="https://icp.kldhsh.top/?id=202444" target="_blank">KLICP</a>丨 <a href="https://icp.gov.moe/?keyword=20240021" target="_blank ">
        <img style="width:20px;height:20px;margin-bottom:-4px" src="https://moe.one/view/img/ico64.png"/>MoeICP</a>
</center>
</html>