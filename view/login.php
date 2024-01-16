<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link rel="stylesheet" href="/assets/styles/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <h1></h1>
            <form method="post" action="" onsubmit="return validateLoginForm()">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" id="email" name="email" placeholder="Email or Phone" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" name="submit" value="Login">
                </div>
                <span id="error-message" style="color:red;"></span>
                <div class="signup-link">Not a member? <a href="index.php?route=register">Signup now</a></div>
            </form>
        </div>
    </div>

    <script>
        function validateLoginForm() {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^[a-zA-Z0-9]{6,}$/;

            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            var errorMessage = '';

            if (!emailRegex.test(email)) {
                errorMessage += 'Invalid email address. ';
            }

            if (!passwordRegex.test(password)) {
                errorMessage += 'Password must contain only letters and numbers, and be at least 6 characters long.';
            }

            if (errorMessage !== '') {
                document.getElementById('error-message').innerText = errorMessage;
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
