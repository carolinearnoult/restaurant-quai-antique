<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'adminpanel');


$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Erreur connection </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Merci de vérifier votre Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

?>