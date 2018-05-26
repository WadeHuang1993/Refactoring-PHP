<?php
require_once('config/config.php');
require_once('common/header.php');

$sql = $db->select()
    ->from('images');

$result = $sql->execute();
?>
<div class="container">
    <div class="row">
        <?php while ($row = $result->fetch()) { ?>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"><?= $row['title'] ?></div>
                    <div class="panel-body"><img src="<?= IMAGE_ROOT . $row['src'] ?>" class="img-responsive"
                                                 style="width:100%" alt="<?= $row['title'] ?>"></div>
                    <div class="panel-footer"><?= $row['description'] ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require_once('common/footer.php'); ?>
