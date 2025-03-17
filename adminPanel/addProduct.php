<?php
include('php/query.php');
include('components/header.php');

?>

     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3 class="mb-4 text-center" style="font-family: 'Merriweather', serif;">This is Products page</h3>
                        <form action="" method="POST"  enctype="multipart/form-data">
                          
                       
                            <div class="form-floating mb-3">
                              
                              <input value="<?php echo $pName ?>" type="text" name="prName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <label for="floatingInput">Categorys Name</label>
                              <small id="helpId" class="text-danger"><?php echo $pNameErr ?></small>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Category Image</label>
                                <input name="prImage" class="form-control" type="file" id="formFile">
                                <small><?php echo $pImageName?></small>
                                <small  class="text-danger"><?php echo $pImageNameErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="prDes" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;"><?php echo $categoryDes?></textarea>
                                <label for="floatingTextarea">Description</label>
                                <small class="text-danger"><?php echo $pDesErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                              
                              <input value="<?php echo $pPrice ?>" type="text" name="prPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <label for="floatingInput">Price</label>
                              <small id="helpId" class="text-danger"><?php echo $pPriceErr ?></small>
                            </div>
                            <div class="form-floating mb-3">
                              
                              <input value="<?php echo $pQty ?>" type="text" name="prQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <label for="floatingInput">Quantity</label>
                              <small id="helpId" class="text-danger"><?php echo $pQtyErr ?></small>
                            </div>
                            <div class="form-group mb-3">
                              <div class="form-group mb-3">
                                
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
                            <button  name="addProduct" id="" class="btn btn-primary">addProduct</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php include('components/footer.php') ?>