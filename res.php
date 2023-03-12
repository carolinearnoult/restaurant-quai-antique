<?
include('admin/security.php');
include('admin/database/config.php');
include('include/header.php');

?>


<body class="bg-light">


    <div class="container container-contact">

        <!-- Extérieur -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Dans la card-->
                        <div class="row">

                            <div class="col-lg-12 col-md-9">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Réservation</h1>
                                        <h2 class="h5 text-gray-900  mb-4">Le Quai Antique</h2>

                                    </div>

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

                                    <form action="reservation_code.php" method="POST">

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
                                            <a class="links links-blog " href="index.php">Retourner sur la page d'accueil</a>
                                            <button type="submit" name="save_reservation" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<?php
include('includes/scripts.php');

?>

</html>