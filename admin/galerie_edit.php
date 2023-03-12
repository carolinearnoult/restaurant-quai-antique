<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Éditer l'image</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if (isset($_POST['edit_data_btn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM images WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $row) {
        ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="gallery_name" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Entrez un titre" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="gallery_image" value="<?php echo $row['image']; ?>" id="gallery_image" required>
                    </div>
                    <div class="modal-footer">
                        <a href="galerie.php" class="btn btn-danger">ANNULER</a>
                        <button type="submit" name="gallery_update_btn" class="btn btn-primary">ÉDITER</button>
                    </div>
                </form>
        <?php

            }
        }


        ?>

    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>