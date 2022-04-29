<?php

include ("../includes/senz_database.php");

if (isset($_POST['action'])) {
    $conn = ControlDB::getconnect();
    $sql = "SELECT * FROM product JOIN category ON product.category_category_id=category.category_id WHERE category_category_id != '' ";

    if (isset($_POST['category_name'])) {
        $category = implode("','", $_POST['category_name']);
        $sql .= "AND category_name IN('" . $category . "')";
    }
    $result = $conn->query($sql) or die($conn->error);
    return $result;
    $output = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= '<div class="col-lg-2 col-md-6 pro-items tab1">
                            <div class="card">
                                <a href="#"><img class="card-img-top-box" src="../uploads' . $row['product_img'] . '" alt="">
                                <h4> ' . $row['product_name'] . '</h4>
                                <p>Price : ' . number_format($row['product_price']) . ' Rs</p>
                                </a>
                            </div>
                        </div>';
        }
    } else {
      $output = "<h3>No Products Found!</h3>";  
    }
    echo $output;
}