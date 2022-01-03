<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
<br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>


<?php
function cmp_ASC($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

function cmp_DESC($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
} else {
    $sort = "name";
}
if (isset($_GET['order'])) {
    $order = $_GET['order'];
} else {
    $order = 0;
}

// Сортування

// you can use array_column() instead of the above code
// $price  = array_column($products, 'price');
$priceArray = array();

for ($i = 0; $i < count($products); $i++) {
    $priceArray[$i] = $products[$i]['price'];
}
if ($sort === "price" && $order == 0) {
    uasort($priceArray, 'cmp_ASC');
} else if ($sort === "price" && $order == 1) {
    uasort($priceArray, 'cmp_DESC');
}
$temp = array();
$keys = array_keys($priceArray);
for ($i = 0; $i < count($products); $i++) {
    $temp[] = $products[$keys[$i]];
}

$products = $temp;

// if ($sort === "price" && $order == 0) {
//     array_multisort($price, SORT_ASC, $products);
// } else if ($sort === "price" && $order == 1) {
//     array_multisort($price, SORT_DESC, $products);
// }
foreach ($products as $product) :
?>
    <div class="product">
        <p class="sku">Код: <?php echo $product['sku'] ?></p>
        <h4><?php echo $product['name'] ?><h4>
                <p> Ціна: <span class="price"><?php echo $product['price'] ?></span> грн</p>
                <p><?php if (!$product['qty'] > 0) {
                        echo 'Нема в наявності';
                    } ?></p>
    </div>
<?php endforeach; ?>