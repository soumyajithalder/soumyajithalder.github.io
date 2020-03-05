<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account of LogIn</title>
    <link rel="stylesheet" type="text/css" href="../css/signlog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form enctype="multipart/form-data" method="post" >
                <h1>Register</h1>
                <input class="input" type="text" name="fullname" placeholder="Full Name" required>
                <input class="input" type="text" name="username" placeholder="Username" required>
                <input class="input" type="password" name="password" placeholder="Password" required>
                <input class="btn" type="submit" name="signup-submit" value="Create Account">
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form enctype="multipart/form-data" method="post">
               <h1>Sign In</h1>
                <input class="input" type="text" name="username" placeholder="Username" required>
                <input class="input" type="password" name="password" placeholder="Password" required>
                <input class="btn" type="submit" name="login-submit" value="Log In">
                <?php if (isset($_SESSION['login'])) {?>
                  <p><?php echo $err?></p>
                <?php }?>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already Registered!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="btn ghost" id="signIn">Sign In</button></a>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>New To The Site? Register Now</h1>
                    <p>Enter details and start with your first Blog</p>
                    <button class="btn ghost" id="signUp">Sign Up</button>
                    <?php
                    if (isset($_SESSION['signup'])&&($_SESSION['signup'] == 1)) {?>
                        <div><p>Signed Up Successfully. Please LogIn.</p></div>
                    <?php }
                    elseif (isset($_SESSION['signup'])&&($_SESSION['signup'] == 0)) { ?>
                        <div><p>User already exists. Please LogIn</p></div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");

        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>
