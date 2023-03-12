<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Éditer la table </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM partner WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                    <!-- Form start -->
                    <form action="code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="partner_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group">
                            <label>Salle</label>
                            <input type="text" name="partner_location" value="<?php echo $row['location'] ?>" class="form-control" placeholder="Entez votre email">
                        </div>
                        <div class="form-group">
                            <label>contact</label>
                            <input type="text" name="partner_contact" value="<?php echo $row['contact'] ?>" class="form-control" placeholder="Enterez votre mot de passe">
                        </div>
                        <div class="form-group">
                            <label>Poste</label>
                            <input type="text" name="partner_poste" value="<?php echo $row['poste'] ?>" class="form-control" placeholder="Enterez votre mot de passe">
                        </div>

                        <a href="partner.php" class="btn btn-danger">ANNULER</a>
                        <button type="submit" name="edit_partner" class="btn btn-primary">ÉDITER</button>
                    </form>
                    <!-- Form end -->
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