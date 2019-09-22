<?php
$q = isset($_POST['good']) ? $_POST['good'] : '';
if (is_array($q)) {
    $sites = array(
        'Objective C' => 'OC 大法好',
        'Python' => 'python 可盘万物',
        'PHP' => '据说是世界上最好的语言',
    );
    foreach ($q as $val) {
        // PHP_EOL 为常量，用于换行
        echo $sites[$val] . PHP_EOL.'<br>';
    }

}
?>
<form action="form_practice.php" method="post">
    姓名:<input type="text" name="name" placeholder="请输入您的名字"><br>
    E-mail: <input type="text" name="email" required="required"><br>
    网址: <input type="text" name="website"><br>
    性别:
    <select name="sex">
        <option value="男">男</option>
        <option value="女">女</option>
    </select>
    <br>

    选择您擅长的编程语言(可多选)<br>
    <input type="checkbox" name="good[]" value="Objective C"> Objective C<br>
    <input type="checkbox" name="good[]" value="Python"> Python<br>
    <input type="checkbox" name="good[]" value="PHP"> PHP<br>

    选择您最擅长的编程语言(单选)<br>
    <input type="radio" name="best" value="Objective C"> Objective C<br>
    <input type="radio" name="best" value="Python"> Python<br>
    <input type="radio" name="best" value="PHP"> PHP<br>
    备注：<br>
    <textarea name="other" id="" cols="30" rows="10"></textarea>><br>



    <input type="checkbox" name="sex" value="男" checked="checked">是否同意用户协议<br>
    <input type="submit" value="上传服务器">

</form>
