<?php
	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$sql ="SELECT clubId,clubName,onelineIntro,intro,division,category,location,contact,website,recruitStart,recruitEnd
	        ,(SELECT name from account where club.clubOwner=accountId) 'owner' FROM club WHERE recruitEnd > NOW();";
	
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		}
	else {
		echo "club 데이터 검색 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		exit();
	}
	
	echo "<h1>모집중인 동아리ㆍ소모임 목록</h1>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>동아리 번호</th><th>동아리 이름</th> <th>한 줄 소개</th> <th>동아리 소개</th> <th>구분</th> <th>카테고리</th>";
	echo "<th>동아리방 위치</th> <th>연락처</th> <th>웹사이트</th> <th>모집기간</th> <th>운영진</th> <th>수정</th> <th>삭제</th>" ;
	echo "</tr>";
	
	while($row = mysqli_fetch_array($ret)){
		echo "<tr>";
		echo "<td>",$row['clubId'],"</td>";
		echo "<td>",$row['clubName'],"</td>";
		echo "<td>",$row['onelineIntro'],"</td>";
		echo "<td>",$row['intro'],"</td>";
		echo "<td>",$row['division'],"</td>";
		echo "<td>",$row['category'],"</td>";
		echo "<td>",$row['location'],"</td>";
		echo "<td>",$row['contact'],"</td>";
		echo "<td><a href=",$row['website'],">",$row['website'],"</a></td>";
		echo "<td>",$row['recruitStart']," ~ ",$row['recruitEnd'],"</td>";
		echo "<td>",$row['owner'],"</td>"; 
		echo "<td>","<a href='updateclub.php?clubId=",$row['clubId'], "'>수정</a></td>";
		echo "<td>","<a href='deleteclub.php?clubId=",$row['clubId'], "'>삭제</a></td>";	
		echo "</tr>";
	}

	mysqli_close($con);
	echo "</table>";
	echo "<br> <a href='main.html'><-- 홈으로</a> ";
?>