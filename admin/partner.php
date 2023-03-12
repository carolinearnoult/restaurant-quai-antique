<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un partenaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="mutlipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="partner_name" class="form-control" placeholder="Enterez un nom" required>
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="partner_location" class="form-control" placeholder="Enterez une adresse" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="partner_contact" class="form-control" placeholder="Enterez un email" required>
                    </div>
                    <div class="form-group">
                        <label>Poste</label>
                        <input type="text" name="partner_poste" class="form-control" placeholder="Enterez un poste" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="save_partner" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employés
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#partnerModal">
                    Ajouter
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
                $query = "SELECT * FROM partner";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>nom</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Poste</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['location']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['poste']; ?></td>
                                    <td>
                                        <form action="partner_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success">ÉDITER</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_btn" class="btn btn-danger">ANNULER</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "Aucun enregistrement trouvé";
                        }
                        ?>

                    </tbody>
                </table>
                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="partner.php">1</a></li>
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