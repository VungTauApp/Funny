<?php 
	include('session.php');
	include('../getUser.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>THÔNG TIN NHÂN VIÊN</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<link href="style/style_user.css" rel="stylesheet" type="text/css">
<script src="js/jquery.2.1.1.min.js"></script>
</head>
<body class="container">
<div class="profile"> <b id="welcome"> Welcome : <i style="margin-right:5px"><?php echo $_SESSION['login_user']; ?></i> </b> <a href="logout.php" class="btn-blue">Log Out</a> </div>
<ol class="nav" >
  <li> <a style="color:#09F" href="homepage.php">Users</a> </li>
  <li class="active"> <?php echo($uid); ?> </li>
</ol>
<h1>THÔNG TIN NHÂN VIÊN</h1>
<div class="form">
<form id="form" style="font-size:30px;" method="post" action="print.php">
  <div class="f-l">
    <div class="hang">
      <label for="id">ID </label>
      <input type="number" name="uid" id="id" readonly value= <?php echo "\"".$user["id"]."\"" ?> >
    </div>
    <div class="hang">
      <label for="ten">Name </label>
      <input name="ten" id="ten" type="text"value= <?php echo "\"".$user["ho_ten"]."\"" ?>>
    </div>
    <div class="hang">
      <label for="gt">Sex </label>
      <select name="gt" id="gt">
        <option value="1" <?php if($value["gioi_tinh"]==1) echo "selected"; ?>>&nbsp;Male</option>
        <option value="0" <?php if($value["gioi_tinh"]==0) echo "selected"; ?> >Female</option>
      </select>
    </div>
    <div class="hang">
      <label for="khoa">Department </label>
      <input name="khoa" id="khoa" type="text" value= <?php echo "\"".$user["khoa"]."\"" ?>>
    </div>
    <div class="hang">
      <input class="btn" type="submit" value="Print">
      <input class="btn" type="button" id="update" value="Update">
    </div>
  </div>
  <div class="f-r">
    <div><img class="avatar" id="avatar" src=<?php  echo "\"".$user["avatar"]."\"" ?>> </div>
    <div class="image-choose">
      <span class"browsefile"> Chọn </span>
      <input type="file" accept="image/jpeg" name="fileupload" id="fileupload">
    </div>
  </div>
  </div>
</form>
</div>
<script type="text/javascript">
//	var url='http://localhost/qr_new/';
	$('#fileupload').change(function(){
			check_upload_file();
		});
	function check_upload_file() {
		if ($('#fileupload').val() != '') {
			var _file = document.getElementById('fileupload').files[0];
			var _size = _file.size;
			if (_size > 2 * 1024 * 1024) {
				alert('File đính kèm không được lớn hơn 2Mb');
				return false;
			}			
			if (!_file.size || !window.FileReader) return; // no file selected, or no FileReader support
			if (/^image/.test(_file.type)){ // only image file
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(_file); // read the local file
				reader.onloadend = function(){ // set image data as background of div
					$("#avatar").attr('src', this.result);
				}
			}else{
				alert("File đã chọn không phải là hình ảnh");
				return false;
			}
			cc=document.getElementById("avatar");
					console.log(cc.src);
		}
		
		return true;
	}
	$("#update").click(function(){
		
		
		if(window.confirm("Are you want to update user?")){
			
			var id = $("#id").val();
			var name = $("#ten").val();
			var gt = $("#gt").val();
			var khoa = $("#khoa").val();
			var avatar=document.getElementById("avatar").src;
			$.ajax({
				url:"../updateUser.php",
				type:"POST",
				timeout:7000,
				data:{id:id,ten:name,gt:gt,khoa:khoa,avatar:avatar},
				success: function(mess)
				{
					if(mess=="\"ok\""){
					alert("Done");
					}else{
						alert(mess);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) 
				{
					alert("Error: "+thrownError);
				}
			});
		}
	});

	$("#print").click(function(){
		
	});
</script>
</body>
</html>