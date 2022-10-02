<!DOCTYPE html>
 <html>
<head>
   <meta charset="utf-8" />
   <title>教室借用資訊</title>
   <link rel="stylesheet" type="text/css" href="common.css" />
   <link rel="stylesheet" type="text/css" href="ColumnSplit.css">
  </head>
<body>
  <header class="ColumnSplit_container">
     <img id="header_title_image" src="photo/slider-02.png" />
     
     <nav>
      <ul>
       <li><a href="index.html">訊息公告</a></li>
       <li><a href="member.html">系所成員</a></li>
       <li><a href="introduce.html">系所介紹</a></li>
       <li><a href="legal.html">系所法規</a></li>
       <li><a href="enterence.html">入學資訊</a></li>
       <li><a href="contact.html">教室借用</a></li>
      </ul>
     </nav>
    </header>
<center>

<section class="ColumnSplit_container">
<center><h1>借用紀錄</h1></center>
<?php
if(isset($_POST["button"]))
{
  $stdnum=$_POST["stdnum"];
  $stdname=$_POST["stdname"];
  $department=$_POST["department"];
  $stddate=$_POST["stddate"];
  $stdtime=$_POST["stdtime"];
  $classroom=$_POST["classroom"];
  $link= @mysqli_connect("localhost","root","nutncsie")or die("無法開啟");
  mysqli_select_db($link,"myschool");
  $sql="SELECT * FROM student";
  
  if($result=mysqli_query($link,$sql))
  {
     $flag = FALSE;
     while ($row=mysqli_fetch_assoc($result)) {
       $alstddate = $row["stddate"];
       $alstdtime = $row["stdtime"];
       $alclassroom = $row["classroom"];
       if ($stddate == $alstddate&&$stdtime==$alstdtime&&$classroom==$alclassroom){
         $flag=TRUE;
       }
     }
     if($flag==TRUE)
     {
       echo "<script> alert('此時段已有人申請，請先查詢後在登記'); </script>"; 
     }
     else
     {
       
       $sql="INSERT INTO student (stdnum,stdname,department,stddate,stdtime,classroom) VALUES('$stdnum','$stdname','$department','$stddate','$stdtime','$classroom')";
       mysqli_query($link,'set names utf8');
       mysqli_query($link,$sql);
       
     }
  }
  mysqli_close($link);
}
?>
<?php
session_start();  // 啟動交談期
$records_per_page = 3;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串
if ( isset($_SESSION["SQL"]))
  $sql = $_SESSION["SQL"];
else
  $sql="SELECT * FROM student ORDER BY stdname";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
$total_pages=ceil($total_records/$records_per_page);
echo "記錄總數: $total_records 筆<br/>";
echo "<table border=1><tr><td>編號</td>";
echo "<td>學號</td><td>姓名</td><td>班級</td><td>日期</td><td>時間</td><td>教室</td></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ )
      echo "<td>".$rows[$i]."</td>";
    //echo "<td><a href='edit.php?action=edit&id=";
      //echo $rows[0]."'><b>編輯</b> | ";
      echo "<td><a href='edit.php?action=del&id=";
      echo $rows[0]."'><b>刪除</b></td>";
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc");
?>

<p><center><input type ="button" onclick="history.back()" value="回到上一頁"></input></p></center>
</section>

<footer>
 國立臺南大學 資訊工程學系NUTNCSIE 2021 著作權所有<br />
 地址：台南市中西區樹林街二段33號<br />
 電話：(06)2606123 轉 7701、7702  傳真：(06)2606125<br /></p>
</footer>
</body>
</html>