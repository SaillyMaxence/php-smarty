<!DOCTYPE html>
<html lang="fr">


<body id="page-top" class="index">

<?php include("includes/haut.inc.php"); ?>

    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">              
                <form action="message.php" method="POST">
                    <div class="col-sm-10">  
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </div>                        
                </form>
            </div>


            <div class="row">
            <?php 

                include("includes/connexion.inc.php");
                $query="SELECT * FROM messages";
                $stmt=$pdo->query($query);
                while($data=$stmt->fetch()){
                    echo "<blockquote><p>".$data['contenu']."</p></blockquote>";
                     echo $data['date'];
                }
            ?>
                </div>
            </div>
        </div>
    </section>

<?php include("includes/bas.inc.php"); ?>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
