<?php
include('security.php');


/* ADD Administrateur / Register */
if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email déjà enregisté.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    } else {
        if ($password === $cpassword) {
            $query = "INSERT INTO register (`username`,`email`,`password`,`usertype`) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['status'] = "Administrateur ajouté";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Erreur ! l'Administrateur n'est pas ajouté";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "Le nouveau mot de passe et le mot de passe de confirmation ne correspondent pas";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
}

/* EDIT Button Administrator List  */

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Vos données sont éditées";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Erreur ! vos données ne sont pas éditées";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}

/* DELETE Button Administrator List */

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Vos données sont annulées";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}


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
        header('Location: reservation.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas ajoutées";
        header('Location: reservation.php');
    }
}

/* EDIT Reservations Clients */

if (isset($_POST['edit_reservation'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];
    $date = date('y-m-d', strtotime($_POST['edit_date']));
    $number = $_POST['edit_number'];
    $time = $_POST['edit_time'];
    $allergie = $_POST['edit_allergie'];
    $message = $_POST['edit_message'];


    $query = "UPDATE reservation SET name='$name', email='$email', phone='$phone', date='$date', number='$number', time='$time', allergie='$allergie', message='$message'  WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont enregistrées";
        header('Location: reservation.php');
    } else {
        $_SESSION['status'] = "Vos données ne sont pas enregistrées";
        header('Location: reservation.php');
    }
}

/* ANNULER Reservations Clients */
if(isset($_POST['delete_res_btn'])) 
{
    $id = $_POST['delete_res_id'];

    $query = "DELETE  FROM reservation WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) 
    {
        $_SESSION['success'] = "Vos données sont annulées";
        header('Location: reservation.php');
    } else 
    {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        header('Location: reservation.php');
    }
} 


/* ADD Partner employés List */
if (isset($_POST['save_partner'])) 
{
    $name = $_POST['partner_name'];
    $location = $_POST['partner_location'];
    $contact = $_POST['partner_contact'];
    $poste = $_POST['partner_poste'];
   

        $query = "INSERT INTO partner (`name`,`location`,`contact`,`poste`) VALUES ('$name','$location','$contact','$poste')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) 
        {   
            $_SESSION['success'] = "Vos données sont ajoutées";
            header('Location: partner.php');
        } else {
            $_SESSION['status'] = "Erreur ! Vos données ne sont pas ajoutées";
            header('Location: partner.php');
        }
}
/* EDIT Partner employés List  */

if (isset($_POST['edit_partner'])) 
{
    $id = $_POST['edit_id'];
    $name = $_POST['partner_name'];
    $location = $_POST['partner_location'];
    $contact = $_POST['partner_contact'];
    $poste = $_POST['partner_poste'];
  

    $query = "UPDATE partner SET name='$name', location='$location', contact='$contact', poste='$poste' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont enregistrées";
        header('Location: partner.php');
    } else {
        $_SESSION['status'] = "Vos données ne sont pas enregistrées";
        header('Location: partner.php');
    }
}

/* DELETE Partner employés List */

if (isset($_POST['delete_btn'])) 
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM partner WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Vos données sont annulées";
        header('Location: partner.php');
    }
    else 
    {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        header('Location: partner.php');
    }

}



/* LOGIN Page */

if (isset($_POST['login_btn'])) {
    $email_login = $_POST['emaill'];
    $password_login = $_POST['passwordd'];
    $crypt_password = password_hash($password_login, PASSWORD_DEFAULT);

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$crypt_password' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "Email ou Mot de passe invalide";
        header('Location: login.php');
    }
}



/* ADD commandes producteurs List */

if (isset($_POST['save_table'])) {
    $name = $_POST['table_name'];
    $description = $_POST['table_description'];
    $formule = $_POST['table_formule'];
    $statut = $_POST['table_statut'];

    $query = "INSERT INTO tables (`name`,`description`,`formule`,`statut`) VALUES ('$name','$description','$formule','$statut')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont ajoutées";
        header('Location: tables.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas ajoutées";
        header('Location: tables.php');
    }
}



/* EDIT Commandes producteurs List  */

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $description = $_POST['edit_description'];
    $formule = $_POST['edit_formule'];
    $statut = $_POST['edit_statut'];


    $query = "UPDATE tables SET name='$name', description='$description', formule='$formule', statut='$statut' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont enregistrées";
        header('Location: tables.php');
    } else {
        $_SESSION['status'] = "Vos données ne sont pas enregistrées";
        header('Location: tables.php');
    }
}


/* DELETE Commandes producteurs List */
if (isset($_POST['delete_btn'])) 
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM tables WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Vos données sont annulées";
        header('Location: tables.php');
    }
    else 
    {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        header('Location: tables.php');
    }

}

/* UPLOAD galerie Photos */

if(isset($_POST['save_gallery']))
{
    $name = $_POST['gallery_name'];
    $image = $_FILES['gallery_image']['name'];


    if(file_exists("uploads/".$_FILES["gallery_image"]["name"]))
    {
        $store = $_FILES["gallery_image"]["name"];
        $_SESSION['status'] = "Image déjà enregistrée. '.$store.'";
        header('Location: galerie.php');
    }
    else
    {
        $query = "INSERT INTO images (`title`,`image`) VALUES ('$name','$image')";
        $query_run = mysqli_query($connection, $query);
    
        if ($query_run) 
        {
    
            move_uploaded_file($_FILES["gallery_image"]["tmp_name"], "uploads/".$_FILES["gallery_image"]["name"]);
    
            $_SESSION['success'] = "Image ajoutée";
            header('Location: galerie.php');
        } else {
            $_SESSION['status'] = "Erreur ! image non téléchargée";
            header('Location: galerie.php');
        }
    }
}

/* ÉDITER galerie images */

if(isset($_POST['gallery_update_btn'])) 
{
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['gallery_name'];
    $edit_image = $_FILES['gallery_image']['name'];

    $facul_query = "SELECT * FROM images WHERE id='$edit_id'";
    $facul_query_run = mysqli_query($connection, $facul_query);

    foreach($facul_query_run as $fa_row)
    {
        // update with existing image
            
        if($edit_image == NULL)
        {
            $img_data = $fa_row['image'];
        }
        else 
        {
            // update with new image
            if($img_path = "uploads/". $fa_row['image'])
            {
                unlink($img_path);
                $img_data = $edit_image;
            }
             
        }
    }
    
    $query = "UPDATE images SET title='$edit_name', image='$img_data' WHERE id='$edit_id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        if ($edit_image == NULL) 
        {

             // update with existing image
            $_SESSION['success'] = "mise a jour image existante";
            header('Location: galerie.php');
             
        } 
        else 
        {
            // update new image
            move_uploaded_file($_FILES["gallery_image"]["tmp_name"], "uploads/" . $_FILES["gallery_image"]["name"]);
            $_SESSION['success'] = "Données éditées";
            header('Location: galerie.php');

        }
    }
    else
    {
        $_SESSION['status'] = "Erreur ! Les données ne sont pas éditées";
        header('Location: galerie.php');
    }
}

/* ANNULER  galerie images Liste */

if(isset($_POST['delete_gallery_btn'])) 
{
    $id = $_POST['delete_id'];
   
    $query = "DELETE FROM images WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont annulées";
        header('Location: galerie.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        header('Location: galerie.php');
    }

}







?>





