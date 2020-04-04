<main>
    <div class="header-login">
        <?php
        if(!isset($_SESSION['id'])){
            echo '<form action="login.php" method="post">
            <button type="submit" name="login-submit">Login</button>
            </form>
            <a href="new_reg.php">Signup</a>';
        }
        elseif (isset($_SESSION['id'])){
            echo '<form action="phps/logout.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                    </form>';
        }
        ?>
    </div>
</main>
