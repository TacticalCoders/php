<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    
	<h1>동아리 등록하기</h1>
	<form method="post" action="insertclub_result.php">
	    동아리 이름 : <input type="text" name="clubName"><br><br>
	    한 줄 소개: <input type="text" name="onelineIntro"><br><br>
	    동아리 소개 : <br>
	   <textarea cols="50" rows="10" name="intro"></textarea><br><br>
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
	    위치 : <input type="text" name="location"><br><br>
	    연락처 : <input type="text" name="contact"><br><br>
	    웹사이트 주소 : <input type="text" name="website"><br><br>
	    모집 시작 기간 :
	    <input type="date" id="start" name="recruitStart" value="2022-01-01" 
	    min="2022-01-01" max="2022-12-31"><br>
	    모집 마감 기간 : 
	    <input type="date" id="start" name="recruitEnd" value="2022-01-01" 
	    min="2022-01-01" max="2022-12-31"><br><br>
	    나의 회원 아이디 : <input type="text" name="clubOwner"><br><br>
	   <input type="submit" value="동아리 등록하기">
	   </form><br><br>
	   <a href='clublist.php'><-- 동아리 목록으로</a>

</body>
</html>