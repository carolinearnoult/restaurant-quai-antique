<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="table_name" class="form-control" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="table_description" class="form-control" placeholder="Entez une description">
                    </div>
                    <div class="form-group">
                        <label>Qte</label>
                        <input type="text" name="table_formule" class="form-control" placeholder="Sélectionnez votre formule">
                    </div>
                    <div class="form-group">
                        <label>Statut</label>
                        <input type="number" name="table_statut" class="form-control" placeholder="Statue">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_table" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Commandes producteurs
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tableModal">
                    Ajouter
                </button>
            </h6>
        </div>

        <div class="card-body">
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
                    $query = "SELECT * FROM tables";
                    $query_run = mysqli_query($connection, $query);
                    ?>


                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Qte</th>
                                <th>Statut</th>
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
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['formule']; ?></td>
                                        <td>
                                            <center>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" value="1" id="toggle">
                                                    <label class="custom-control-label" for="customSwitch1"></label>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <form action="tables_edit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-success"> ÉDITER</button>
                                                </form>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <form action="code.php" method="post">
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="delete_btn" class="btn btn-danger"> ANNULER</button>
                                                </form>
                                            </center>

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
                                <li class="page-item"><a class="page-link" href="tables.php">1</a></li>
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