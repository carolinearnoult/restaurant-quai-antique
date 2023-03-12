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

                $query = "SELECT * FROM tables WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>

                    <!-- Form start -->
                    <form action="code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> Titre </label>
                            <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Entez votre email">
                        </div>
                        <div class="form-group">
                            <label>Formule</label>
                            <input type="text" name="edit_formule" value="<?php echo $row['formule'] ?>" class="form-control" placeholder="Enterez votre mot de passe">
                        </div>
                        <div class="form-group">
                            <label>Statut</label>
                            <input type="number" name="edit_statut" value="<?php echo $row['statut'] ?>" class="form-control" placeholder="Enterez votre mot de passe">
                        </div>
                        <!-- Form usertype selection -->

                        <a href="tables.php" class="btn btn-danger">ANNULER</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary">ÉDITER</button>
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