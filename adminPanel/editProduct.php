<?php
include("php/query.php");
include("components/header.php");

if(isset($_GET['productId'])){
    $pId = $_GET['productId']; 

    // Fixing the query
    // inner join use for editpage droppdown slect catgory show
    $query = $pdo->prepare("
    SELECT products.*, categories.id as cId, categories.name as cName 
    FROM products 
    INNER JOIN categories ON products.c_id = categories.id 
    WHERE products.id = :proId
");
    $query->bindParam(':proId', $pId);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Edit Product Form -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded p-5 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-10">
            <div class="bg-light rounded h-100 p-4">
                <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif;">Edit Product</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <!-- Product Name -->
                    <div class="form-floating mb-3">
                        <input value="<?php echo $product['name'] ?? ''; ?>" name="prName" type="text" class="form-control" placeholder="Enter Product Name">
                        <label>Product Name</label>
                    </div>

                    <!-- Product Image -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input name="prImage" class="form-control" type="file">
                        <img height="100px" src="productimg/<?php echo $product['image'] ?? ''; ?>" alt="">
                    </div>

                    <!-- Description -->
                    <div class="form-floating mb-3">
                        <textarea name="prDes" class="form-control" placeholder="Enter Description" style="height: 150px;"><?php echo $product['description'] ?? ''; ?></textarea>
                        <label>Description</label>
                    </div>

                    <!-- Price -->
                    <div class="form-floating mb-3">
                        <input value="<?php echo $product['price'] ?? ''; ?>" type="text" name="prPrice" class="form-control" placeholder="Enter Price">
                        <label>Price</label>
                    </div>

                    <!-- Quantity -->
                    <div class="form-floating mb-3">
                        <input value="<?php echo $product['qty'] ?? ''; ?>" type="text" name="prQty" class="form-control" placeholder="Enter Quantity">
                        <label>Quantity</label>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="categoryId">
                            <option value="<?php echo $product['cId'] ; ?>" selected><?php echo $product['cName'] ; ?></option>
                            <?php
                            //ya dropdown ma wo wala name show nahi kra ga jo edit pa auto select hoga
                            $query = $pdo->prepare("SELECT * FROM categories WHERE id != :cId");
                            $query->bindParam(':cId', $product['cId']);
                            $query->execute();
                            $categories = $query->fetchAll(PDO::FETCH_ASSOC);
                            
                            foreach($categories as $category){
                            ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button name="updateproduct" class="btn btn-primary m-2">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("components/footer.php"); ?>
