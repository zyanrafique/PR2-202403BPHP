<?php
include("php/query.php");
include("components/header.php");
?>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded p-3 justify-content-center mx-0">
                    <div class="col-md-12">
                        <h3 class="text-center mb-4" style="font-family: 'Merriweather', serif;">This is View Product Page</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Decription</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $query = $pdo->query("select * from products");
                                    $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                    // print_r($allCategories);
                                    foreach($allProducts as $Product){
                                    ?>
                                <tr>
                                    <td><?php echo $Product['name']?></td>
                                    <td><?php echo $Product['description']?></td>
                                    <td><img height="100px" src="productimg/<?php echo $Product['image']?>" alt=""></td>
                                    <td><?php echo $Product['price']?></td>
                                    <td><?php echo $Product['qty']?></td>
                                    <td><?php echo $Product['c_id']?></td>
                                    <td><a class="btn btn-primary" href="editProduct.php?productId=<?php echo $Product['id']?>">Edit</a></td>
                                    <td><a class="btn btn-danger" href="?pId=<?php echo $Product['id']?>">Delete</a></td>
                               
                            </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


<?php

include("components/footer.php");
?>