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
</div>
<?php include('footer.php');?>