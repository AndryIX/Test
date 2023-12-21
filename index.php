<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<link rel="stylesheet" href="../css/style.css">
<body>
    <h1 class="header">Test</h1>
    <div class="content">

<div class="add-form" action="index.php" method="post">
    <label for="company">Производитель</label>
    <input type="text" name="company" id="company">
    <label for="product_name">Название</label>
    <input type="text" name="product_name" id="product">
    <label for="">Цена</label>
    <input type="text" name="price" id="price">
    <label for="quant">Количество</label>
    <input type="number" name="quant" id="quant" value="0">
    <input type="submit" id="btn_add" value="Добавить">
</div>

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
    <tbody id="content"></tbody>
    <tr class="result-row" id="resRow"></tr>
</table>
</div>
<script type="text/javascript" src="../js/rest.js"></script>
<script type="text/javascript" src="../js/sortTable.js"></script>
<script type="text/javascript" src="../js/tooltip.js"></script>
</body>

</html>