<?php
    require "header.php";
?>

    <main>
        <div class="container">
            <section align="center">
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
    require "footer.php";
?>