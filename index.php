<?php 
require_once __DIR__ . "/app/Data.php";
require __DIR__ . "/blocks/header.html";

use Api\Data;

if (isset($_POST['btn_add'])){
    Data::addProduct($_POST['company'], $_POST['product_name'], $_POST['price'], $_POST['quant']);
}

if (isset($_POST['btn_confirm'])){
    Data::delProduct($_GET['id_prod']);
}

$all_products = Data::getProducts();
?>

<form class="add-form" action="index.php" method="post">
    <label for="company">Производитель</label>
    <input type="text" name="company" id="company">
    <label for="product_name">Название</label>
    <input type="text" name="product_name" id="product_name">
    <label for="">Цена</label>
    <input type="text" name="price" id="price">
    <label for="quant">Количество</label>
    <input type="number" name="quant" id="quant" value="0">
    <input data-tooltip="Check" type="submit" name="btn_add" id="btn_add" value="Добавить">
</form>

<table id="table" class="view-products">
    <thead>
        <tr>
            <th data-type="string">№</th>
            <th data-type="string">Производитель</th>
            <th data-type="string">Название</th>
            <th data-type="number">Цена</th>
            <th data-type="number">Количество</th>
        </tr>
    </thead>
    <tbody>
    <?
    if($all_products != null){
        $id_propuct = count($all_products);
        foreach($all_products as $index => $value){?>
            <tr class="entry" 
            data-tooltip="Компания: <?=$value[0].'<br> Название: '.$value[1].'<br> Цена: '.$value[2].'<br> Количество: '.trim($value[3])?>"
            onclick="window.location.href='action/del_product_confirm.php?id_prod=<?=$index?>'; return false;">
                <td><?=$index+1?></td>
                <td><?=$value[0]?></td>
                <td><?=$value[1]?></td>
                <td><?=$value[2]?></td>
                <td><?=trim($value[3])?></td>
            </tr>
        <?
        $prise_sum += $value[2];
        $quant_sum += trim($value[3]);
        }
    }
    ?>
    </tbody>
    <tr class="result-row">
        <td colspan="3">Итог:</td>
        <td><?=$prise_sum?></td>
        <td><?=$quant_sum?></td>
    </tr>
</table>
<?

require __DIR__ . "/blocks/footer.html";