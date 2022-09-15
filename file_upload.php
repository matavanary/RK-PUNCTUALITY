<?php 
include_once("db_connect.php");
// if(!empty($_FILES)){     
//     $upload_dir = "uploads/";
//     $fileName = $_FILES['file']['name'];
//     $uploaded_file = $upload_dir.$fileName;    
//     if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
//         //insert file information into db table
// 		$mysql_insert = "INSERT INTO uploads (file_name, upload_time)VALUES('".$fileName."','".date("Y-m-d H:i:s")."')";
// 		sqlsrv_query($conn, $mysql_insert) or die("database error:". sqlsrv_error($conn));
//     }   
// }

$fileToUpload = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$strFileName = "$fileToUpload";
$objFopen = fopen($strFileName, 'r');
if ($objFopen) {
    while (!feof($objFopen)) {
        $file = fgets($objFopen, 4096);
        $i++;
        if($i > 1){
          // echo $file."<br>";
          $datafromtxt  = "$file";
          $split = explode("|", $datafromtxt);
          // echo $split[0]."&nbsp;&nbsp;&nbsp;&nbsp;";
          $checkmark = "$split[0]";
          $result = explode("#", $checkmark);
          $resultmark = $result[0];
          // echo $resultmark;
          // echo $split[1]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[2]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[3]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[4]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[5]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[6]."&nbsp;&nbsp;&nbsp;&nbsp;";
          $checkspace ="$split[6]";
          $resultspace = preg_replace("[  ]"," ",$checkspace);
          // echo $resultspace;
          // echo $split[7]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[8]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[9]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[10]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[11]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[12]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[13]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[14]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[15]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[16]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[17]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[18]."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo $split[19]."<br>";
        }
        date_default_timezone_set("Asia/Bangkok");
        
  //  echo"<pre>";
  //  print_r($_POST);
  //  echo"</pre>";
  //  exit();

        $sql = "INSERT INTO DIGITALTENKO_FEEDBACKDRIVER (ROUTE_DATE,ROUTE_CODE,RUN_SEQ,PLAN_ACCESS_SEQ,TRUCK_LICENSE,PROVINCE,DRIVER_NAME,LOGISTIC_POINT_NAME,HOP,LOCATION,
        PLAN_ARRIVAL,PLAN_DEPARTURE,ACTUAL_ARRIVAL,ACTUAL_DEPARTURE,OPERATION_TIME_PLAN,OPERATION_TIME_ACTUAL,TYPE,
        PUNC_OF_ARRIVAL,PUNC_OF_DEPARTURE,FILES_NAMES,UPLOAD_TO_DB_DATE) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array($resultmark,$split[1],$split[2],$split[3],$split[4],$split[5],$resultspace,$split[7],$split[8],$split[9],
                        $split[10],$split[11],$split[12],$split[13],$split[14],$split[15],$split[16],$split[17],$split[18],$fileName,date("Y-m-d H:i:s"));
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === false ) { 
          die( print_r( sqlsrv_errors(), true)); 
        } else { 
          echo "Record add successfully<br>"; 
        }
    }
    fclose($objFopen);
}




