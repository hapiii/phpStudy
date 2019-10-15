<?php
include_once 'conn.php';

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';


@session_start();
$ss = $_POST;
if($_POST[num] != (count($ss)-2)){
    echo "<script>alert('请完善你的选择');</script>";
    echo "<script>history.go(-1);</script>";
    exit();
}
if($_POST['code_num'] != $_SESSION['VCODE'] || $_POST['code_num']==''){
    echo "<script>alert('验证码错误');</script>";
    echo "<script>history.go(-1);</script>";
    exit();
}

function voteing($ss, $db)
{
    $success = true;
    foreach($ss as &$value){
        $result = $conn->query("select votenum from voteoption where cid='".$value."';");
        $row = mysqli_fetch_assoc($result);
        $result = $db->query("update voteoption set votenum='".($row['votenum']+1)."' where cid='".$value."'");
        if(!$result){
            $success = false;
        }
    }
    if($success){
        foreach($ss as $key => $value){
            $result = $conn->query("select sum(votenum) from voteoption where upid='".$key."';");
            $row = mysqli_fetch_assoc($result);
            $result = $conn->query("update votename set sumvotenum='".$row['sum(votenum)']."' where cid='$key';");
            if(!$result){
                $success = false;
            }
        }
        if($success){
            return true;
        }
    }
    return false;
}


$result = $conn->query("select * from sysconfig");
$row = mysqli_fetch_assoc($result);

$now = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
$dietimelist = explode("-",$row['dietime']);
$dietime = mktime(0, 0, 0, $dietimelist[1]  , $dietimelist[2], $dietimelist[0]);
if(round(($dietime-$now)/3600/24) < 0){
    echo "<script>alert('已经过了投票日期');</script>";
    echo "<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
    exit();
}

if($row['method'] == 1){//ip统计投票
    $clientip = getenv("REMOTE_ADDR");
    $ips = $conn->query("select ip from voteips where ip='$clientip';");
    if($ips->num_rows > 0){
        echo "<script>alert('你已经投过票了');</script>";
        echo "<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
        exit();
    }else{
        voteing($ss, $db);
        $conn->query("insert into voteips (ip) values ('$clientip');");
        echo "<script>alert('投票成功');</script>";
        echo "<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
        exit();
    }


}else if($row['method'] == 2){//登录投票
    if($_SESSION['user'] == true){
        $test = $conn->query("select isvote from users where username='".$_SESSION['name']."';");
        $test_row = mysqli_fetch_assoc($test);
        if($test_row['isvote']==1){
            echo "<script>alert('你已经投过票了');</script>";
            echo "<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
            exit();
        }else{
            voteing($ss, $db);
            $conn->query("update users set isvote='1' where username='".$_SESSION['name']."';");
            echo "<script>alert('投票成功');</script>";
            echo "<meta http-equiv=\"Refresh\" content=\"0;url=index.php\">";
            exit();
        }
    }else{
        echo "<script>alert('请登录再投票');</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }

}



?>