<?php
include('../conn.php');
if(isset($_POST['votename'])?$_POST['votename']:""){
    $votename = $_POST['votename'];
    $diedate = $_POST['dieddate'];
    $description = $_POST['description'];
    $type = $_POST['mradio'];
    $result = $db->query("update sysconfig set vote_name='$votename', dietime='$diedate', method='$type', description='$description'  where cid='1';");
    if($result){
        echo "<script>onload = function(){document.getElementById('errortext').innerHTML='配置保存成功';}</script>";
    }else{
        echo "<script>onload = function(){document.getElementById('errortext').innerHTML='配置保存失败';}</script>";
    }
}
$result = $db->query("select * from sysconfig where cid='1';");
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Calendar3.js"></script>
    <link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
</head>
<body>
<div class="div_from_aoto" style="width: 500px; margin:30px 40px;">
    <div id="result111" class="result111" style="width:300px; height:20px; margin:4px auto; color:#33FF99;">
        <h5 id="errortext"></h5>
    </div>
    <form action="Voteset.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="control-group">
            <label class="laber_from">投票主题</label>
            <div  class="controls" ><INpUT class="username" name="votename" type=text value="<?php echo $row['vote_name']; ?>"><p class=help-block></p></div>
        </div>

        <div class="control-group">
            <label class="laber_from">投票描述</label>
            <div  class="controls" >
                <textarea name="description" cols="" rows="" ><?php echo $row['description'];?></textarea>
                <p class=help-block></p>
            </div>
        </div>

        <div class="control-group">
            <label class="laber_from">投票终止时间</label>
            <div  class="controls" >
                <input name="dieddate" type="text" value="<?php echo $row['dietime']; ?>" id="control_date" size="10" maxlength="10" onClick="new Calendar().show(this);" readonly="readonly" />
                <p class=help-block></p>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from" ></label>
            <div class="controls" ><button class="btn btn-success" style="width:80px;" >保存配置</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

