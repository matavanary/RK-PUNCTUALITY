<!-- < ?php
$pizza  = "2022/07/19|IS08      |11| 5|05-1111  |BKK|Natthaphong Chatsuwan                             |SR |YARD      |RKS1-1-YD |2022/07/19 18:10|                |2022/07/19 18:06|                |     |     |  |On Time|       ";
$pieces = explode("|", $pizza);
echo $pieces[0]."<br>";
echo $pieces[1]."<br>";
echo $pieces[2]."<br>";
echo $pieces[3]."<br>";
echo $pieces[4]."<br>";
echo $pieces[5]."<br>";
echo $pieces[6]."<br>";
echo $pieces[7]."<br>";
echo $pieces[8]."<br>";
echo $pieces[9]."<br>";
echo $pieces[10]."<br>";
echo $pieces[11]."<br>";
echo $pieces[12]."<br>";
echo $pieces[13]."<br>";
echo $pieces[14]."<br>";
echo $pieces[15]."<br>";
echo $pieces[16]."<br>";
echo $pieces[17]."<br>";
?> -->


<?php
set_time_limit(0);
date_default_timezone_set("Asia/Bangkok");
$target_dir = "PDF/";
$expFile = explode('.', $_FILES["fileToUpload"]["name"]);
$fileType = $expFile[count($expFile)-1];
$newName = 'PDF-'.date('Ymd-His').'.'.$fileType;

$target_file = $target_dir . $newName;
$uploadOk = 1;
$FileType = pathinfo($target_file, PATHINFO_EXTENSION);
if($FileType != "txt") {
	echo "<script type='text/javascript'>";
	echo "alert('ขออภัย อนุญาตให้ใช้เฉพาะไฟล์ PDF เท่านั้น หรือไฟล์ของคุณมีขนาดใหญ่เกินไป');";
	echo "window.location = ''; ";
	echo "</script>";
  $uploadOk = 0;
}
if (file_exists($target_file)) {
	echo "<script type='text/javascript'>";
	echo "alert('ขออภัย มีไฟล์อยู่แล้ว');";
	echo "window.location = ''; ";
	echo "</script>";
  $uploadOk = 0;
}

if ($uploadOk != 0) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {   
    require_once './connect.php';
    date_default_timezone_set("Asia/Bangkok");
    
    // $pizza  = "2022/07/19|IS08      |11| 4|05-1111  |BKK|Natthaphong Chatsuwan                             |SR |PLANT     |722B-S-S5 |2022/07/19 16:05|2022/07/19 16:30|2022/07/19 15:42|2022/07/19 16:30|00:25|00:48|NG|Advance|On Time    ";
    // $pieces = explode("|", $pizza);
    // echo $pieces[0]."<br>";
    // echo $pieces[1]."<br>";
    // echo $pieces[2]."<br>";
    // echo $pieces[3]."<br>";
    // echo $pieces[4]."<br>";
    // echo $pieces[5]."<br>";
    // echo $pieces[6]."<br>";
    // echo $pieces[7]."<br>";
    // echo $pieces[8]."<br>";
    // echo $pieces[9]."<br>";
    // echo $pieces[10]."<br>";
    // echo $pieces[11]."<br>";
    // echo $pieces[12]."<br>";
    // echo $pieces[13]."<br>";
    // echo $pieces[14]."<br>";
    // echo $pieces[15]."<br>";
    // echo $pieces[16]."<br>";
    // echo $pieces[17]."<br>";

    $sql = "INSERT INTO test27072022 (t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15,t16,t17,t18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params = array($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4],$pieces[5], $pieces[6], $pieces[7], $pieces[8], $pieces[9],$pieces[10], $pieces[11], $pieces[12], $pieces[13], $pieces[14],$pieces[15], $pieces[16], $pieces[17]);
    $stmt = sqlsrv_query( $conn, $sql, $params);
    if( $stmt === false ) { 
      die( print_r( sqlsrv_errors(), true)); 
    } else { 
      echo "Record add successfully"; 
    }
    sqlsrv_close($conn);
  } else {
    echo "<script type='text/javascript'>";
    echo "alert('ขออภัย เกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ หรือไฟล์ของคุณมีขนาดใหญ่เกินไป');";
    echo "window.location = ''; ";
    echo "</script>";
  }
}

// echo"<pre>";
// print_r($_POST);
// echo"</pre>";

?>