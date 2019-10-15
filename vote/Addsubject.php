<?php
include './conn.php';
if(isset($_POST['votesubject'])?$_POST['votesubject']:''){
    $subject = $_POST['votesubject'];

    $query ="insert into votename (question_name) values ('$subject')";
    $result = $conn->query($query);
    if($result){
        echo "<script>onload = function(){document.getElementById('errortext').innerHTML='添加问题成功';}</script>";
    }else{
        echo "<script>onload = function(){document.getElementById('errortext').innerHTML='添加问题失败';}</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
</head>
<body>
<div class="div_from_aoto" style="width: 500px; margin:30px 40px;">
    <form action="Addsubject.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div id="result111" class="result111" style="width:300px; height:20px; margin:4px auto; color:#33FF99;  ">
            <h5 id="errortext"></h5>
        </div>
        <div class="control-group">
            <label class="laber_from">投票问题</label>
            <div  class="controls" ><input class="username" style="width:300px;" name="votesubject" type=text placeholder=" 请输入投票问题"><P class=help-block></P></div>
        </div>

        <div class="control-group">
            <label class="laber_from" ></label>
            <div class="controls" ><button class="btn btn-success" style="width:120px;" >添加问题</button></div>
        </div>
    </form>
</div>
</body>
</html>