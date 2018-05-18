<?php
mysql_connect("localhost","soc_cmk","MsHrla5O");
mysql_select_db("soc_cmk") or die(mysql_error());
mysql_query("SET NAMES UTF8");
$data_select = array();
 //$sql = "select * from post where project_id=0 and deleted_at is null order by id asc ";
$sql = "select * from post where  deleted_at is null order by id asc ";
 //$sql = "select * from activity where type ='Activity' || type='Volunteer' limit0,50 order by id";
 //$sql = "select * from activity where id=173";
$result = mysql_query($sql) or die(mysql_error());
while ($data = mysql_fetch_array($result)) {

	$tag_data = array();
	$sql2 = "select * from taggables where taggable_id='$data[id]' and taggable_type='Post'";
	$result2 = mysql_query($sql2) or die(mysql_error());
	while ($tag = mysql_fetch_array($result2)) {
		$sql3 = "select name from tag where id='$tag[tag_id]'";
		$result3 = mysql_query($sql3) or die(mysql_error());
		list($tag_name)=mysql_fetch_row($result3);
		if($tag_name=="General"){
			$tag_name="Others";
		}
		$tag_data[]= $tag_name;
	}

	$comment_data = array();
	$sql4 = "select * from comment where commentable_id='$data[id]' and commentable_type='Post' and removed=0";
	$result4 = mysql_query($sql4) or die(mysql_error());
	while ($comment = mysql_fetch_array($result4)) {
		if(empty($comment['deleted_at'])){
			$created_comment = strtotime($comment['created_at']);
			$change_comment = strtotime($comment['updated_at']);
			$comment_data[]= array(
				"created"=>$created_comment,
				"change"=>$change_comment,
				"author_id"=>$comment['owner_id'],
				"content"=>$comment['content']
				);

		}
	

	}

	
	
	$created = strtotime($data['created_at']);
	$change = strtotime($data['updated_at']);
	// if($data['start_time']=="0000-00-00 00:00:00"){
	// 	$start_time="";
	// }else{
	// 	$start_time= $data['start_time'];
	// }

	// if($data['end_time']=="0000-00-00 00:00:00"){
	// 	$end_time="";
	// }else{
	// 	$end_time= $data['end_time'];
	// }

	$data_select[] = array(
		"id" => $data['id'],
		"created" => $created,
		"changed" => $change,
		"active"=>1,
		"author_id"=>$data['owner_id'],
		"title" => $data['name'],
		"url_rewirte" => "",
		"image"=>$data ['cover'],
		"content"=>$data ['content'],
		"comment"=> $comment_data,
		"hastag"=>$tag_data,
		"type"=>$data['type'],



	);
}

header ('Content-type: text/html; charset=utf-8');
header('Content-type: application/json;charset=utf-8');
echo json_encode($data_select, JSON_PRETTY_PRINT);


    // $handle  =  mysql_connect("localhost", "root", "") or die(mysql_error());
     
    //   mysql_query("changmakers",$handle);
    //   $query = "SELECT * FROM user";
    //   $result = mysql_query($query);
     
    //   while ($data = mysql_fetch_object($result)){
    //       $variable1 = $data->column1;
    //       $variable2 = $data->column2;
     
    //       mysql_query("changmakers_dev",$handle);
    //       $sql = "INSERT INTO table2 SET
    //               col1 = '$variable1',
    //               col2 = '$variable2'";
    //        if (!mysql_query($sql)) {
    //         echo '<p>Error adding data into database: ' . mysql_error() . '</p>';
    //        }
    //       mysql_query("USE database1",$handle);
     
    //   }

mysql_free_result($result);

// Database:	innerview_cmk
// Host:	localhost
// Username:	innerview_cmk
// Password:	olDHD5cyyQX74lYX