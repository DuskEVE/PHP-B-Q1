<?php
include_once "../api/db.php";
?>

<h2 class="ct"><?=isset($_GET['id'])?"編輯次選單":"新增主選單";?></h2>
<form action="./api/update_menu.php" method="post">
    <?=isset($_GET['id'])?"<input type='hidden' name='menu_id' value='{$_GET['id']}'>":"";?>
    <div class="menu-form" style="display: flex; flex-wrap: wrap;">
        <div class="ct" style="width: 100%; display: flex; justify-content: center;">
            <div style="width:30%"><?=isset($_GET['id'])?"次選單名稱":"主選單名稱";?></div>
            <div style="width:30%"><?=isset($_GET['id'])?"次選單網址":"主選單網址";?></div>
            <?=isset($_GET['id'])?"<div style='width:10%'>刪除</div>":"";?>
        </div>
        <?php
        if(isset($_GET['id'])){
            $subMenus = $Menu->searchAll(['menu_id'=>$_GET['id']]);
            foreach($subMenus as $subMenu){
        ?>
        <div class="ct" style="width: 100%; display: flex; justify-content: center;">
            <input type="hidden" name="id[]" value="<?=$subMenu['id']?>">
            <div style="width:30%">
                <input type="text" name="text[]" value="<?=$subMenu['text']?>" style="width: 90%">
            </div>
            <div style="width:30%">
                <input type="text" name="href[]" value="<?=$subMenu['href']?>" style="width: 90%">
            </div>
            <div style="width:10%">
                <input type="checkbox" name="del[]" value="<?=$subMenu['id']?>">
            </div>
        </div>
        <?php
            }
        }
        else{
        ?>
        <div class="ct" style="width: 100%; display: flex; justify-content: center;">
            <div style="width:30%">
                <input type="text" name="text" style="width: 90%">
            </div>
            <div style="width:30%">
                <input type="text" name="href" style="width: 90%">
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <div class="ct" style="width: 100%; display: flex; justify-content: center;">
        <input type="submit" class="add-admin-btn" value="<?=isset($_GET['id'])?"確認修改":"新增";?>">
        <input type="reset" class="reset-admin-btn" value="重置">
    </div>
</form>
<?=isset($_GET['id'])?"<div class='ct'><button class='add-submenu'>更多次選單</button></div>":"";?>

<script>
    $('.add-submenu').on('click', () => {
        let element = `
        <div class="ct" style="width: 100%; display: flex; justify-content: center;">
            <input type="hidden" name="id[]" value="0">
            <div style="width:30%">
                <input type="text" name="text[]" style="width: 90%">
            </div>
            <div style="width:30%">
                <input type="text" name="href[]" style="width: 90%">
            </div>
            <div style="width:10%"></div>
        </div>
        `;
        $('.menu-form').append(element);
    });
</script>