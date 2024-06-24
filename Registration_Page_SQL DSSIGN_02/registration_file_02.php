<?php
/*
MIT License
Copyright (c) 2019 Fernando 
https://github.com/fernandod1/
*/

// Configure your MySQL database connection details:
$mysqlserverhost = "localhost";
$database_name = "Registration_Page_DESIGN_02";
$username_mysql = "root";
$password_mysql = "";

function sanitize($variable){
    $clean_variable = strip_tags($variable);
    $clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
    return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
    $connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    if (!$connect) {
        die("Connection failed mysql: " . mysqli_connect_error());
    }
    return $connect;    
}

if(isset($_POST["processform"])){
    $connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    $first_name = mysqli_real_escape_string($connection, sanitize($_POST["first_name"]));
    $last_name = mysqli_real_escape_string($connection, sanitize($_POST["last_name"]));
    $address1 = mysqli_real_escape_string($connection, sanitize($_POST["address1"]));
    $address2 = mysqli_real_escape_string($connection, sanitize($_POST["address2"]));
    $city = mysqli_real_escape_string($connection, sanitize($_POST["city"]));
    $state = mysqli_real_escape_string($connection, sanitize($_POST["state"]));
    $postal_code = mysqli_real_escape_string($connection, sanitize($_POST["postal_code"]));    
    $phone = mysqli_real_escape_string($connection, sanitize($_POST["phone"]));
    $email = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
    $reference = mysqli_real_escape_string($connection, sanitize($_POST["reference"]));
    $feedback = mysqli_real_escape_string($connection, sanitize($_POST["feedback"]));
    $suggestions = mysqli_real_escape_string($connection, sanitize($_POST["suggestions"]));
    $recommend = mysqli_real_escape_string($connection, sanitize($_POST["recommend"]));
    $reference1_name = mysqli_real_escape_string($connection, sanitize($_POST["reference1_name"]));
    $reference1_address = mysqli_real_escape_string($connection, sanitize($_POST["reference1_address"]));
    $reference1_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference1_contact"]));
    $reference2_name = mysqli_real_escape_string($connection, sanitize($_POST["reference2_name"]));
    $reference2_address = mysqli_real_escape_string($connection, sanitize($_POST["reference2_address"]));
    $reference2_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference2_contact"]));
  
    $sql = "INSERT INTO signup_registrationform02 (
        First_Name,
        Last_Name,
        Address1, 
        Address2,
        City,
        State,
        Postal_Code,
        Phone_No,
        Email_Address,
        Reference,
        Feedback,
        Suggestions,
        Recommend,
        Reference1_Name,
        Reference1_Address,
        Reference1_Contact,
        Reference2_Name,
        Reference2_Address,
        Reference2_Contact
        ) 
      VALUES (
        '$first_name',
        '$last_name',
        '$address1',
        '$address2',
        '$city' ,
        '$state' ,
        '$postal_code',
        '$phone',
        '$email',
        '$reference',
        '$feedback',
        '$suggestions',
        '$recommend',
        '$reference1_name',
        '$reference1_address',
        '$reference1_contact',
        '$reference2_name',
        '$reference2_address',
        '$reference2_contact'
        )";

    if (mysqli_query($connection, $sql)) {
        echo "<h2><font color=blue>New record added to database.</font></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Registration</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  /* user-select: none; */
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  height: 100%;
}
body{
  display: grid;
  place-items: center;
  background: #dde1e7;
  text-align: center;
}
.content{
  width: 330px;
  padding: 40px 30px;
  background: #dde1e7;
  border-radius: 10px;
  box-shadow: -3px -3px 7px #ffffff73,
               2px 2px 5px rgba(94,104,121,0.288);
}
.content .text{
  font-size: 33px;
  font-weight: 600;
  margin-bottom: 35px;
  color: #595959;
}
.field{
  height: 50px;
  width: 100%;
  display: flex;
  position: relative;
}
.field:nth-child(2){
  margin-top: 20px;
}
.field input{
  height: 100%;
  width: 100%;
  padding-left: 45px;
  outline: none;
  border: none;
  font-size: 18px;
  background: #dde1e7;
  color: #595959;
  border-radius: 25px;
  box-shadow: inset 2px 2px 5px #BABECC,
              inset -5px -5px 10px #ffffff73;
}
.field input:focus{
  box-shadow: inset 1px 1px 2px #BABECC,
              inset -1px -1px 2px #ffffff73;
}
.field span{
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 50px;
}
.field label{
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 45px;
  pointer-events: none;
  color: #666666;
}
.field input:valid ~ label{
  opacity: 0;
}
.forgot-pass{
  text-align: left;
  margin: 10px 0 10px 5px;
}
.forgot-pass a{
  font-size: 16px;
  color: #3498db;
  text-decoration: none;
}
.forgot-pass:hover a{
  text-decoration: underline;
}
button{
  margin: 15px 0;
  width: 100%;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  font-weight: 600;
  background: #dde1e7;
  border-radius: 25px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #595959;
  box-shadow: 2px 2px 5px #BABECC,
             -5px -5px 10px #ffffff73;
}
button:focus{
  color: #3498db;
  box-shadow: inset 2px 2px 5px #BABECC,
             inset -5px -5px 10px #ffffff73;
}
.login-now{
  margin: 10px 0;
  color: #595959;
  font-size: 16px;
}
.login-now a{
  color: #3498db;
  text-decoration: none;
}
.login-now a:hover{
  text-decoration: underline;
}
</style>
<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["first_name"].value;
    var b = document.forms["Form"]["last_name"].value;
    var c = document.forms["Form"]["address1"].value;
    var d = document.forms["Form"]["address2"].value;
    var e = document.forms["Form"]["city"].value;
    var f = document.forms["Form"]["state"].value;
    var g = document.forms["Form"]["postal_code"].value;
    var h =document.forms["Form"]["phone"].value;
    var i =document.forms["Form"]["email"].value;
    var j =document.forms["Form"]["reference"].value;
    var k =document.forms["Form"]["feedback"].value;
    var l =document.forms["Form"]["suggestions"].value;
    var m =document.forms["Form"]["recommend"].value;
    var n =document.forms["Form"]["reference1_name"].value;
    var o =document.forms["Form"]["reference1_address"].value;
    var p =document.forms["Form"]["reference1_contact"].value;
    var q =document.forms["Form"]["reference2_name"].value;
    var r =document.forms["Form"]["reference2_address"].value;
    var s =document.forms["Form"]["reference2_contact"].value;

if (
a == null || a == "",
b == null || b == "",
c == null || c == "", 
d == null || d == "",
e == null || e == "",
f == null || f == "",
g == null || g == "",
h == null || h == "",
i == null || i == "",
j == null || j == "",
k == null || k == "",
l == null || l == "",
m == null || m == "",
n == null || n == "",
o == null || o == "",
p == null || p == "",
q == null || q == "",
r == null || r == "",
s == null || s == ""
)
    {
        alert("Please Fill All Required Field");    
        return false;
    }
}
</script>
</head>
<body>
    <div class="content">
        <div class="text">
            Sign Up
        </div>
        <form action="registration_file_02.php" method="post" name="Form" onsubmit="return validateForm()">
        <input type="hidden" name="processform" value="1">    
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="first_name"></label>
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="last_name"></label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details personal">
                <span class="title">Address</span>
                <div class="field">
                    <div class="input-field" style="padding: 1%">
                        <label for="address1"></label>
                        <input type="text" id="address1" name="address1" placeholder="Street Address" required>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field" style="padding: 1%">
                        <span class="fas fa-user"></span>
                        <label for="address2"></label>
                        <input type="text" id="address2" name="address2" placeholder="Street Address Line 2">
                    </div>
                </div>
            </div>

                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="city"></label>
                            <input type="text" id="city" name="city" placeholder="City" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="state"></label>
                            <input type="text" id="state" name="state" placeholder="State / Province" required>
                        </div>
                </div>

                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="postal_code"></label>
                            <input type="text" id="postal_code" name="postal_code" placeholder="Postal / Zip Code" required>
                        </div>
                </div>
                
            <div class="details personal">
                <span class="title">Contacts</span>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="phone"></label>
                            <input type="tel" id="phone" name="phone" placeholder="(000) 000-0000" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="email"></label>
                            <input type="email" id="email" name="email" placeholder="example@example.com" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="reference"></label>
                            <input type="text" id="reference" name="reference" placeholder="Reference" required>
                        </div>
                </div>
            </div>
            <div class="details personal">
                <span class="title">Feedback Section</span>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="feedback"></label>
                            <textarea id="feedback" name="feedback" placeholder="Your Feedback" required></textarea>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="suggestions"></label>
                            <textarea id="suggestions" name="suggestions" placeholder="Your Suggestions" required></textarea>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style = "padding: 1%;">
                            <label for="recommend"></label>
                            <textarea id="recommend" name="recommend" placeholder="Your Recommendations" required></textarea>
                        </div>
                </div>
            </div>
            <div class="details personal">
                <span class="title">References</span>
                <div class="field">
                        <div class="input-field" style = "padding: 1%;">
                            <label for="reference1_name"></label>
                            <input type="text" id="reference1_name" name="reference1_name" placeholder="Reference 1 Name" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style = "padding: 1%;">
                            <label for="reference1_address"></label>
                            <input type="text" id="reference1_address" name="reference1_address" placeholder="Reference 1 Address" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="reference1_contact"></label>
                            <input type="tel" id="reference1_contact" name="reference1_contact" placeholder="Reference 1 Contact" required>
                        </div>
                </div>
            </div>
            <div class="details personal">
                <span class="title">References</span>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="reference2_name"></label>
                            <input type="text" id="reference2_name" name="reference2_name" placeholder="Reference 2 Name" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="reference2_address"></label>
                            <input type="text" id="reference2_address" name="reference2_address" placeholder="Reference 2 Address" required>
                        </div>
                </div>
                <div class="field">
                        <div class="input-field" style="padding: 1%">
                            <label for="reference2_contact"></label>
                            <input type="tel" id="reference2_contact" name="reference2_contact" placeholder="Reference 2 Contact" required>
                        </div>
                </div>
            </div>
            <!-- <button>Register</button> -->
            <!-- <input class="button" type="submit" value="Submit"> -->
             
            <button class="submit" type="submit" value="Submit">
                <span class="fas fa-user">Submit Registration</span>
            </button>
            <div class="login-now">
                <a href="#">Login now</a>
            </div>
        </form>
    </div>
</body>



</html>


