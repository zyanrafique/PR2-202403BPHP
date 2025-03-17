<!-- 
 Topic: Login System & Registration System
 Summary:
✅ User Registration: Checks for empty fields, validates email uniqueness, and inserts user into the database.
✅ User Login: Validates email and password, sets session variables for admin and regular users.
✅ Error Handling: Displays appropriate messages for missing fields, incorrect credentials, or existing users.

-->

<?php
include("dbcon.php");
session_start();

// Initialize variables
$userName = $userEmail = $userPassword = $userConfirmPassword = "" ;
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "" ;

// ========== USER REGISTRATION ==========
if(isset($_POST['registerUser'])){
    // Get input values
    $userName = $_POST['uName'];
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $userConfirmPassword = $_POST['uConfirmPassword'];

    // Validation
    if(empty($userName)){
        $userNameErr = "Name is required";
    }
    if(empty($userEmail)){
        $userEmailErr = "Email is required";
    } else {
        // Check if email already exists
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :uEmail");
        $query->bindParam('uEmail', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if($user){
            $userEmailErr = "Email already exists";
        }
    }
    if(empty($userPassword)){
        $userPasswordErr = "Password is required";
    }
    if(empty($userConfirmPassword)){
        $userConfirmPasswordErr = "Confirm password is required";
    } else {
        if($userConfirmPassword != $userPassword){
            $userConfirmPasswordErr = "Passwords do not match";
        }
    }

    // If no errors, insert user into database
    if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)){
        $query = $pdo->prepare("INSERT INTO users(name, email, password) VALUES (:uName, :uEmail, :uPassword)");
        $query->bindParam('uName', $userName);
        $query->bindParam('uEmail', $userEmail);
        $query->bindParam('uPassword', $userPassword);
        $query->execute();
        
        echo "<script>alert('User Registered'); location.assign('signup.php')</script>";
    }
}

// ========== USER LOGIN ==========
if(isset($_POST['userLogin'])){
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];

    if(empty($userEmail)){
        $userEmailErr = "Email is required";
    } else {
        // Check if user exists
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :uEmail");
        $query->bindParam('uEmail', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if($user){
            // Verify password
            if($user['password'] == $userPassword){
                if($user['role_id'] == 1){ // Admin Login
                    $_SESSION['adminId'] = $user['id'];
                    $_SESSION['adminName'] = $user['name'];
                    $_SESSION['adminEmail'] = $user['email'];
                    $_SESSION['adminRoleId'] = $user['role_id'];
                    echo "<script>location.assign('login.php?success=admin login')</script>";
                } 
                else if($user['role_id'] == 2){ // Regular User Login
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userName'] = $user['name'];
                    $_SESSION['userEmail'] = $user['email'];
                    $_SESSION['userRoleId'] = $user['role_id'];
                    echo "<script>location.assign('login.php?success=user login')</script>";
                }
            } else {
                $userPasswordErr = "Password does not match";
            }
        } else {
            $userEmailErr = "User not found";
        }
    }

    if(empty($userPassword)){
        $userPasswordErr = "Password is required";
    }
}
?>
