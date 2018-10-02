<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админ панель</a> </li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i>
                Добавить товар
            </a>
            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th style="width: 9%">ID товара</th>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                <tr>
                    <td style="width: 9%"><a href="/admin/product/update/<?php echo $product['id']; ?>"><?php echo $product['id']; ?><a/></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>
                        <?php if ($product['status']==0): ?>
                            <a><i class="fa fa-eye-slash"></i></a>
                        <?php else: ?>
                            <a><i class="fa fa-eye"></i></a>
                        <?php endif; ?>
                    </td>
                    <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div style="margin:0 auto; text-align: center;"><?= $pagination->get(); ?></div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

