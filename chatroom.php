<?php
 	$con = mysqli_connect("localhost","id202001480","pw202001480","clubdb") or die("MySQL 접속 실패!!");

	$sql = "SELECT chatId, chatRoomId, ( SELECT name FROM account WHERE chat.senderId=accountId ) 'senderName', 
	          (SELECT name FROM account WHERE chat.receiverId = accountId ) 'receiverName'  , message, chatTime FROM chat WHERE chatRoomId='".$_GET['chatroomId']."'; ";
	
	$ret = mysqli_query($con, $sql);

	if($ret) {
		$count = mysqli_num_rows($ret);
		}
	else {
		echo "chat 데이터 검색 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		exit();
	}
	
	echo "<h1>채팅 내역</h1>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>채팅 번호</th> <th>채팅방 번호</th> <th>전송자 이름</th> <th>수신자 이름</th> <th>채팅 본문</th> <th>전송 시각</th>" ;
	echo "</tr>";
	
	while($row = mysqli_fetch_array($ret)){
		echo "<tr>";
		echo "<td>",$row['chatId'],"</td>";
		echo "<td>",$row['chatRoomId'],"</td>";
		echo "<td>",$row['senderName'],"</td>";
		echo "<td>",$row['receiverName'],"</td>";
		echo "<td>",$row['message'],"</td>";
		echo "<td>",$row['chatTime'],"</td>";	
		echo "</tr>";
	}

	mysqli_close($con);
	echo "</table>";
	echo "<br> <a href='main.html'><-- 홈으로</a> ";
?>