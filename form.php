<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$firstErr = $middleErr = $lastErr = $userErr = $genderErr = $passwordErr = $cpasswordErr ="";
$firstname = $middlename = $gender = $password = $lastname = $cpassword = $username ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["username"])) {
    $userErr = "Please enter your Username!";
  } else {
    $username = test_input($_POST["username"]);
    }

    if (empty($_POST["firstname"])) {
        $firstErr = "Please Enter First Name!";
      } else {
        $firstname = test_input($_POST["firstname"]);
        }
    if (empty($_POST["lastname"])) {
        $lastErr = "Please Enter Last Name!";
      } else {
        $lastname = test_input($_POST["lastname"]);
        }
    if (empty($_POST["middlename"])) {
        $middleErr = "Please Enter middle Name!";
      } else {
        $middlename = test_input($_POST["middlename"]);
        }
    if (empty($_POST["password"])) {
        $passwordErr = "Please Enter Password!";
      } else {
        $password = test_input($_POST["password"]);
        }
  if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Please Confirm Password!";
      } else {
        $cpassword = test_input($_POST["cpassword"]);
        }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['clear'])) {

    $firstname ="";
 
    $middlename ="";
 
    $lastname ="";
 
    $username ="";
 
    $password ="";
 
    $cpassword ="";
 
    $gender ="";

    $display ="";
    } 
?>

<h2>Registration Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="firstname">
  <span class="error">* <?php echo $firstErr;?></span>
  <br><br>
  Middle Name: <input type="text" name="middlename">
  <span class="error">* <?php echo $middleErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lastname">
  <span class="error">* <?php echo $lastErr;?></span>
  <br><br>
  <label name="gender"> Select your gender: </label>
                        <select name="gender">
                            <option value="gender">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">other</option>
                        </select>
  <br><br>
  Username: <input type="text" name="username">
  <span class="error">* <?php echo $userErr ;?></span>
  <br><br>
  Password: <input type="password" name="password" id="pass">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Confirm Password: <input type="password" id="cpass" name="cpassword">
  <span class="error">* <?php echo $cpasswordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
  &nbsp;&nbsp;&nbsp;
  <input type="submit" name="clear" value="Clear" />
</form>

<?php
echo $firstname;
echo "<br>";
echo $middlename;
echo "<br>";
echo $lastname;
echo "<br>";
echo $gender;
echo "<br>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $cpassword;
?>
<script>
  var password = document.getElementById("pass")
  , confirm_password = document.getElementById("cpass");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>