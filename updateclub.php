<?php

$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

$sql = "SELECT * FROM club WHERE clubId='".$_GET['clubId']."'";

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
$clubId =  $row["clubId"];
$clubName = $row["clubName"];
$onelineIntro = $row["onelineIntro"];
$intro = $row["intro"];
$division = $row["division"];
$category = $row["category"];
$location = $row["location"];
$contact = $row["contact"];
$website = $row["website"];
$recruitStart = $row["recruitStart"];
$recruitEnd = $row["recruitEnd"];
$clubOwner = $row["clubOwner"];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    
	<h1>동아리 정보 수정</h1>
	<form method="post" action="updateclub_result.php">
	    동아리 번호 : <input type="text" name="clubId" value=<?php echo $clubId ?>><br><br>
	    동아리 이름 : <input type="text" name="clubName" value=<?php echo $clubName ?>><br><br>
	    한 줄 소개: <input type="text" name="onelineIntro" value=<?php echo $onelineIntro ?>><br><br>
	    동아리 소개 : <br>
	   <textarea cols="50" rows="10" name="intro" value=<?php echo $intro ?>></textarea><br><br>
	   <label for="division"> 구분 :</label>
  	   <select name="division" id="division">
    		<option value="중앙동아리">중앙동아리</option>
    		<option value="가동아리">가동아리</option>
    		<option value="소모임">소모임</option>
  	   </select><br><br>
	    카테고리 :
	    <input type='checkbox' name='category' value='교양학술' />교양학술
	    <input type='checkbox' name='category' value='체육' />체육
	    <input type='checkbox' name='category' value='종교' />종교
	    <input type='checkbox' name='category' value='봉사' />봉사
	    <input type='checkbox' name='category' value='문화' />문화
	    <input type='checkbox' name='category' value='취미전시' />취미전시
	    <input type='checkbox' name='category' value='기타' />기타 <br><br>
	    위치 : <input type="text" name="location" value=<?php echo $location ?>><br><br>
	    연락처 : <input type="text" name="contact" value=<?php echo $contact ?>><br><br>
	    웹사이트 주소 : <input type="text" name="website" value=<?php echo $website ?>><br><br>
	    모집 시작 기간 :
	    <input type="date" id="start" name="recruitStart" value="2022-01-01" 
	    min="2022-01-01" max="2022-12-31"><br>
	    모집 마감 기간 : 
	    <input type="date" id="start" name="recruitEnd" value="2022-01-01" 
	    min="2022-01-01" max="2022-12-31"><br><br>
	   <input type="submit" value="동아리 수정하기">
	   </form><br><br>
	   <a href='clublist.php'><-- 동아리 목록으로</a>

</body>
</html>