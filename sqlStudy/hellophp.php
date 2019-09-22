<?php

// PHP 代码
echo "nihao";
echo  '命名空间'.__NAMESPACE__;
$x = 4;
$y = 8;
$z = $x+$y;
echo $z;
myTest();
function myTest()
{
    $fuct_x = 19;
    echo $fuct_x;
    //global 关键字用于函数内访问全局变量。
    //在函数内调用函数外定义的全局变量，我们需要在函数中的变量前加上 global 关键字
    global $x;
    echo $x;
    echo $GLOBALS['y'];
}

function stTest()
{//当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。

   // 要做到这一点，请在您第一次声明变量时使用 static 关键字：
    static $x=0;
    echo $x;
    $x++;
    echo PHP_EOL;    // 换行符
}


function printCs(){
    $text = "echo - 可以输出一个或多个字符串";
    $eeda = "print只允许输出一个字符串，返回值总为 1 ";
    $ddd = "echo 输出的速度比 print 快， echo 没有返回值，print有返回值1。";
    $cars=array("Volvo","BMW","Toyota");
    echo " $text";
    echo "我车的品牌是 {$cars[0]}";

    print "在 $text 学习 PHP ";
    print "<br>";
    print "我车的品牌是 {$cars[0]}";
    echo <<<EOF
    <br>
"eof在 $text 学习 PHP "$text
$eeda
$ddd
$cars
EOF;

}

//php 数据类型
function phpType(){
    $str = '这是NSString';
    $NSIntx = 3;
    $NSfloat = 3.1415;
    var_dump($NSfloat);
    echo $NSfloat;
    $bl = true;
    $arr = array('sd','221','432');
    var_dump($arr);
    echo $arr;

}

phpType();



if (42 == '42'){
    echo '== 之比较值相同';
}
if  (42 === '42'){
    echo "类型相同";
}else{
     echo "类型不同";
}

echo "<br>";
//变量以$开头,设置常量用define,常量在定义后，默认是全局变量，可以在整个运行的脚本的任何地方使用。
//false 区分大小写
define(qiangfen,'抢分',false);
define(QIANGFEN,'大写的抢分',true);
echo qiangfen;

/// . 字符串追加
$firset = 'I am LIHua';
$secont = 'I come form China';
echo $firset.$secont;
//strlen()字符串长度
echo strlen($secont);
//strpos 查找字符串位置
echo strpos($secont,'m');

echo "<br>";

//数组
$students = array('wq','dm','fh');
echo 'i like'.$students;

//获取数组长度
echo count($students);

//关联数组 类似于字典
$age = array('wq'=>'18','kea'=>'13','mm'=>'6');
echo 'wq is'.$age['wq'];

//超级全局变量
/*
 * $GLOBALS 是PHP的一个超级全局变量组，在一个PHP脚本的全部作用域中都可以访问。

$GLOBALS 是一个包含了全部变量的全局组合数组。变量的名字就是数组的键。
 * */

//加法函数
function add($a,$b){
    return $a+$b;
}
echo '<br>';
echo  ''.add(3,5);
//魔术常量
//文件中的当前行号__LINE__
//文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名__FILE__
//文件所在目录__DIR__
//函数名字 __FUNCTION__
//类名 __CLASS__
//__TRAIT__  这个不知道
//__NAMESPACE__ 当前命名空间的名称（区分大小写）。

//命名空间
//构造函数
//function __construct( $par1, $par2 ) {
//   $this->url = $par1;
//   $this->title = $par2;
//}
//继承 extends

?>

