<?php
	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$sql ="SELECT * FROM account;";
	
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		}
	else {
		echo "account 데이터 검색 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		exit();
	}
	
	echo "<h1>회원 목록</h1>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>아이디</th> <th>이름</th> <th>학번</th> <th>학과</th> <th>전화번호</th><th>수정</th> <th>삭제</th>" ;
	echo "</tr>";
	
	while($row = mysqli_fetch_array($ret)){
		echo "<tr>";
		echo "<td>",$row['accountId'],"</td>";
		echo "<td>",$row['name'],"</td>";
		echo "<td>",$row['studentId'],"</td>";
		echo "<td>",$row['department'],"</td>";
		echo "<td>",$row['phone'],"</td>";
		echo "<td>","<a href='updateaccount.php?accountId=",$row['accountId'], "'>수정</a></td>";
		echo "<td>","<a href='deleteaccount.php?accountId=",$row['accountId'], "'>삭제</a></td>";	
		echo "</tr>";
	}

	mysqli_close($con);
	echo "</table>";
	echo "<br> <a href='main.html'><-- 홈으로</a> ";
	echo "&nbsp &nbsp <a href='insertaccount.php'><b>회원가입하기(추가)</b></a> ";
?>