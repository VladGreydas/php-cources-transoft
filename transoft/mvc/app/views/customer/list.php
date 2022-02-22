<h2>Клієнти:</h2>
<?php
$customers =  $this->get('customer');
foreach ($customers as $customer) :
    ?>
    <div class="product">
        <h3 class="last_name"><?php echo $customer['last_name']?></h3>
        <h4><?php echo $customer['first_name']?></h4>
        <p> Електронна пошта: <span class="email"><?php echo $customer['email']?></span></p>
        <p> Місто: <?php echo $customer['city']?></p>
    </div>
<?php endforeach; ?>

