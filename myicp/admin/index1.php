<?php
file_put_contents("fail.json", "[]");
include "../password.php";
function searchAndMoveValue($jsonFile1, $jsonFile2, $key, $value) {
	$arr1 = json_decode(file_get_contents($jsonFile1), true);
	$arr2 = json_decode(file_get_contents($jsonFile2), true);

	foreach($arr1 as $index => $array) {
		if(isset($array[$key]) && $array[$key] == $value) {
			$movedArray = array_splice($arr1, $index, 1);
			array_push($arr2, $movedArray[0]);
			file_put_contents($jsonFile1, json_encode($arr1));
			file_put_contents($jsonFile2, json_encode($arr2));
			return true;
		}
	}
	return false;
}

function searchAndMoveValue2(string $sourceFile, string $targetFile, $value) {
	$sourceJson = file_get_contents($sourceFile);
	$sourceArray = json_decode($sourceJson, true);
	$targetJson = file_get_contents($targetFile);
	$targetArray = json_decode($targetJson, true);
	$key = array_search($value, $sourceArray);
	if($key !== false) {
		unset($sourceArray[$key]);
	}
	$targetArray[] = $value;
	file_put_contents($sourceFile, json_encode($sourceArray));
	file_put_contents($targetFile, json_encode($targetArray));
}

if(!empty($_GET["password"]) && $_GET["password"] == $password) {
	if(!empty($_GET["pass"])) {
		searchAndMoveValue("../pending.json", "../idinfo.json", "id", $_GET["pass"]);
		searchAndMoveValue2("../pendingid.json", "../id.json", $_GET["pass"]);
	}
	if(!empty($_GET["fail"])) {
		searchAndMoveValue("../pending.json", "fail.json", "id", $_GET["fail"]);
		searchAndMoveValue2("../pendingid.json", "fail.json", $_GET["fail"]);
	}
	echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title>后台</title>";
	$data = json_decode(file_get_contents("../pending.json"), true);
	foreach($data as $item) {
		echo "ID: {$item["id"]}<br>域名: {$item["domain"]}<br>介绍: {$item["description"]}<br>站长: {$item["master"]}<br>邮箱: {$item["email"]}<br><a href=\"?pass={$item["id"]}&password={$_GET["password"]}\">通过</a><br><a href=\"?fail={$item["id"]}&password={$_GET["password"]}\">阻止</a><br><br>";
	}
} else {
echo "<center><p style=\"font-size: 10vw;\">你想登录后台?</p><p style=\"font-size: 50vw;color: #f00;\">6</p></center>";
}
