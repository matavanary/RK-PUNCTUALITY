
<?php
// echo"<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo"</pre>";
$fileToUpload = $_FILES["fileToUpload"]["tmp_name"]; 
$data=file("$fileToUpload");  
for($i=0;$i<count($data);$i++){  
    // echo $data[$i]."<br>";
    $datafromtxt  = "$data[$i]";
    $split = explode("|", $datafromtxt);
    echo $split[0]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[1]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[2]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[3]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[4]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[5]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[6]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[7]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[8]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[9]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[10]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[11]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[12]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[13]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[14]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[15]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[16]."&nbsp;&nbsp;&nbsp;&nbsp;";
    echo $split[17]."<br>";
    
        
        require_once './connect.php';
        date_default_timezone_set("Asia/Bangkok");
        $sql = "INSERT INTO test27072022 (t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15,t16,t17,t18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array($split[0], $split[1], $split[2], $split[3], $split[4],$split[5], $split[6], $split[7], $split[8], $split[9],$split[10], $split[11], $split[12], $split[13], $split[14],$split[15], $split[16], $split[17]);
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === false ) { 
          die( print_r( sqlsrv_errors(), true)); 
        } else { 
          echo "Record add successfully"; 
        }
        sqlsrv_close($conn);
        
} 
// require_once './connect.php';
// date_default_timezone_set("Asia/Bangkok");
// $split1 = $split[0];
// $sql = "INSERT INTO test27072022 (t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15,t16,t17,t18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
// $params = array($split1, $split[1], $split[2], $split[3], $split[4],$split[5], $split[6], $split[7], $split[8], $split[9],$split[10], $split[11], $split[12], $split[13], $split[14],$split[15], $split[16], $split[17]);
// $stmt = sqlsrv_query( $conn, $sql, $params);
// if( $stmt === false ) { 
//   die( print_r( sqlsrv_errors(), true)); 
// } else { 
//   echo "Record add successfully"; 
// }
// sqlsrv_close($conn);
?>
<hr>
