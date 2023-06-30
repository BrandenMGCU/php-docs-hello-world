<?php

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active">Register</a>
  <a href="Login.php">Login</a>
  <a href="Logout.php">Logout</a>
  <a href="DeleteME.php?id=1" onclick="return confirm('This will delete your account, ARE YOU SURE?!')">Delete My Account!</a>
  <div class="search-container">
    <form action="">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i>Search</button>
    </form>
  </div>
</div>

<div style="padding-left:16px">
</form>
            </nav>
        </header>
</div>
</body>
</html>




<?php
    require('/Applications/MAMP/htdocs/Activity1CST323/Activity1/Website/DB/DatabaseConnection.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($con, $firstname);

        $lastname = stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($con, $lastname);

        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "INSERT into `users` (firstname, lastname, username, password, email)
                     VALUES ('$firstname', '$lastname', '$username', '$password', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p>Your First Name is: <strong>$firstname</strong></p>
                  <p>Your Last Name is: <strong>$lastname</strong></p>
                  <p>Your Username is: <strong>$username</strong></p>
                  <p>Your Password is: <strong>$password</strong></p>
                  <p>Your Email is: <strong>$email</strong></p>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";

                  echo '"<h1>HTML Form That Opens Email Client </h1>

                  <form
                    action="https://formspree.io/f/xeqwbwwy"
                    method="POST"
                  >
                    <label>
                      Your email:
                      <input type="email" name="email">
                    </label>
                    <label>
                      Your message:
                      <textarea name="message"></textarea>
                    </label>
                    <!-- your other form fields go here -->
                    <button type="submit">Send</button>
                  </form>"';
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        First Name: <input type="text" class="login-input" name="firstname" placeholder="John" required />
        Last Name: <input type="text" class="login-input" name="lastname" placeholder="Doe" required />
        Username: <input type="text" class="login-input" name="username" placeholder="Username" required />
        Email: <input type="text" class="login-input" name="email" placeholder="Email Address">
        Password: <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>


?>