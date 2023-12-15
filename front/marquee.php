<?php
$datas = $Ad->searchAll(['display'=>1]);
$marquees = [];
foreach($datas as $data){
    array_push($marquees, $data['text']);
}
?>

<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    <?=implode(",&nbsp;&nbsp;&nbsp;&nbsp;", $marquees);?>
</marquee>