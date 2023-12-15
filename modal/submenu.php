<?php
    include_once "../api/db.php";
?>

<!-- <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;"> -->

<h3 style="text-align: center;">新增次選單</h3>
<hr>
<form action="./api/submenu.php" method="post">
    <input type="hidden" name="table" value="<?=$_GET['table']?>">
    <input type="hidden" name="menu_id" value="<?=$_GET['id']?>">
    <table class="cent table-menu">
        <tr>
            <td>次選單名稱:</td>
            <td>選單連結網址:</td>
            <td>刪除</td>
        </tr>
        <?php
        $subs = $Menu->searchAll(['menu_id'=>$_GET['id']]);
        foreach($subs as $sub){
        ?>
        <tr class="sub-menu">
            <input type="hidden" name="id[]" value="<?=$sub['id']?>">
            <td>
                <input type="text" name="text[]" id="text" value="<?=$sub['text']?>">
            </td>
            <td>
                <input type="text" name="href[]" id="href" value="<?=$sub['href']?>">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$sub['id']?>">
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="addItem()">
        <!-- <input type="button" class="add-btn" value="更多次選單"> -->
    </div>
</form>

<!-- </div> -->

<script>
    function addItem() {
        let item = `<tr>
                        <td><input type="text" name="newText[]" id="text"></td>
                        <td><input type="text" name="newHref[]" id="href"></td>
                    </tr>`;
        $(".table-menu").append(item);
    };
    // const addBtn = document.querySelector(".add-btn");
    // const addItem = () => {
    //     let item = `<tr>
    //                     <td><input type="text" name="newText[]" id="text"></td>
    //                     <td><input type="text" name="newHref[]" id="href"></td>
    //                 </tr>`;
    //     $(".table-menu").append(item);
    // };
    // addBtn.addEventListener("click", addItem);
</script>