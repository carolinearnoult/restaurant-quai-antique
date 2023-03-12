<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>




<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="gallery_name" class="form-control" placeholder="Entrez un titre" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="gallery_image" id="gallery_image" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">FERMER</button>
                    <button type="submit" name="save_gallery" class="btn btn-primary">UPLOAD</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#galleryModal">
                    Ajouter une image
                </button>
            </h6>
        </div>

        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            }
            ?>

            <div class="table-responsive">

                <?php
                $query = "SELECT * FROM images";
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0) {
                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th>Titre</th>
                                <th>Images</th>
                                <th>EDIT </th>
                                <th>DELETE </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo '<img src="uploads/' . $row['image'] . '" width="400px;" height="300px;" alt="image">' ?></td>
                                    <td>
                                        <form action="galerie_edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="edit_data_btn" class="btn btn-success"> EDITER</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_gallery_btn" class="btn btn-danger"> ANNULER</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                <?php
                } else {
                    echo "Aucun enregistrement trouvé";
                }
                ?>
                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="galerie.php">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>