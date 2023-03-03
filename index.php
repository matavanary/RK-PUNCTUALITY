<?php 
include('header.php');?>
<title>PUNCTUALLY</title>
<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script type="text/javascript" src="js/dropzone.js"></script>
<?php include('container.php');?>
<div class="container">
	<h2>วิธีใช้: ลากและวางไฟล์รายชื่อที่ต้องการอัปโหลด</h2>	
	<div class="file_upload">
		<form action="file_upload.php" class="dropzone"  method="post" enctype="multipart/form-data">
			<div class="dz-message needsclick">
				<strong>วางไฟล์ที่นี่หรือคลิกเพื่ออัปโหลด</strong>
			</div>
		</form>		
	</div>
	<br><hr>
	<?php 
		include_once("db_connect.php");
		$sql_numrow = "SELECT COUNT(*) NUMROWS FROM DIGITALTENKO_FEEDBACKDRIVER";
		$query_numrow = sqlsrv_query( $conn, $sql_numrow);
		$result_numrow = sqlsrv_fetch_array($query_numrow, SQLSRV_FETCH_ASSOC);
		$NUMROWS=$result_numrow["NUMROWS"];

		$sql_filenamescount = "SELECT COUNT(DISTINCT FILES_NAMES) FILESNAMESCOUNT FROM DIGITALTENKO_FEEDBACKDRIVER";
		$query_filenamescount = sqlsrv_query( $conn, $sql_filenamescount);
		$result_filenamescount = sqlsrv_fetch_array($query_filenamescount, SQLSRV_FETCH_ASSOC);
		$FILESNAMESCOUNT=$result_filenamescount["FILESNAMESCOUNT"];

		if($serverName=="RK-168N\SQLEXPRESS"){
			$usedatabase="LOCALHOST";
		}else if($serverName=="61.91.5.110"){
			$usedatabase="SERVER";
		}
		echo "<center><h3>ข้อมูลจากฐานข้อมูล ".$usedatabase." รวม ".$NUMROWS." ชุด จาก ".$FILESNAMESCOUNT." ไฟล์</h3></center>" ; 
	?>
	<table id="myTable" style="width:100%" class="display table table-bordered table-striped">
		<thead>
			<tr>
				<th width="50%"><a data-toggle="tooltip" title=""><div align="center">ชื่อไฟล์</div></a></th>
				<th width="50%"><a data-toggle="tooltip" title=""><div align="center">วันที่อัพโหลด</div></a></th>
			</tr>
		</thead> 
	<tbody>
	<?php
		include_once("db_connect.php");
		$stmt_selectplanyear = "SELECT DISTINCT	
		FILES_NAMES,
		CONVERT (VARCHAR (5),UPLOAD_TO_DB_DATE,8) TIME,
		CONVERT (VARCHAR (10),UPLOAD_TO_DB_DATE,120) DATE,
		CONVERT (VARCHAR (10),UPLOAD_TO_DB_DATE,120) +' '+ CONVERT (VARCHAR (5),UPLOAD_TO_DB_DATE,8) UPLOAD_TO_DB_DATE
		FROM
			DIGITALTENKO_FEEDBACKDRIVER
		ORDER BY
			UPLOAD_TO_DB_DATE DESC";
		$query_selectplanyear = sqlsrv_query($conn, $stmt_selectplanyear);
		
	?>
	<?php while($result_select_planyear = sqlsrv_fetch_array($query_selectplanyear, SQLSRV_FETCH_ASSOC)) { ?>
		<tr>
			<td align="center"><?php echo $result_select_planyear["FILES_NAMES"];?></td>
			<td align="center"><?php echo $result_select_planyear["UPLOAD_TO_DB_DATE"];?></td>
		</tr>
      <?php } ?>
	</tbody>
	</table>	
</div>
<script>
        $(document).ready(function () {
            $("#myTable").DataTable({order: [[0, "desc"]],});                                                                                        
        });
</script>
<?php include('footer.php');?>