<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    
    if ($action == "Getgroup"){
		getgroupdata_json();
	}elseif ($action == "Getcategory"){
		getcategory_json();
	}elseif ($action == "getcategory_json_by_cateid"){
		getcategory_json_by_cateid();
	}	
	
}

	
function getgroupdata_json() {
	include("connect_db.php");
	$sql = "SELECT * FROM webboard_group"; 
	$groupdata = $db_con->prepare($sql);
	$groupdata->execute();
	$result = $groupdata->fetchAll();
	header('Content-type: application/json');
	echo json_encode($result);
}

function getcategory_json() {
	include("connect_db.php");
	
	$sql = "SELECT ctr.ID,ctr.NAME,ctr.GROUP_ID as groupID FROM webboard_category ctr INNER JOIN webboard_group g ON g.ID=ctr.GROUP_ID"; 
	$groupdata = $db_con->prepare($sql);
	$groupdata->execute();
	$result = $groupdata->fetchAll();
	header('Content-type: application/json');
	echo json_encode($result);
}
function getcategory_json_by_cateid() {
	include("connect_db.php");
	
	$sql = "select ctr.ID , ctr.NAME , ctr.GROUP_ID from webboard_group g 
inner join webboard_category ctr on ctr.GROUP_ID = g.ID
where g.ID in (
SELECT ctr.GROUP_ID FROM webboard_category ctr WHERE ctr.ID = :cateid)"; 
	$groupdata = $db_con->prepare($sql);
	$groupdata->bindParam(":cateid",$_POST["category"], PDO::PARAM_INT);
	$groupdata->execute();
	$result = $groupdata->fetchAll();
	header('Content-type: application/json');
	echo json_encode($result);
}
function getpost_json() {
	include("connect_db.php");
	
	$sql = "SELECT post.ID,post.BODY,post.CATEGORY_ID,post.TITLE FROM webboard_post post INNER JOIN webboard_category ctr ON post.ID=ctr.ID"; 
	$groupdata = $db_con->prepare($sql);
	$groupdata->execute();
	$result = $groupdata->fetchAll();
	header('Content-type: application/json');
	echo json_encode($result);
}
?>