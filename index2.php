<?php
    require 'header.php';
?>

<main>
    <div>
        <section align="center">
          <br>
            <?php
                if(isset($_SESSION['userId'])){ //if user session is started/logged in
                    echo '<p>You are logged in!</p>';
                } else {
                    echo '<p>You are logged out!</p>';
                }
            ?>      
    </div>
</main>

<?php
    require 'footer.php';
?>