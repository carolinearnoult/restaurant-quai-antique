<?php

include('admin/security.php');
include('admin/database/config.php');


/* ADD Reservations Clients */

if (isset($_POST['save_reservation'])) {
    $name = $_POST['reservation_name'];
    $email = $_POST['reservation_email'];
    $phone = $_POST['reservation_phone'];
    $date = date('y-m-d', strtotime($_POST['reservation_date']));
    $number = $_POST['reservation_number'];
    $time = $_POST['reservation_time'];
    $allergie = $_POST['reservation_allergie'];
    $message = $_POST['reservation_message'];


    $query = "INSERT INTO reservation (name,email,phone,date,number,time,allergie,message) VALUES ('$name','$email','$phone','$date','$number','$time','$allergie','$message')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont ajoutées";
        header('Location: res.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas ajoutées";
        header('Location: res.php');
    }
}






?>



