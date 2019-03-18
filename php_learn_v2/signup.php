<?php
    require "header.php";
?>

    <main>
        <div class="container">
            <section align="center">
                <br>
                <h1>Signup</h1>
                <?php  
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "emptyfields"){
                            echo '<p style="color:red">Fill in all fields!</p>';
                        } else if($_GET['error'] == "invaliduidemail"){
                            echo '<p style="color:red">Invalid username and email!</p>';
                        } else if($_GET['error'] == "invaliduid"){
                            echo '<p style="color:red">Invalid username!</p>';
                        } else if($_GET['error'] == "invalidmail"){
                            echo '<p style="color:red">Invalid e-mail!</p>';
                        } else if($_GET['error'] == "passwordCheck"){
                            echo '<p style="color:red">Your passwords do not match!</p>';
                        } else if($_GET['error'] == "usertaken"){
                            echo '<p style="color:red">Username is already taken!</p>';
                        }
                    } else if($_GET['signup'] == "success"){
                        echo '<p style="color:green">Signup successfull!</p>';
                    } else {
                        echo '';
                    }
                ?>
                <br>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <br><br>
                    <input type="text" name="mail" placeholder="E-mail">
                    <br><br>
                    <input type="password" name="pwd" placeholder="Password">
                    <br><br>
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">
                    <br><br>
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>