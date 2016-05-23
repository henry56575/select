<?php 
header("Content-Type: text/html;charset=utf-8"); 

 
$x = $_POST['LTX']; 
$y = $_POST['LTY'];
$width = $_POST['boxWidth'];
$height = $_POST['boxHeight'];
$startTime = $_POST['startTime']; 
$endTime = $_POST['endTime']; 
$url1 = $_POST['url1']; 
$url2 = $_POST['url2']; 
$vid = $_POST['vid']; 
$interact = $_POST['interact']; 
$flag=1;//手动选框标志位

if($startTime<$endTime){
	$dbhost = '10.112.33.125';
	$dbuser = 'video';
	$dbpass = 'video';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  echo "<script>
		history.go(-1);
		alert('数据库连接失败！');
		</script>";
	}else{
		$sql = "insert into test".
			   "(x,y,width,height,startTime,endTime,url1,url2,vid,interact,flag)".
			   "values".
			   "('$x','$y','$width','$height','$startTime','$endTime','$url1','$url2','$vid','$interact','$flag')";
		mysql_select_db( 'video_embed' );
		$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  	echo "<script>
				history.go(-1);
				alert('插入数据失败！');
				</script>";
			}else{
				
				echo "<script>
				history.go(-1);
				alert('成功插入一条数据！');
				</script>";
			}
		}
}else{
		echo "<script>
		history.go(-1);
		alert('截取开始时间不能大于截取终止时间!');
		</script>";
}
