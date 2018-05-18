
<?php
mysql_connect("localhost","soc_cmk","MsHrla5O");
mysql_select_db("soc_cmk") or die(mysql_error());
mysql_query("SET NAMES UTF8");
mysql_query('SET CHARACTER SET utf8');
$data_select = array();
 $sql = "select * from knowledge where author_id not in(25,26,33,48,383,384,398,527,533,534,601,818,904,1071,1141,565,28,1174,540) order by id ASC";
 //$sql = "select * from activity where type ='Activity' || type='Volunteer' limit0,50 order by id";
 //$sql = "select * from activity where id=173";
$result = mysql_query($sql) or die(mysql_error());
while ($data = mysql_fetch_array($result)) {

	$tag_data = array();
	$sql2 = "select * from taggables where taggable_id='$data[id]' and taggable_type='Knowledge'";
	$result2 = mysql_query($sql2) or die(mysql_error());
	while ($tag = mysql_fetch_array($result2)) {
		$sql3 = "select name from tag where id='$tag[tag_id]'";
		$result3 = mysql_query($sql3) or die(mysql_error());
		list($tag_name)=mysql_fetch_row($result3);

		if($tag_name=="E-magazine"){
			$tag_name="Case";
		}
		if($tag_name=="Learning"){
			$tag_name="Articles";
		}

		$tag_data[]= $tag_name;
	}

	$comment_data = array();
	$sql4 = "select * from comment where commentable_id='$data[id]' and commentable_type='Knowledge' and removed=0";
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

	$file_data = array();
	$sql5 = "select * from file where fileable_id='$data[id]' and fileable_type='Knowledge' and removed=0";
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

	$image_data = array();
	$sql6 = "select * from image where imageable_id='$data[id]' and imageable_type='Knowledge' and removed=0";
	$result6 = mysql_query($sql6) or die(mysql_error());
	while ($images = mysql_fetch_array($result6)) {

		$created = strtotime($images['created_at']);
		$change = strtotime($images['updated_at']);
		$image_data[]= array(
			"created"=>$created,
			"change"=>$change,
			"url"=>$images['url'],
			"name"=>$images['name']
			);

	}

	
	
	$created = strtotime($data['created_at']);
	$change = strtotime($data['updated_at']);
	// if($data['created_at']=="0000-00-00 00:00:00"){
	// 	$start_time="";
	// }else{
	// 	$start_time= $data['created_at'];
	// }

	// if($data['end_time']=="0000-00-00 00:00:00"){
	// 	$end_time="";
	// }else{
	// 	$end_time= $data['end_time'];
	// }
	$content ="";
	$content = $data['overview'];
	$datacontent = json_decode($data['content']);
	if(count($datacontent)>0){
		// echo "<pre>";
		// print_r($datacontent);
		// echo "</pre>";
		foreach ($datacontent as $key => $value) {
			// echo "<pre>";
			// print_r($value);
			// echo "</pre>";	
			if(!empty($value->name)){
				$title = "<h3>".$value->name."</h3>";
				$content.= $title;
			}
			$content.= $value->content;

		}
	}
	//echo $content;
	$data_select[] = array(
		"id" => $data['id'],
		"created" => $created,
		"change" => $change,
		"active"=>$data['online'],
		"author_id"=>$data['author_id'],
		"title" => $data['name'],
		//"url_rewirte" => $data['url_rewirte'],
		"image"=>$data ['cover'],
		"content"=>$content,
		"comment"=> $comment_data,
		"hastag"=>$tag_data,
		"file"=>$file_data,
		"image_data" => $image_data,



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