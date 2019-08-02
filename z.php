<?php
$num=array(10,20,35,50,45,32,18);

$max=$num[0];

for($i=1;$i<count($num);$i++){

    if($num[$i]>$max){

        $max=$num[$i];

    }

}

echo '数组中最大的数为：'.$max;
?>