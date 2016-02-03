<?php
/**
 * Created by PhpStorm.
 * User: session1
 * Date: 2/3/16
 * Time: 3:05 PM
 */
if($_POST['search']){
    $sql = "select * from products where category like '%{$_POST['search']}%'";


    $result = array(array('name'=>'Table'), array('name'=>'Bench'));


    echo "<ul>";
    foreach($result as $product){
        ?>
        <li><a href="products.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></li>
<!--        <li>--><?php //echo $product['description']?><!--</li>-->
        <?php
    }
    echo "</ul>";
}

