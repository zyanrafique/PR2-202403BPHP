<?php
include("dbcon.php");

//variables
$categoryName = $categoryDes = $categoryImageName = "";
$categoryNameErr = $categoryDesErr = $categoryImageNameErr = "";

// Add a category start
//adddCategory.php & editCategory.php & viewCategory.php & deleteCategory 
if (isset($_POST['addCategory'])) {
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryImageName = $_FILES['cImage']['name'];
    $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($categoryImageName, PATHINFO_EXTENSION);
    $destination = "Categoryimage/" . $categoryImageName;
    $categoryImageSize = $_FILES['cImage']['size'];
 // Validate category name
    if (empty($categoryName)) {
        $categoryNameErr = "Category Name is Required";
    }
    if (empty($categoryImageName)) {
        $categoryImageNameErr = "Category Image is Required";
    } else {
        $format = ["jpg", "png", "jpeg", "webp"];
        if (!in_array($extension, $format)) {
            $categoryImageNameErr = "Invalid Extension";
        }
    }
    if (empty($categoryDes)) {
        $categoryDesErr = "Category Description is Required";
    }
// Add a category end
//data add to database
    if (empty($categoryNameErr) && empty($categoryDesErr) && empty($categoryImageNameErr)) {
        if (move_uploaded_file($categoryImageTmpName, $destination)) {
            $query = $pdo->prepare("INSERT INTO categories(name, description, image) VALUES (:cName, :cDes, :cImage)");
            $query->bindParam('cName', $categoryName);
            $query->bindParam('cDes', $categoryDes);
            $query->bindParam('cImage', $categoryImageName);
            $query->execute();
            echo "<script>alert('Category added successfully'); location.assign('addCategory.php')</script>";
        }
    }
}

// Updating  privuse category
if (isset($_POST['updateCategory'])) {
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryId = $_GET['categoryId'];

    if (empty($categoryName)) {
        $categoryNameErr = "Category Name is Required";
    }
    if (empty($categoryDes)) {
        $categoryDesErr = "Category Description is Required";
    }
    //update category without image
    $query = $pdo->prepare("update categories set name = :cName , description = :cDes where id = :cId");
    //update category with image
    if(!empty($_FILES['cImage']['name'])){
            $categoryImageName = $_FILES['cImage']['name'];
            $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
            $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
            $destination = "Categoryimage/".$categoryImageName ;
            $format = ["jpg" , "png" , "jpeg" ,"webp"];
            if(in_array($extension,$format)){
                    if(move_uploaded_file($categoryImageTmpName,$destination)){
                        $query = $pdo->prepare("update categories set name = :cName , description = :cDes ,image = :cImage where id = :cId");
                        $query->bindParam('cImage',$categoryImageName);
                    }
            }
            else{
                $categoryImageNameErr = "Invalid extension";
            }          
    }
    $query->bindParam('cName',$categoryName);
    $query->bindParam('cDes',$categoryDes);
    $query->bindParam('cId',$categoryId);
    $query->execute();
    echo "<script>alert('Category updated successfully'); location.assign('viewCategory.php')</script>";
}
// Update a category end

// Deleting a category  on viewCategory & database start
if (isset($_GET['cId'])) {
    $cId = $_GET['cId'];
    $query = $pdo->prepare("DELETE FROM categories WHERE id = :cId");
    $query->bindParam('cId', $cId);
    $query->execute();
    echo "<script>alert('Category deleted successfully'); location.assign('viewCategory.php')</script>";
}
   // Deleting a category end
   ?>

   
   <?php
//add product working 
//adProduct.php & editProduct.php & viewProduct.php & deleteProduct

   //variables
$pName = $pImageName = $pDes = $pPrice = $pQty = "";
$pNameErr = $pImageNameErr = $pDesErr = $pPriceErr = $pQtyErr = "";

// Add a product start
if(isset($_POST['addProduct'])){
    $pName = $_POST['prName'];
    $pDes = $_POST['prDes'];
    $pPrice = $_POST['prPrice'];
    $pQty = $_POST['prQty'];
    $categoryId = $_POST['categoryId'];
    $pImageName = $_FILES['prImage']['name'];
    $pImageTmpName = $_FILES['prImage']['tmp_name'];
    $extension = pathinfo( $pImageName , PATHINFO_EXTENSION);
    $destination = "productimg/" . $pImageName;
    $pImageNamesize = $_FILES['prImage']['size'];

    if (empty($pName)) {
        $pNameErr = "Product Image is Required";
    } 
    if (empty($pDes)) {
        $pDesErr = "Product Image is Required";
    } 
    if (empty($pPrice)) {
        $pPriceErr = "Product Image is Required";
    } 
    if (empty($pImageName)) {
        $pImageNameErr = "Product Image is Required";
    } else {
        $format = ["jpg", "png", "jpeg", "webp"];
        if (!in_array($extension, $format)) {
            $pImageNameErr = "Invalid Extension";
        }
    }
    // Add a product end
    //data add to database
    if (empty($pNameErr) && empty($pDesErr) && empty($pPriceErr) && empty($pImageNameErr)) {
        if (move_uploaded_file($pImageTmpName, $destination)) {
            $c_id = $_POST['categoryId']; // Category ID from dropdown
    
            $query = $pdo->prepare("INSERT INTO products(name, description, price, image, qty, c_id) 
                                    VALUES (:prName, :prDes, :prPrice, :prImage, :prQty, :cId)");
            $query->bindParam(':prName', $pName);
            $query->bindParam(':prDes', $pDes);
            $query->bindParam(':prPrice', $pPrice);
            $query->bindParam(':prImage', $pImageName);
            $query->bindParam(':prQty', $pQty);
            $query->bindParam(':cId', $categoryId); // Bind category ID
            $query->execute();
            echo "<script>alert('Product added successfully'); location.assign('addProduct.php')</script>";
        }
    }
    
//product add end
}


// Update a product start
//editCate.php
if (isset($_POST['updateproduct'])) {
    $pName = $_POST['prName'];
    $pDes = $_POST['prDes'];
    $pPrice = $_POST['prPrice'];
    $pQty = $_POST['prQty'];
    $categoryId = $_POST['categoryId'];
    $productId = $_GET['productId'];

    // Validation
    if (empty($pName)) {
        $pNameErr = "Category Name is Required";
    }
    if (empty($pDes)) {
        $pDesErr = "Category Description is Required";
    }

    // Default query to update product without image
    $query = $pdo->prepare("UPDATE products SET name = :prName, description = :prDes, qty = :prQty, price = :prPrice, c_id = :cId WHERE id = :proId");

    // Update product with image if image is provided
    if (!empty($_FILES['prImage']['name'])) {
        $pImageName = $_FILES['prImage']['name'];
        $pImageTmpName = $_FILES['prImage']['tmp_name'];
        $extension = pathinfo($pImageName, PATHINFO_EXTENSION);
        $destination = "productimg/" . $pImageName;
        $format = ["jpg", "png", "jpeg", "webp"];

        if (in_array($extension, $format)) {
            if (move_uploaded_file($pImageTmpName, $destination)) {
                // Update query with image
                $query = $pdo->prepare("UPDATE products SET name = :prName, description = :prDes, qty = :prQty, price = :prPrice, c_id = :cId, image = :prImage WHERE id = :proId");
                $query->bindParam(':prImage', $pImageName);
            }
        } else {
            $pImageNameErr = "Invalid file extension";
        }
    }

    // Bind parameters
    $query->bindParam(':prName', $pName);
    $query->bindParam(':prDes', $pDes);
    $query->bindParam(':prPrice', $pPrice);
    $query->bindParam(':prQty', $pQty);
    $query->bindParam(':cId', $categoryId);
    $query->bindParam(':proId', $productId);  // Corrected this line

    // Execute query
    $query->execute();
    echo "<script>alert('Product updated successfully'); location.assign('viewProduct.php')</script>";
}

// Update product end


// Deleting  product in viewProduct & databade start
if (isset($_GET['pId'])) {
    $pId = $_GET['pId'];
    $query = $pdo->prepare("DELETE FROM products WHERE id = :pId");
    $query->bindParam('pId', $pId);
    $query->execute();
    echo "<script>alert('Category deleted successfully'); location.assign('viewProduct.php')</script>";
}
?>