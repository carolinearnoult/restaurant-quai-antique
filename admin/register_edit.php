<?php

include('includes/header.php');
include('includes/navbar.php');
include('security.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Profil Administrateur </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM register WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                    <!-- Form start -->
                    <form action="code.php" method="POST" >
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> Nom utilisateur </label>
                            <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Entez votre email">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enterez votre mot de passe">
                        </div>
                        <!-- Form usertype selection -->
                        <div class="form-group">
                            <label>Type</label>
                            <select name="update_usertype" class="form-control">
                                <option value="admin"> Administrateur </option>
                                <option value="user"> Équipe </option>
                                <option value="partner"> Partenaire </option>
                                <option value="franchise"> Franchise </option>
                            </select>
                        </div>
                        <a href="register.php" class="btn btn-danger">ANNULER</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary">ÉDITER</button>
                    </form>
                    <!-- Form end -->
            <?php
                }
            } else {
                echo "Aucun enregistrement trouvé";
            }
            ?>
        </div>
    </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>