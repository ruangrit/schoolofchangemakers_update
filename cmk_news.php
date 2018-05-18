<?php
mysql_connect("localhost","soc_cmk","MsHrla5O");
mysql_select_db("soc_cmk") or die(mysql_error());
mysql_query("SET NAMES UTF8");
$data_select = array();
// $sql = "select * from user where id BETWEEN 241 AND 250";
 $sql = "select * from activity where type ='news' || type='competition' || type='opportunity'  order by id ASC ";
// $sql = "select * from activity where id=173";
$result = mysql_query($sql) or die(mysql_error());
while ($data = mysql_fetch_array($result)) {

	$tag_data = array();
	$sql2 = "select * from taggables where taggable_id='$data[id]' and taggable_type='Activity'";
	$result2 = mysql_query($sql2) or die(mysql_error());
	while ($tag = mysql_fetch_array($result2)) {
		$sql3 = "select name from tag where id='$tag[tag_id]'";
		$result3 = mysql_query($sql3) or die(mysql_error());
		list($tag_name)=mysql_fetch_row($result3);

		$tag_data[]= $tag_name;
	}

	$comment_data = array();
	$sql4 = "select * from comment where commentable_id='$data[id]' and commentable_type='Activity'   and removed=0";
	$result4 = mysql_query($sql4) or die(mysql_error());
	while ($comment = mysql_fetch_array($result4)) {

		$created_comment = strtotime($comment['created_at']);
		$change_comment = strtotime(@$comment['update_at']);
		$comment_data[]= array(
			"created"=>$created_comment,
			"change"=>$change_comment,
			"author_id"=>$comment['owner_id'],
			"content"=>$comment['content']
			);

	}

	$file_data = array();
	$sql5 = "select * from file where fileable_id='$data[id]' and fileable_type='Activity' and removed=0";
	$result5 = mysql_query($sql5) or die(mysql_error());
	while ($file = mysql_fetch_array($result5)) {

		$created_file = strtotime($file['created_at']);
		$change_file = strtotime($file['updated_at']);
		$file_data[]= array(
			"created"=>$created_file,
			"change"=>$change_file,
			"url"=>$file['url'],
			"name"=>$file['name'],
			"path"=>$file['path'],
			);

	}

	$created = strtotime($data['created_at']);
	$change = strtotime($data['updated_at']);
	if($data['start_time']=="0000-00-00 00:00:00"){
		$start_time="";
	}else{
		$start_time= $data['start_time'];
	}

	$data_select[] = array(
		"id" => $data['id'],
		"created" => $created,
		"changed" => $change,
		"active"=>$data['online'],
		"author_id"=>$data['author_id'],
		"start_time"=>$start_time,
		"end_time"=>$data['end_time'],
		"title" => $data['name'],
		"url_rewrite" => $data['url_rewrite'],
		"image"=>$data ['cover'],
		"content"=>$data ['content'],
		"comment"=> $comment_data,
		"hastag"=>$tag_data,
		"file"=>$file_data,
		"type"=>ucfirst($data['type'])

	);
}

header('Content-type: application/json');
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