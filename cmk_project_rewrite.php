<?php
mysql_connect("localhost","soc_cmk","MsHrla5O");
mysql_select_db("soc_cmk") or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sub_project = array();
   $sql = "select * from project where  deleted_at is null order by updated_at desc";
   
 //$sql = "select * from project where id =97";
 $result =mysql_query($sql) or die(mysql_error());
 while ($data = mysql_fetch_array($result)) {


			$tag_data = array();
			$sql2 = "select * from taggables where taggable_id='$data[id]' and taggable_type='Project'";
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
			$feed_data = array();
			$sql_timeline = "select * from feedables where feedable_id='$data[id]' and feedable_type='Project' ";
			$result_timeline = mysql_query($sql_timeline) or die(mysql_error());
			while ($timeline = mysql_fetch_array($result_timeline)) {
				$sql_feed = "select * from feed where id='$timeline[feed_id]'";
				$result_feed = mysql_query($sql_feed) or die(mysql_error());
				$feed = mysql_fetch_array($result_feed);

				$comment_data = array();
				$sql4 = "select * from comment where commentable_id='$feed[id]' and commentable_type='Feed' and removed=0 and deleted_at is null ";
				$result4 = mysql_query($sql4) or die("comment Error".mysql_error());
				while ($comment = mysql_fetch_array($result4)) {

					if(empty($comment['deleted_at'])){
						$created_comment = strtotime($comment['created_at']);
						$change_comment = strtotime($comment['updated_at']);
						if(!empty($created_comment)){
						$comment_data[]= array(
							"created"=>$created_comment,
							"change"=>$change_comment,
							"author_id"=>$comment['owner_id'],
							"content"=>$comment['content']
							);
						}

					}

				}
				$feed_create = strtotime($feed['created_at']);
				$feed_change = strtotime($feed['updated_at']);
				if(!empty($feed_create)){
				$feed_data[] =array(
					"author_id"=>$feed['owner_id'],
					"feed_id"=>$feed['id'],
					"created"=>$feed_create,
					"change"=>$feed_change,
					"content"=>$feed['content'],
					"status"=>$feed['privacy'],
					"comment"=> $comment_data,
					);
				}



			}

				// Community
			$data_community = array();
			 $sql_com = "select * from post where project_id='$data[id]' and deleted_at is null order by id ";
			 //$sql = "select * from activity where type ='Activity' || type='Volunteer' limit0,50 order by id";
			 //$sql = "select * from activity where id=173";
			$result_com = mysql_query($sql_com) or die(mysql_error());
			while ($data_com = mysql_fetch_array($result_com)) {

				$tag_data = array();
				$sql2 = "select * from taggables where taggable_id='$data_com[id]' and taggable_type='Post'";
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
				$sql4 = "select * from comment where commentable_id='$data_com[id]' and commentable_type='Post' and removed=0";
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

				
				
				$created = strtotime($data_com['created_at']);
				$change = strtotime($data_com['updated_at']);
				// if($data_com['start_time']=="0000-00-00 00:00:00"){
				// 	$start_time="";
				// }else{
				// 	$start_time= $data_com['start_time'];
				// }

				// if($data_com['end_time']=="0000-00-00 00:00:00"){
				// 	$end_time="";
				// }else{
				// 	$end_time= $data_com['end_time'];
				// }

				$data_community[] = array(
					"created" => $created,
					"change" => $change,
					"p_id"=>$data_com['id'],
					"active"=>1,
					"author_id"=>$data_com['owner_id'],
					"title" => $data_com['name'],
					"url_rewirte" => "",
					"image"=>$data_com ['cover'],
					"content"=>$data_com ['content'],
					"comment"=> $comment_data,
					"hastag"=>$tag_data,
					"type"=>$data_com['type'],



				);
			}


			// End community

			
			$image_data = array();
			$sql6 = "select * from image where imageable_id='$data[id]' and imageable_type='Project' and removed=0";
			$result6 = mysql_query($sql6) or die(mysql_error());
			while ($images = mysql_fetch_array($result6)) {

				$created = strtotime($images['created_at']);
				$change = strtotime($images['updated_at']);
				$image_data[]= array(
					"id"=>$images['id'],
					"created"=>$created,
					"change"=>$change,
					"url"=>$images['url'],
					"name"=>$images['name']
					);

			}


			$sql5= "select * from project where id='$data[id]'";
			$result5 = mysql_query($sql5) or die(mysql_error());
			$data_p = mysql_fetch_array($result5);
			$created = strtotime($data['created_at']);
			$change = strtotime($data['updated_at']);
			// if($sub['start_time']=="0000-00-00 00:00:00"){
			// 	$start_time="";
			// }else{
			// 	$start_time= $sub['start_time'];
			// }

			// if($sub['end_time']=="0000-00-00 00:00:00"){
			// 	$end_time="";
			// }else{
			// 	$end_time= $sub['end_time'];
			// }
			$file_data = array();
			$sql5 = "select * from file where fileable_id='$data[id]' and fileable_type='Project' and removed=0 and deleted_at is null";
			$result5 = mysql_query($sql5) or die(mysql_error());
			while ($file = mysql_fetch_array($result5)) {

				$created_file = strtotime($file['created_at']);
				$change_file = strtotime($file['updated_at']);
				$file_data[]= array(
					"id"=>$file['id'],
					"created"=>$created_file,
					"change"=>$change_file,
					"url"=>$file['url'],
					"name"=>$file['name']
					);

			}

			$user_join = array();
			$sql6 = "select * from project_member where project_id='$data[id]'  and removed=0";
			$result6 = mysql_query($sql6) or die(mysql_error());
			while ($userjoin = mysql_fetch_array($result6)) {
				if($data['owner_id']!=$userjoin['user_id']){
					$user_join[]= $userjoin['user_id'];
				}
				
					

			}

			$user_follow = array();
			$sql6 = "select * from followables where followable_id='$data[id]' and followable_type='Project' and deleted_at is null";
			$result6 = mysql_query($sql6) or die(mysql_error());
			while ($userfollow = mysql_fetch_array($result6)) {

				$user_follow[]= $userfollow['user_id'];
					

			}
			
			if($data ['status']=="concept"){
				$status = 1;
			}elseif($data ['status']=="launching"){
				$status = 2;
			}elseif($data ['status']=="scaling"){
				$status = 3;
			}elseif($data ['status']=="finish"){
				$status = 4;
			}

			$created = strtotime($data['created_at']);
			$change = strtotime($data['updated_at']);
			$sub_project[] = array(
				"id" => $data['id'],
				"created" => $created,
				"changed" => $change,
				"active"=>$data['online'],
				"author_id"=>$data['owner_id'],
				"title" => $data['name'],
				"url_rewrite" => $data['url_rewrite'],
				"image"=>$data ['cover'],
				"start_date"=>$data['start_date'],
				"content"=>$data ['content'],
				"comment"=> $feed_data,
				"hastag"=>$tag_data,
				"file"=>$file_data,
				"image_data" => $image_data,
				"view_count" => $data['view_count'],
				"status"=> $status,
				"logo"=>$data['logo'],
				"website"=>$data['website'],
				"location" => $data['location'],
				"about" => $data['about'],
				"problem" => $data['problem'],
				"solution"=> $data['solution'],
				"objective"=> $data['objective'],
				"impact"=> $data['impact'],
				"full_impact_prtential" => $data['full_impact_potential'],
				"sustainability_plan" => $data['sustainability_plan'],
				"market"=>iconv_substr($data['market'], 0,250, "UTF-8"),
				"about_team"=>$data['about_team'],
				"team_explanation" =>$data['team_explanation'],
				"start_date"=>$data['start_date'],
				"feed"=>$feed_data,
				"community"=> $data_community,
				"user_join"=>$user_join,
				"user_follow"=>$user_follow,
				'plan'=> $data['plan'],

			);
		

	}



header ('Content-type: text/html; charset=utf-8');
header('Content-type: application/json;charset=utf-8');
echo json_encode($sub_project, JSON_PRETTY_PRINT);



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