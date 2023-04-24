
<?php
error_reporting(0); //E_ALL แสดง error ทั้งหมด | ใส่ 0 ปิดแสดง error ทั้งหมด
date_default_timezone_set('Asia/Bangkok');

        // $serverName = "RK-168N\SQLEXPRESS";
        // $userName = "";
        // $userPassword = '';
	    // $dbName = "mydatabase";
   	    // $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
        // $conn = sqlsrv_connect($serverName, $connectionInfo);

        
        $serverName = "61.91.5.110";
        $userName = "sa";
        $userPassword = 'Fpce#9084';
        $dbName = "RTMS";
        $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
        $conn = sqlsrv_connect($serverName, $connectionInfo);

       if($conn)
       {
        //    echo "Database Connected.";
        }else{
           die( print_r( sqlsrv_errors(), true));
       }
    return $conn;
sqlsrv_close($conn);
?>