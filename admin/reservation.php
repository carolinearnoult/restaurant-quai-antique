<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Réserver une table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="reservation_name" class="form-control" placeholder="Entrez un nom">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="reservation_email" class="form-control" placeholder="Entrez un Email">
                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="reservation_phone" class="form-control" placeholder="Entrez un numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <label>Date de réservation</label>
                        <input type="date" name="reservation_date" class="form-control" placeholder="Sélectionnez une date">
                    </div>
                    <div class="form-group">
                        <label>Nombre de couverts</label>
                        <input type="number" name="reservation_number" class="form-control" placeholder="Statue">
                    </div>
                    <div class="form-group">
                        <label>Horaire de votre réservation</label>
                        <select name="reservation_time" class="form-control">
                            <option value="midi">12:00 - 14:00</option>
                            <option value="soir">19:00 - 22:00</option>
                            <option value="samedi">19:00 - 23:00 (samedi)</option>
                            <option value="dimanche">12:00 - 14:00 (dimanche)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Merci de nous indiquez vos allergies alimentaires</label>
                        <input type="text" name="reservation_allergie" class="form-control" placeholder="Mes allergies">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <input type="text" name="reservation_message" class="form-control" placeholder="Message">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_reservation" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Réservations
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reservationModal">
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
                $query = "SELECT * FROM reservation";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>Nom</th>
                            <th>Email </th>
                            <th>Téléphone</th>
                            <th>Date</th>
                            <th>Nbr Couverts</th>
                            <th>Horaire</th>
                            <th>Allergies</th>
                            <th>Message</th>
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
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td>
                                        <center><?php echo $row['number']; ?></center>
                                    </td>
                                    <td><?php echo $row['time']; ?></td>
                                    <td><?php echo $row['allergie']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td>
                                        <form action="reservation_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> ÉDITER</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_res_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_res_btn" class="btn btn-danger">ANNULER</button>
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
                            <li class="page-item"><a class="page-link" href="reservation.php">1</a></li>
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