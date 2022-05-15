<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

	$sql ="SELECT * FROM club WHERE clubId='".$_GET['clubId']."'";
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo $_GET['clubId']." 동아리가 없음!!!"."<BR>";
			echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
			exit();
		 }
	}
	else {
		echo "데이터 검색 실패!!!"."<BR>";
		echo "실패 원인 :".mysqli_error($con);
		echo "<BR> <A HREF='main.html'> <--초기 화면</A> ";
		exit();
	 }

	$row = mysqli_fetch_array($ret);
	$clubId = $row['clubId'];
?>


<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    
	<h1>동아리 삭제</h1>
	<form method="post" action="deleteclub_result.php">
	    동아리 번호 : <input type="text" name="clubId" value=<?php echo $clubId ?>><br><br>
	   <input type="submit" value="삭제">
	   </form><br><br>
</body>
</html>