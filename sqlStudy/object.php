<!DOCTYPE html>
<html>
<body>

<?php
class Car
{
    var $color;
    /*
     * function __construct( $par1, $par2 ) {
   $this->url = $par1;
   $this->title = $par2;
}
     * */
    function __construct($color="green") {
        $this->color = $color;
    }
    function what_color() {
        return $this->color;
    }
}

class  person{
    var $name;
    var $age;

    function __construct ($name = "wq"){
        $this.$name = $name;
    }

}
function print_vars($obj) {
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val\n";
    }
}

// 实例一个对象
$herbie = new Car("white");

// 显示 herbie 属性
echo "\therbie: Properties\n";
print_vars($herbie);

?>

</body>
</html>