<?php
require_once('config/config.php');
require_once('common/header2.php');

$id = $_GET['id'];

$sql = $db->select()
    ->from('images')
    ->where('id', '=', $id);

$result = $sql->execute();

$row = $result->fetch();

// 取得上一筆資料
$sql = $db->select()
    ->from('images')
    ->where('id', '<', $id)
    ->limit(1);

$result = $sql->execute();

$previous_row = $result->fetch();

// 取得下一筆資料
$sql = $db->select()
    ->from('images')
    ->where('id', '>', $id)
    ->limit(1);

$result = $sql->execute();

$next_row = $result->fetch();
?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?= IMAGE_ROOT . $row['src'] ?>" alt="<?= $row['title'] ?>">
            <div class="carousel-caption">
                <h3><?= $row['title'] ?></h3>
            </div>
        </div>
    </div>

    <!-- 有取到上一筆才顯示按鈕 -->
    <?php if (is_array($previous_row)): ?>
        <a class="left carousel-control" href="<?= WEB_ROOT . 'image-detail?id=' . $previous_row['id'] ?>" role="button"
           data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
    <?php endif; ?>
    <!-- 有取到下一筆才顯示按鈕 -->
    <?php if (is_array($next_row)): ?>
        <a class="right carousel-control" href="<?= WEB_ROOT . 'image-detail?id=' . $next_row['id'] ?>" role="button"
           data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    <?php endif; ?>
</div>

<div class="container text-center">
    <hr/>
    <div class="row image-info-left">
        <div class="col-sm-6  text-left">
            <div>
                <p>照片擁有人: <?= $row['owner'] ?></p>
            </div>
            <div>
                <p><?= $row['title'] ?></p>
                <p><?= $row['description'] ?></p>
            </div>
        </div>
        <div class="col-sm-6 image-info-right text-left">
            <div class="taken-time text-right">
                <p>拍攝於 <?= date('Y 年 m 月 d 日', strtotime($row['taken_time'])) ?></p>
            </div>
            <hr/>
            <h3>線上沖洗服務</h3>

            選擇要沖洗的尺寸
            <hr/>
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>尺寸 / 單價</td>
                    <td>大量購價</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <button class="format btn bg-info text-primary" data-toggle="modal" data-target="#print-window" data-format="2x3">2x3</button>
                        <span class="price text-danger"> $8</span>
                        <span class="unit text-primary"> / 組</span>
                    </td>
                    <td>
                        <span class="discount"> 無大量購價</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="format btn bg-info text-primary" data-toggle="modal" data-target="#print-window" data-format="3x5">3x5</button>
                        <span class="price text-danger"> $3</span>
                        <span class="unit text-primary"> / 張</span>
                    </td>
                    <td>
                        <span class="discount"> 1000 張以上 1 張 </span>
                        <span class="text-danger">$2.5</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="format btn bg-info text-primary" data-toggle="modal" data-target="#print-window" data-format="4x6">4x6</button>
                        <span class="price text-danger"> $3.5</span>
                        <span class="unit text-primary"> / 張</span>
                    </td>
                    <td>
                        <span class="discount"> 1000 組以上 1 張 </span>
                        <span class="text-danger">$3</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#print-window">...</button>

<div id="print-window" class="modal inmodal fade"  tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <div class="modal-title ">
                    <h3>選擇沖印數量</h3>
                </div>
            </div>
            <div class="modal-body" >
                <div>
                    <img class="center-block" src="<?= IMAGE_ROOT . $row['src'] ?>" />
                </div>
                <hr/>
                <h3>規格：</h3>
                <label for="mount">數量</label>

            </div>
            <div class="modal-footer" >
                <button class="btn add-product">OK</button>
                <button class="btn cancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.add-product').click(function() {

        });
        $('.cancel').click(function() {
//            $('#print-window').hide();
        });
    });
</script>

<?php require_once('common/footer.php'); ?>
