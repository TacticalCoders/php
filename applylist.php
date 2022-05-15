<?php
	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$sql ="SELECT applyId,name,clubName,studentId,department,phone,aboutMe,motive,applyTime 
	         FROM apply,account,club WHERE accountId=applicantId AND apply.clubId=club.clubId ORDER BY applyTime;";
	
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		}
	else {
		echo "apply 데이터 검색 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		exit();
	}
	
	echo "<h1>지원 목록</h1>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>지원번호</th> <th>지원 동아리</th> <th>지원자 이름</th>  <th>지원자 학번</th> <th>학과</th> <th>지원자 연락처</th>";
	echo "<th>자기소개</th> <th>지원동기</th> <th>지원시각</th><th>수정</th> <th>삭제</th>" ;
	echo "</tr>";
	
	while($row = mysqli_fetch_array($ret)){
		echo "<tr>";
		echo "<td>",$row['applyId'],"</td>";
		echo "<td>",$row['clubName'],"</td>";
		echo "<td>",$row['name'],"</td>";
		echo "<td>",$row['studentId'],"</td>";
		echo "<td>",$row['department'],"</td>";
		echo "<td>",$row['phone'],"</td>";
		echo "<td>",$row['aboutMe'],"</td>";
		echo "<td>",$row['motive'],"</td>";
		echo "<td>",$row['applyTime'],"</td>";
		echo "<td>","<a href='updateapply.php?applyId=",$row['applyId'], "'>수정</a></td>";
		echo "<td>","<a href='deleteapply.php?applyId=",$row['applyId'], "'>삭제</a></td>";	
		echo "</tr>";
	}

	mysqli_close($con);
	echo "</table>";
	echo "<br> <a href='main.html'><-- 홈으로</a> ";
	echo "&nbsp &nbsp <a href='insertapply.php'><b>지원하기(추가)</b></a> ";
?>