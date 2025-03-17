
<?php
include("php/query.php");
include("components/header.php");
?>


<?php

if(isset($_GET['productId'])){
    $pId = $_GET['productId']; 

    // Prepare and execute the query
    $query = $pdo->prepare("SELECT * FROM products WHERE id = :proId");
    $query->bindParam(':proId', $pId);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);


}
?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  p-5 justify-content-center mx-0">
                <div class="col-sm-12 col-xl-10">
                 
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif;">Edit Product </h2>
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input value="<?php echo $product['name']?>" name="prName" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Category Name">
                                <label for="floatingInput">Product Name</label>
                             
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input name="prImage" class="form-control" type="file" id="formFile">
                                <img height="100px" src="productimg/<?php echo $product['image']?>" alt="">
                               <small class="text-danger"><?php echo $pImageNameErr?></small>
                            </div>
                          
                            <div class="form-floating mb-3">
                                <textarea name="prDes" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;"><?php echo $product['description']?></textarea>
                                <label for="floatingTextarea">Description</label>
                              
                            </div>
                            <div class="form-floating mb-3  ">
                           
                              <input value="<?php echo $product['price']?>" type="text" name="prPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <label for="floatingInput">Price</label>
                            </div>
                            <div class="form-floating">
                           
                              <input value="<?php echo $product['qty']?>" type="text" name="prQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <label for="floatingInput">Quantity</label>
                            </div>
                            <div class="form-floating mb-3">
                              <div class="form-group">
                                <label for="">Select</label>
                                <select class="form-control" name="categoryId" id="">
                                  <option>Select Category</option>
                                  <?php
                                  $query = $pdo->query("select * from categories");
                                  $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                  foreach($allCategories as $category){
                                  ?>
                                  <option value="<?php echo $category['id']?>" ><?php echo $category['name']?></option>
                                <?php
                                }
                                ?>
                                </select>
                              </div>
                            </div>
                            <button name="updateproduct" class="btn btn-primary m-2 ">Update Product</button>
                            </form>

                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- Blank End -->


       
         <?php
         include("components/footer.php");
         ?>