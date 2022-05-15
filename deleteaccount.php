<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

	$sql ="SELECT * FROM account WHERE accountId='".$_GET['accountId']."'";
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo $_GET['userID']." 아이디의 회원이 없음!!!"."<BR>";
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
	$accountId = $row['accountId'];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    
	<h1>회원 탈퇴</h1>
	<form method="post" action="deleteaccount_result.php">
	    회원 번호 : <input type="text" name="accountId" value=<?php echo $accountId ?>><br><br>
	   <input type="submit" value="탈퇴하기">
	   </form><br><br>
</body>
</html>