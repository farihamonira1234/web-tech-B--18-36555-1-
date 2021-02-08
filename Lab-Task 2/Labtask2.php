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
$nameErr = $emailErr = $genderErr = $dobErr= $bloodgroupErr = $degreeErr= "";
$name = $email = $gender = $dob= $bloodgroup= $degree= "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
  if (empty($_POST["degree"])) {
    $degreeErr = "degree is required";
  } 
  else {
    $degree = test_input($_POST["degree"]);
  }
 
 if (empty($_POST["dob"])) {
    $dobErr = "dob is required";
  } 
  else {
    $dob = test_input($_POST["dob"]);
  }
  if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "bloodgroup is required";
  } 
  else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }

  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <fieldset> <legend> Name: </legend> 
   <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  </fieldset>
  <br><br>
  
  <fieldset><legend>E-mail: </legend> 
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></fieldset>
  <br><br>

<fieldset><legend>Date Of Birth</legend>
   <input type="date" id="dob" name="dob" value="<?php echo $dob;?>">
  <span class="error">* <?php echo $dobErr;?></span><br>
  </fieldset>
  <br>





  
  <fieldset><legend>Gender:</legend>  
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
</fieldset>

<fieldset><legend>Degree:</legend>   
    <input type="checkbox" name="degree"   <?php if (isset($degree) && $degree=="cse") echo "checked";?> 
    value="cse">cse
    <input type="checkbox" name="degree"    <?php if (isset($degree) && $degree=="eee") echo "checked";?> 
    value="eee">eee
    <input type="checkbox" name="degree"    <?php if (isset($degree) && $degree=="ssc") echo "checked";?> 
    value="ssc">ssc
    <input type="checkbox" name="degree"   <?php if (isset($degree) && $degree=="hsc") echo "checked";?>
    value="hsc">hsc 
    <span class="error">* <?php echo $degreeErr;?></span>
    <br><br>
    </fieldset>
  


  <fieldset><legend>BloodGroup</legend>
    <select name="bloodgroup">
    <option name="A" <?php if (isset($bloodgroup) && $bloodgroup=="A") echo "checked";?>
      value="A+">A</option>
    <option name="B"<?php if (isset($bloodgroup) && $bloodgroup=="B") echo "checked";?>
      value="B+">B</option>
    <option name="AB+"<?php if (isset($bloodgroup) && $bloodgroup=="AB") echo "checked";?>
      value="AB+">AB</option>
    <span class="error">* <?php echo $bloodgroupErr;?></span>
    <br><br>
   </select><br>
   </fieldset>









  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bloodgroup;
echo "<br>";
?>

</body>
</html>