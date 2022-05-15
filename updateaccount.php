<?php

$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

$sql = "SELECT * FROM account WHERE accountId='".$_GET['accountId']."'";

$ret = mysqli_query($con, $sql);

if($ret) {
	$count = mysqli_num_rows($ret);
	if($count==0) {
		echo $_GET['userID']." 아이디의 회원이 없음!!!"."<BR>";
		echo "<br> <a href='main.html'> <--초기 화면</A> ";
		exit();
	}
}
else {
	echo "데이터 검색 실패!!!"."<BR>";
	echo "실패 원인 :".mysqli_error($con);
	echo "<br> <a href='main.html'> <--초기 화면</A> ";
	exit();
}

$row = mysqli_fetch_array($ret);
$accountId = $row["accountId"];
$name = $row["name"];
$studentId = $row["studentId"];
$department = $row["department"];
$phone = $row["phone"];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    
	<h1>회원 정보 수정</h1>
	<form method="post" action="updateaccount_result.php">
	    회원번호 : <input type="text" name="accountId" value=<?php echo $accountId ?>><br><br>
	    이름 : <input type="text" name="name" value=<?php echo $name ?>><br><br>
	    학번 : <input type="text" name="studentId" value=<?php echo $studentId ?>><br><br>
	    학과 : <input type="text" name="department" value=<?php echo $department ?>><br><br>
	    연락처 : <input type="text" name="phone" value=<?php echo $phone ?>><br><br>
	   <input type="submit" value="회원 정보 수정하기">
	   </form><br><br>
	   <a href='accountlist.php'><-- 회원 목록으로</a>

</body>
</html>