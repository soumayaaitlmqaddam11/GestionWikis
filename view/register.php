<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | CodingLab</title>
    <link rel="stylesheet" href="/assets/styles/registerstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form method="post" action="?route=register" onsubmit="return validateRegisterForm()">
            <div class="input-box">
                <input name="nom" type="text" id="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Create password" required>
            </div>
            <div class="policy">
                <input type="checkbox" id="termsCheckbox" required>
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="index.php?route=login">Login</a></h3>
            </div>
        </form>
    </div>

    <script>
        function validateRegisterForm() {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^[a-zA-Z0-9]{6,}$/;

            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var termsCheckbox = document.getElementById('termsCheckbox').checked;

            var errorMessage = '';

            if (username.trim() === '') {
                errorMessage += 'Username is required. ';
            }

            if (!emailRegex.test(email)) {
                errorMessage += 'Invalid email address. ';
            }

            if (!passwordRegex.test(password)) {
                errorMessage += 'Password must contain only letters and numbers, and be at least 6 characters long.';
            }

            if (!termsCheckbox) {
                errorMessage += 'You must accept the terms and conditions.';
            }

            if (errorMessage !== '') {
                alert(errorMessage); // You can also display the error message in a more user-friendly way
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
