<html>
<style>

body {
  margin: 0;
  padding: 0;
  background:url(2.jpg) no-repeat center;
  background-size: 1400px 800px;
  font-family: sans-serif;
}

.box {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 25rem;
  padding: 2.5rem;
  box-sizing: border-box;
  background: rgba(0, 0, 0, 0.6);
  border-radius: 0.625rem;
}

.box h1 {
  margin: 0 0 1.875rem;
  padding: 0;
  color: #fff;
  text-align: center;
}

.box .inputBox {
  position: relative;
}

.box .inputBox input {
  width: 100%;
  padding: 0.625rem 0;
  font-size: 1rem;
  color: #fff;
  letter-spacing: 0.062rem;
  margin-bottom: 1.875rem;
  border: none;
  border-bottom: 0.065rem solid #fff;
  outline: none;
  background: transparent;
}

.box .inputBox label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 0.625rem 0;
  font-size: 1rem;
  color: #fff;
  pointer-events: none;
  transition: 0.5s;
}

.box .inputBox input:focus ~ label,
.box .inputBox input:valid ~ label,
.box .inputBox input:not([value=""]) ~ label {
  top: -1.125rem;
  left: 0;
  color: #03a9f4;
  font-size: 0.75rem;
}

.box input[type="submit"] {
  border: none;
  outline: none;
  color: #fff;
  background-color: #03a9f4;
  padding: 0.625rem 1.25rem;
  cursor: pointer;
  border-radius: 0.312rem;
  font-size: 1rem;
}

.box input[type="submit"]:hover {
  background-color: #1cb1f5;
}
 a { color: #ffffff; }
</style>

  <div class="box">
  <h1>Sign Up</h1>
  <form action="" method="post">
    <div class="inputBox">
      <input type="text" name="user" required value="">
      <label>Username</label>
    </div>
     <div class="inputBox">
      <input type="number" name="phn" required value="">
      <label>Phone Number</label>
    </div>
    <div class="inputBox">
      <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" value="">
      <label>Email</label>
    </div>
    <div class="inputBox">
      <input type="password" name="pass" required value=""
             onkeyup="this.setAttribute('value', this.value);"
             pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      <label>Password</label>
    </div>
    <center><input type="submit" name="submit" value="Create Account"></center>
  </form>
<p style="text-align:right"><font color="white">Have an account?<a href="login.php">&nbspLogin</a></font></p>
</div>
</html>
<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
$db = mysqli_select_db($conn, 'exam') or die("DB Error"); // Select DB from database
//Selecting Database
$query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."'");
$numrows = mysqli_num_rows($query);
if($numrows == 0)
{
//Insert to Mysqli Query
$sql = "INSERT INTO userpass(user,pass) VALUES('$user','$pass')";
$result = mysqli_query($conn, $sql);
//Result Message
if($result){
$message = "Your Account Created Successfully.Go back to login and login to your account";
echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
echo "Failure!";
}
}
else
{
$message = "Username already exists";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
else
{
?>
<!--Javascript Alert -->
<script>alert('Required all felds');</script>
<?php
}
}
?>
