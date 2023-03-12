<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Administrateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Form add admin start -->
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="username" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmer le mot de passe">
                    </div>
                </div>
                <!-- usertype !-->
                <input type="hidden" name="usertype" value="admin">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
            <!-- Form add admin end -->
        </div>
    </div>
</div>

<!-- container-fluid start-->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registre Administrateurs
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Ajouter un profil
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
                $query = "SELECT * FROM register";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Nom </th>
                            <th>Email </th>
                            <th>Type</th>
                            <th>ÉDITER</th>
                            <th>ANNULER</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['usertype']; ?></td>
                                    <!-- EDIT Button -->
                                    <td>
                                        <form action="register_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success">ÉDITER</button>
                                        </form>
                                    </td>
                                    <!-- DELETE Button -->
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
                            <li class="page-item"><a class="page-link" href="register.php">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>


    <!-- container-fluid end -->


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>