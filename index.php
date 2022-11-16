<?php 
include('header.php');?>
<title>PUNCTUALLY</title>
<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script type="text/javascript" src="js/dropzone.js"></script>
<?php include('container.php');?>
<div class="container">
	<h2>วิธีใช้: ลากและวางไฟล์ที่ต้องการอัปโหลดรายชื่อ</h2>	
	<div class="file_upload">
		<form action="file_upload.php" class="dropzone"  method="post" enctype="multipart/form-data">
			<div class="dz-message needsclick">
				<strong>วางไฟล์ที่นี่หรือคลิกเพื่ออัปโหลด</strong>
			</div>
		</form>		
	</div>
	<br><hr><br>
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
            $("#myTable").DataTable();
        });
</script>
<?php include('footer.php');?>