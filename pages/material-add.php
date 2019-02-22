<?php session_start() ?>
<?php $title = "Добавление материала" ?>
<?php
require_once('../forms/MaterialForm.php');
require_once('../DB.php');
require_once('../Password.php');
require_once('../Session.php');
require_once('../Dbsettings.php');
$msg = '';
$db = new DB($host, $user, $password, $db_name);
$form = new MaterialForm($_POST);
if ($_POST) {
    if ($form->validate()) {
        $material_name = $db->escape($form->getMaterialName());
        $count = $db->escape($form->getCount());
        $price = $db->escape($form->getPrice());
        $notice = $db->escape($form->getNotice());
        $storehouse_idstorehouse = $db->escape($form->getStorehouse_idstorehouse());
        $adoptiondate = $db->escape($form->getAdoptiondate());
        $responsible_person = $db->escape($form->getResponsible_person());
        $db->query("INSERT INTO material (material_name, `count`, price, notice, storehouse_idstorehouse, adoptiondate, responsible_person) VALUES ('{$material_name}', '{$count}', '{$price}', '{$notice}', '{$storehouse_idstorehouse}', '{$adoptiondate}', '{$responsible_person}') ");
        header('location: material.php?msg=Материал успешно добавлен!');
    } else {
        $msg = 'Пожалуйста, заполните все поля';
    }
}
?>
<?php include 'header.php' ?>
<hr>
<h5 align="center">Добавление материала</h5>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-center border border-top-0 border-left-0" style="line-height: 40px;">Меню</h5>
        </div>
        <div class="col-sm">
            <h5 class="text-center border border-top-0 border-right-0"
                style="line-height: 40px;"><?php echo $title ?></h5>
        </div>
    </div>
    <div class="row">
        <?php include_once('../navigation.php'); ?>
        <div class="col-sm">
            <div class="text-justify border border-bottom-0 border-right-0"
                 style="line-height: 40px; padding-left: 10px; padding-right: 10px;">
                <b style="color: red;"><?= $msg; ?></b>
                <form method="post">
                    <div class="form-group">
                        <label for="material_name">Название материала</label>
                        <input type="text" class="form-control" id="material_name" placeholder="Название материала"
                               name="material_name"
                               value="<?= $form->getMaterialName(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="notice">Описание материала</label>
                        <input type="text" class="form-control" id="notice"
                               placeholder="Описание материала" name="notice"
                               value="<?= $form->getNotice() ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Стоимость материала</label>
                        <input type="text" class="form-control" id="price"
                               placeholder="Стоимость материала" name="price"
                               value="<?= $form->getPrice() ?>">
                    </div>
                    <div class="form-group">
                        <label for="count">Количество</label>
                        <input type="text" class="form-control" id="count"
                               placeholder="Количество" name="count"
                               value="<?= $form->getCount() ?>">
                    </div>
                    <div class="form-group">
                        <label for="storehouse">Место хранения</label>
                        <select class="form-control" name="storehouse_idstorehouse" id="storehouse">
                            <?php
                            $storehouse = $db->query("SELECT idstorehouse, storename FROM storehouse");
                            foreach ($storehouse as $itemstorehouse) {
                                ?>
                                <option value="<?php echo $itemstorehouse['idstorehouse'] ?>"><?php echo $itemstorehouse['storename'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adoptiondate">Дата добавления</label>
                        <input type="date" class="form-control" id="adoptiondate"
                               placeholder="Дата добавления" name="adoptiondate"
                               value="<?= $form->getAdoptiondate() ?>">
                    </div>
                    <div class="form-group">
                        <label for="responsible_person">Отвественный сотрудник</label>
                        <select class="form-control" name="responsible_person" id="responsible_person">
                            <?php
                            $responsible_person = $db->query("SELECT idemployee,  `name`, secondname FROM employee");
                            foreach ($responsible_person as $itemresponsible_person) {
                                ?>
                                <option value="<?php echo $itemresponsible_person['idemployee'] ?>"><?php echo $itemresponsible_person['name'] . " " . $itemresponsible_person['secondname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="material.php" class="btn btn-info">Отмена</a>

                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'footer.php' ?>
