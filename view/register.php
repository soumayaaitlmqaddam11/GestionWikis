<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LRegistration or Sign Up form in HTML CSS | CodingLab</title>
    <link rel="stylesheet" href="/assets/styles/registerstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
<div class="wrapper">
    <h2>Registration</h2>
  <form method="post" action="?route=register">
    <div class="input-box">
    <input name="nom" type="text" placeholder="Enter your username" required>
    </div>
    <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
    </div>
    
    <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
    </div>
    <div class="input-box button">
        <input type="Submit" value="Register Now">
    </div>
    <div class="text">
        <h3>Already have an account? <a href="index.php?route=login">Login
        </div>
</body>
</html>