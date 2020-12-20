<html>
<style>

body {
  margin: 0;
  padding: 0;
  background:url(up.jpg) no-repeat center;
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
  <h1>Sign IN</h1>
  <form action="" method="post">
    <div class="inputBox">
      <input type="text" name="user" required value="">
      <label>Username</label>
    </div>
    <div class="inputBox">
      <input type="password" name="pass" required value="">
      <label>Password</label>
    </div><p style="text-align:right"><font color="white"><a href="forgot.html">&nbspForgot Password?</a></font></p>
    <center><input type="submit" name="submit" value="LOGIN"></center>
  </form>
<p style="text-align:center"><font color="white">New User?<a href="register.php">&nbspCreate Account</a></font></p>
</div>
</html>
<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
//DB Connection
$conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
//Select DB From database
$db = mysqli_select_db($conn, 'exam') or die("database error");
//Selecting database
$query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' AND pass='".$pass."'");
$numrows = mysqli_num_rows($query);
if($numrows !=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbusername=$row['user'];
$dbpassword=$row['pass'];
}
if($user == $dbusername && $pass == $dbpassword)
{
session_start();
$_SESSION['sess_user']=$user;
//Redirect Browser
header("Location:home.html");
}
}
else
{
$message ="Invalid Username or Password!" ;
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
else
{
echo "Required All fields!";
}
}
?>
