<?php
if(!empty($_POST["id"]) && !empty($_POST["domain"]) && !empty($_POST["description"]) && !empty($_POST["master"]) && !empty($_POST["email"])) {
	$data = json_decode(file_get_contents("id.json"), true);
	$pendingid = json_decode(file_get_contents("pendingid.json"), true);
	if(!in_array($_POST["id"], $data) && !in_array($_POST["id"], $pendingid)) {
		$pendingid[] = $_POST["id"];
		file_put_contents("pendingid.json", json_encode($pendingid));
		$data = json_decode(file_get_contents("pending.json"), true);
		$data[] = array("id" => $_POST["id"], "domain" => $_POST["domain"], "description" => $_POST["description"], "master" => $_POST["master"], "email" => $_POST["email"]);
		file_put_contents("pending.json", json_encode($data));
		header("Location: index.php?id={$_POST["id"]}");
	} else {
		header("Location: join.php?error=1");
		echo "<center><h1>已存在</h1></center>";
	}
} else {
	echo "<center><h1>你没有填写完整</h1></center>";
}