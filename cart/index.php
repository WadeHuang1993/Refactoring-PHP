<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../common/header.php');

// TODO: 實作解析 buyItems
// TODO: 實作將購買產品加入 SESSION
// TODO: 將已加入購物車的產品顯示出來
// TODO: 計算產品小計
// TODO: 計算購物車的總金額

?>

<section class="content">
    <div class="row">
        <div class="car col-lg-8 col-lg-offset-2">
            <div class="car-head text-center">
                <h2>購物車</h2>
            </div>
            <div class="cart-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td colspan="2">商品</td>
                        <td>規格/單價</td>
                        <td>購買數量</td>
                        <td>小計</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="<?= IMAGE_ROOT ?>/img1.jpg">
                        </td>
                        <td>
                            <h4 class="name">綠島與我的朋友</h4>
                        </td>
                        <td>
                            <span class="format btn bg-info text-primary">2x3</span>
                            <span class="price text-danger"> $8</span>
                            <span class="unit text-primary"> / 組</span>
                        </td>

                        </td>
                        <td>
                            <span class="amount"> x5</span>
                        </td>
                        <td>
                            <span class="price"> 40 元</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?= IMAGE_ROOT ?>/img1.jpg">
                        </td>
                        <td>
                            <h4 class="name">綠島與我的朋友</h4>
                        </td>
                        <td>
                            <span class="format btn bg-info text-primary">3x5</span>
                            <span class="price text-danger"> $3</span>
                            <span class="unit text-primary"> / 張</span>
                        </td>

                        </td>
                        <td>
                            <span class="amount"> x4</span>
                        </td>
                        <td>
                            <span class="price"> 12 元</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?= IMAGE_ROOT ?>/img1.jpg">
                        </td>
                        <td>
                            <h4 class="name">綠島與我的朋友</h4>
                        </td>
                        <td>
                            <span class="format btn bg-info text-primary">4x6</span>
                            <span class="price text-danger"> $3.5</span>
                            <span class="unit text-primary"> / 張</span>
                        </td>

                        </td>
                        <td>
                            <span class="amount"> x10</span>
                        </td>
                        <td>
                            <span class="price"> 35 元</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr/>
                <div class="pull-right">
                    <div class="total">
                        <p></p>
                        <p>
                            宅配 | 運費 NT$ 80<br>
                        </p>

                        <p></p>

                        <p><strong>合計　NT$<em>
                                    167</em></strong></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
