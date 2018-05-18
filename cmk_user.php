<?php
mysql_connect("localhost","soc_cmk","MsHrla5O");
mysql_select_db("soc_cmk") or die(mysql_error());
mysql_query("SET NAMES UTF8");

function getFacebookImageFromURL($url)
{
  $headers = get_headers($url, 1);
  if (isset($headers['Location']))
  {
    return $headers['Location'];
  }
}


$data_select = array();
$sql = "select * from user where id BETWEEN 1640 AND 1680";
//$sql = "select * from user where id =144";
$result = mysql_query($sql) or die(mysql_error());
while ($data = mysql_fetch_array($result)) {
	if($data['removed']==0){
		$status = 1;
	}else{
		$status = 0;
	}
	if($data['gender']=="m"){
		$gender = 1;
	}else{
		$gender = 3;
	}
	if($data['want_newsletter']==1){
		$contact =3;
	}else{
		$contact= "";
	}
	$tag_data = array();
	$sql2 = "select * from taggables where taggable_id='$data[id]' and taggable_type='User'";
	$result2 = mysql_query($sql2) or die(mysql_error());
	while ($tag = mysql_fetch_array($result2)) {
		$sql3 = "select name from tag where id='$tag[tag_id]'";
		$result3 = mysql_query($sql3) or die(mysql_error());
		list($tag_name)=mysql_fetch_row($result3);

		$tag_data[]= $tag_name;
	}
	$created = strtotime($data['created_at']);

	

	$pos = strpos($data['image'], "graph.facebook");

// The !== operator can also be used.  Using != would not work as expected
// because the position of 'a' is 0. The statement (0 != false) evaluates 
// to false.
	if ($pos !== false) {
	   		$url = $data['image'];
	        $imageURL = getFacebookImageFromURL($url);
	} else {
	    	$imageURL = $data['image'];
	}
// echo $imageURL."<br>";
	$new_name = preg_replace('/@.*$/', '', $data['email']);
	// $email_suf = array();
	// $email_ssx = array();
	// if(!in_array($new_name, $email_suf)){
	// 	$email_suf[] = $new_name;
	// }else{
	// 	$email_ssx[] = 
	// }
	

	$data_select[] = array(
		"uid" => $data['id'],
		"created" => $created,
		"mail"=>$data['email'],
		"pass"=>$data['password'],
		"status" => $status,
		"name" => $new_name,
		"firstname"=>$data ['firstname'],
		"lastname"=>$data['lastname'],
		"social"=>$data['fb_name'],
		"role"=>$data['role'],
		"contact"=>$contact,
		"image"=>$imageURL,
		"title"=> $gender,
		"birthday" => $data['dob'],
		"address"=>$data['address'],
		"provice"=>$data['province'],
		"phone" => $data['tel'],
		"education_degree" => $data['education_degree'],
		"education_institution" =>$data['education_institution'],
		"education_faculty" => $data['education_faculty'],
		"education_major"=>$data['education_major'],
		"intro"=>$data['description'],
		"interest"=>$tag_data

		);

}

header('Content-type: application/json');
//echo json_encode($data_select, JSON_PRETTY_PRINT);



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