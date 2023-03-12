<?php

session_start();

include('includes/header.php');
include('database/config.php');

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
                                            <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                            <?php
                                            if (isset($_SESSION['status']) && $_SESSION['status'] != '') 
                                            {
                                                echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                                                unset($_SESSION['status']);
                                            }
                                            ?>
                                        </div>
                                    <!-- Login Button -->    
                                        <form class="user" action="logincode.php" method="POST">
                                            <div class="form-group">
                                                <input type="email" name="emaill" class="form-control form-control-user" placeholder="Entrez votre email...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Mot de passe">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">  Se souvenir de moi</label>
                                                </div>
                                            </div>
                                            <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                                                       
                                        </form>
                                        <hr>
                                    <!-- Création Compte / Mot de passe oublié -->
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.php">Mot de passe oublié?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="signup.php">Créer un compte!</a>
                                        </div>
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
    ?>