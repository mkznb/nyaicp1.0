<?php
$data = json_decode(file_get_contents("id.json"), true);
$pendingid = json_decode(file_get_contents("pendingid.json"), true);
if(in_array($_GET["id"], $data) || in_array($_GET["id"], $pendingid)) {
	header("Location: ?error=1");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php $title = file_get_contents("title.txt"); $domain = file_get_contents("domain.txt"); echo $title; ?></title>
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
		<?php
		if($_GET["error"] == 1) {
			echo "<h2 class=\"mdui-typo-display-1 mdui-m-l-2\">错误的ID</h2><p class=\"mdui-typo-headline mdui-m-l-3\">已被注册</p>";
		} else {
			if(isset($_GET["id"])) {
				if(isset($_GET["step"]) && $_GET["step"] == 2) {
					echo "<h2 class=\"mdui-typo-display-1 mdui-m-l-2\">提交信息</h2><form action=\"complete.php\" method=\"POST\"><div class=\"mdui-textfield\"><input class=\"mdui-textfield-input\" type=\"text\" name=\"id\" placeholder=\"ID\" value=\"{$_GET["id"]}\" /></div><div class=\"mdui-textfield\"><input class=\"mdui-textfield-input\" type=\"text\" name=\"domain\" placeholder=\"网站域名\" /></div><div class=\"mdui-textfield\"><input class=\"mdui-textfield-input\" type=\"text\" name=\"description\" placeholder=\"网站介绍\" /></div><input class=\"mdui-textfield-input\" type=\"text\" name=\"master\" placeholder=\"网站站主\" /><input class=\"mdui-textfield-input\" type=\"text\" name=\"email\" placeholder=\"邮箱\" /><input type=\"submit\" class=\"mdui-btn mdui-btn-raised mdui-ripple mdui-color-teal\" value=\"完成\"></div><form>";
				} else {
					echo "<h2 class=\"mdui-typo-display-1 mdui-m-l-2\">设置您的网站</h2><p class=\"mdui-typo-headline mdui-m-l-3\">在页脚添加代码</p><p>&lt;img style=&quot;width:20px;height:20px;margin-bottom:-4px&quot; src=&quot;https://icp.k9b.cn/img.jpg&quot;&gt;&lt;a href=&quot;https://$domain/?id={$_GET["id"]}&quot; target=&quot;_blank&quot;&gt;$title {$_GET["id"]}号&lt;/a&gt; </p><button class=\"mdui-btn mdui-btn-raised mdui-rippe mdui-color-teal\" onclick=\"window.location.href='?id={$_GET["id"]}&step=2'\">我已完成设置</button>";
				}
			} else {
				echo "<h2 class=\"mdui-typo-display-1 mdui-m-l-2\">$title 申请</h2><div class=\"mdui-typo-headline mdui-m-l-3\">要求</div><p><big>网站内容不涉及
商业/政治/色情/灰色/版权/破解/企业类</big><br><big>非空壳网站，能长期存活和更新，
无违反道德公序良俗，
已启用安全的HTTPS连接，
会按要求完成与喵喵备正确的对接！</big><br><big>申请约花费15分钟，审核约花费一周
请空闲时申请</big></p><br><p><big>决定了，那就来选个号吧！</big></p><button class=\"mdui-btn mdui-btn-raised mdui-ripple mdui-color-teal\" onclick=\"window.location.href='id.php'\">开始</button>";
			}
		}
		?>
		</div>
	</body>
<center>
<h3>Copyright &copy;2024 Miao ICP all right reserved</h3>
<h3>代码共享，作者泯轲，请勿盗取资源！！！</h3>
</center>
</html>