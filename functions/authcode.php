<?php
include('../config/dbcon.php');
include('myfunctions.php');

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);

    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($cpassword)) {
        redirect("../register.php","Please Fill in all Fields");
        exit();
    }

    // Check if email already exists
    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        redirect("../register.php","Email already Registered");
        exit();
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        redirect("../register.php","Passwords do not match");
        exit();
    }

    // Hash the password
    $hashed_password = md5($password);

    // Insert user data into the database
    $insert_query = "INSERT INTO users (name, email, phone, password, role_as) VALUES ('$name', '$email', '$phone', '$hashed_password', '$role_as')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
        redirect("../login.php","Registered successfully");
        exit();
    } else {
        redirect("../register.php","Sorry, something went wrong");
        exit();
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Validation
    if (empty($email) || empty($password)) {
        redirect("../login.php","Please fill in all fields");
        exit();
    }

    $login_query = "SELECT * FROM users WHERE email = '$email'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $user_data = mysqli_fetch_array($login_query_run);
        $stored_password = $user_data['password'];

        // Verify the password
        if (md5($password) === $stored_password) {
            $_SESSION['auth'] = true;

            $userid = $user_data['id'];
            $username = $user_data['name'];
            $useremail = $user_data['email'];
            $role_as = $user_data['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail
            ];
            $_SESSION['role_as'] = $role_as;

            if ($role_as == "admin") {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        }
    }

    // Invalid credentials
    redirect("../login.php","Invalid Credentials");
    exit();
}
?>