<?php
mysql_connect("localhost","soc_cmk","MsHrla5O");
mysql_select_db("soc_cmk") or die(mysql_error());
mysql_query("SET NAMES UTF8");
$sub_project = array();
   $sql = "select * from project where deleted_at is null limit 200 offset 200";
 //$sql = "select * from project where id =97";
 $result =mysql_query($sql) or die(mysql_error());
 while ($data = mysql_fetch_array($result)) {


			

			$created = strtotime($data['created_at']);
			$change = strtotime($data['updated_at']);
			$sub_project[] = array(
				"id" => $data['id'],
				"created" => $created,
				"changed" => $change,
				"active"=>$data['online'],
				"author_id"=>$data['owner_id'],
				"title" => $data['name'],
				"url_rewirte" => $data['url_rewrite'],
	

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