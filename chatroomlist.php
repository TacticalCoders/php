<?php
	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");
	
	$sql ="SELECT chatroomId, (SELECT clubName From club WHERE cr.clubId=club.clubId) 'cName',
	         (SELECT name FROM account WHERE accountId=cr.clubOwnerId) 'Owner', 
                      (SELECT name FROM account a WHERE cr.accountId=a.accountId) 'aName', 
                      (SELECT message FROM chat WHERE cr.resentChatId=chatId) 'resentChat'
                      FROM chatroom cr
	         ORDER BY chatroomId;";
	
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		}
	else {
		echo "chatroom 데이터 검색 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		exit();
	}
	
	echo "<h1>채팅방 목록</h1>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>채팅방 번호</th> <th>동아리 이름</th> <th>운영진 이름</th> <th>회원 이름</th> <th>최근채팅 내용</th> <th>채팅</th>" ;
	echo "</tr>";
	
	while($row = mysqli_fetch_array($ret)){
		echo "<tr>";
		echo "<td>",$row['chatroomId'],"</td>";
		echo "<td>",$row['cName'],"</td>";
		echo "<td>",$row['Owner'],"</td>";
		echo "<td>",$row['aName'],"</td>";
		echo "<td>",$row['resentChat'],"</td>";
		echo "<td>","<a href='chatroom.php?chatroomId=",$row['chatroomId'], "'>채팅 내용 보기</a></td>";	
		echo "</tr>";
	}

	mysqli_close($con);
	echo "</table>";
	echo "<br> <a href='main.html'><-- 홈으로</a> ";
?>