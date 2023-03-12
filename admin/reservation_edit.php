<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Éditer la réservation </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM reservation WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                    <form action="code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Entrez un nom">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Entrez un Email">
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="edit_phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Entrez un numéro de téléphone">
                        </div>
                        <div class="form-group">
                            <label>Date de réservation</label>
                            <input type="date" name="edit_date" value="<?php echo $row['date'] ?>" class="form-control" placeholder="Sélectionnez une date">
                        </div>
                        <div class="form-group">
                            <label>Nombre de couverts</label>
                            <input type="number" name="edit_number" value="<?php echo $row['number'] ?>" class="form-control" placeholder="Statue">
                        </div>
                        <div class="form-group">
                            <label>Horaire de votre réservation</label>
                            <select name="edit_time" value="<?php echo $row['time'] ?>" class="form-control">
                                <option value="midi">12:00 - 14:00</option>
                                <option value="soir">19:00 - 22:00</option>
                                <option value="samedi">19:00 - 23:00 (samedi)</option>
                                <option value="dimanche">12:00 - 14:00 (dimanche)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merci de nous indiquez vos allergies alimentaires</label>
                            <input type="text" name="edit_allergie" value="<?php echo $row['allergie'] ?>" class="form-control" placeholder="Mes allergies">
                        </div>
                        <div class="form-group">
                            <label>Message </label>
                            <input type="text" name="edit_message" value="<?php echo $row['message'] ?>" class="form-control" placeholder="Message">
                        </div>

                        <a href="reservation.php" class="btn btn-danger">ANNULER</a>
                        <button type="submit" name="edit_reservation" class="btn btn-primary">ÉDITER</button>
                    </form>
            <?php

                }
            } else {
                echo "Aucun enregistrement trouvé";
            }
            ?>

        </div>
    </div>
</div>

</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>