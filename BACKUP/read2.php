<html>
<head>
<title></title>
</head>
<body>
<?php
$fileToUpload = $_FILES["fileToUpload"]["tmp_name"]; 
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
// echo"<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo"</pre>";
        require_once './connect.php';
        date_default_timezone_set("Asia/Bangkok");
        $sql = "INSERT INTO test27072022 (t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15,t16,t17,t18,t19,t20) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array($resultmark,$split[1],$split[2],$split[3],$split[4],$split[5],$resultspace,$split[7],$split[8],$split[9],$split[10],$split[11],$split[12],$split[13],$split[14],$split[15],$split[16],$split[17],$split[18],$split[19]);
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === false ) { 
          die( print_r( sqlsrv_errors(), true)); 
        } else { 
          echo "Record add successfully<br>"; 
        }
        // sqlsrv_close($conn);
    }
    fclose($objFopen);
}
?>
</body>
</html>