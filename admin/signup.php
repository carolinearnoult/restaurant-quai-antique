<?php

include('security.php');
include('includes/header.php');

?>

<div class="container">

    <body class="bg-light">

        <div class="container">

            <!-- Extérieur -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Dans la card-->
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Je m'inscris</h1>
                                            <?php
                                            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                                echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                                                unset($_SESSION['status']);
                                            }
                                            ?>
                                        </div>
                                        <!-- FORM-->
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

                                            <input type="hidden" name="usertype" value="admin">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" name="registerbtn" class="btn btn-primary">Enregistrer</button>
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
    </body>
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>