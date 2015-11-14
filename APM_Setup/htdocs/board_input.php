<?
	echo "수신한 내용<br>";
	$title = htmlspecialchars($_POST['title']);
	echo $title."<br>";
	$content = htmlspecialchars($_POST['content']);
	echo $content."<br>";


	$connect = mysql_connect('localhost', 'root', 'apmsetup');
	
	mysql_selectdb("mydb");
	mysql_query("set names utf8");
	if($_REQUEST[title]){
		$title = $_REQUEST[title]; //주소에 있는 title값을 받아 title 변수에 저장
		$content = $_REQUEST[content]; //주소에 있는 content값을 받아 content 변수에 저장
	}
	$qry = "INSERT INTO board(uid, title, content) VALUES(NULL, '$title', '$content')";
	$result = mysql_query($qry);
	
	$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n"; //xml파일에 출력할 코드
	$xmlcode .= "<result>$result</result>\n"; //DB insert가 성공적으로 됐는지 여부를 확인하기 위해 result값을 xml로 출력시킴
 
	$dir = "C:/APM_Setup/htdocs"; //insertresult.xml 파일을 저장할 경로
	$filename = $dir."/board_inputresult.xml";
 
	file_put_contents($filename, $xmlcode); //xmlcode의 내용을 xml파일로 출력
	
	mysql_close($connect);
	print ("board 테이블에 추가했습니다"); 
	
?> 