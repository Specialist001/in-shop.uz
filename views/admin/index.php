<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul>
                <li>
                    <div class="col-md-3">
                        <div class="panel panel-config bg-lime">
                            <a href="/admin/product" class="panel-title"><div>Управление товарами</div></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col-md-3">
                        <div class="panel panel-config bg-orange">
                            <a href="/admin/category" class="panel-title"><div>Управление категориями</div></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col-md-3">
                        <div class="panel panel-config bg-blue">
                            <a href="/admin/order" class="panel-title"><div>Управление заказами</div></a>
                        </div>
                    </div>
                </li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

