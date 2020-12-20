<html>
	<head>
		<title> student details</title>
		<style>
                       table,th,td
			{
			border: 1px solid white;
  border-collapse: collapse;
			width:600px;
			font-size:22px;
			text-align:center;
                        color:white;
			
			}
			
			.container
			{
			width:500px;
			position:absolute;
			top: 120%;
  left: 50%;
			transform:translate(-50%,-50%);
			}
.box {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 25rem;
  padding: 2.5rem;
  box-sizing: border-box;
   background: rgba(0, 0, 0, 0);
  border-radius: 0.625rem;
 display:inline-block;
}
.box .inputBox {
  position: relative;
}

.box .inputBox input {
  width: 100%;
  padding: 0.625rem 0;
  font-size: 1rem;
  color: white;
  letter-spacing: 0.062rem;
  margin-bottom: 1.875rem;
  border: none;
  border-bottom: 0.065rem solid white;
  outline: none;
  background: transparent;
}

.box .inputBox label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 0.625rem 0;
  font-size: 1rem;
  color:white;
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
body{
background: url(pattern.jpg);
color:white;
}
   a{
color:white;
text-decoration:none;
}

button {
  background: none;
  border: 2px solid orange;
  font: inherit;
  line-height: 1;
  margin: 0.5em;
  padding: 1em 2em;
}
.raise:hover,
.raise:focus {
  box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
  -webkit-transform: translateY(-0.25em);
          transform: translateY(-0.25em);
}
.raise {
  --color: white;
  --hover: white;
}

button {
  color: var(--color);
  transition: 0.25s;
}
button:hover, button:focus {
  border-color: var(--hover);
  color: #fff;
}
 *{
	   	padding: 0px;
	   	margin:0px;
	   	box-sizing: border-box;
	   }

	   .header{
	   	 width: 100%;
	   	 height: 100%;
	   	 
	   	 

	   }

	   .navbar{
	   	width: 100%;
	   	padding: 20px;
	   	position: fixed;
	   	top: 0px;
	   	text-align: center;
	   	transition: .5s;
	   }

	   .navbar ul li{
	   	list-style-type: none;
	   	display:inline-block;
	   	padding: 10px 50px;
	   	color: white;
	   	font-size: 20px;
	   	font-family: sans-serif;
	   	cursor: pointer;
	   	border-radius:10px;
	   	transition: .5s;
	   }
th{text-align: center;
     font-size:30px;}

.inline-block {
    display: inline-block
    
}
		</style>
	</head>
	<body>
<div class="header">
	 
	 <div class="navbar" id='nav'>

       <ul>
   <div class="buttons">
  
  <li><button class="raise"><a href="home.html"><b>Home</b></a></button></li>
  
  <li><button class="raise"><a href="feedback.html"><b>Feedback</b></a></button></li>
  <li><button class="raise"><a href="history.php"><b>History</b></a></button></li>
  <li><button class="raise"><a href="logout.php"><b>Logout</b></a></button></li>
</div>
       </ul>

	 </div><br><br><br><br><br><br><br><br><br><br>
<div class="Box">
		<form action="" method="POST">
               <div class="inputBox">
      <input type="text" name="id" required value="">
      <label>Enter Username</label></div><input type="submit" name="search" style=" position:absolute; top:40%; left:80%; transform:translate(-50%,-50%);  width:5em;display: inline-block;border: none; background-color: Transparent;color:#03a9f4;font-size:40px;" value=">">

    
		</form>
			<div class="container">
				<table style="color:black;"> 
					<br><br>
						<?php 
						  $con=mysqli_connect("localhost","root","");
						  mysqli_select_db($con,'exam');
						  if(isset($_POST['search']))
						  {
						  $id=$_POST['id'];
						  $query="SELECT * FROM history WHERE name='$id';";
						  $result=mysqli_query($con,$query);
						  if(mysqli_num_rows($result)==0){
						  echo "<script type='text/javascript'>alert(' ENTER YOUR USERNAME !!')</script>";
						  }
						  else{
                                                   
                                                   echo "<th>";
                                                   echo "sno";
                                                   
                                                   echo "</th>";
echo "<th>";
                                                   echo "subject";
                                                   
                                                   echo "</th>";echo "<th>";
                                                   echo "marks";
                                                   
                                                   echo "</th>";
						  while($row = mysqli_fetch_array($result))
						  {
						  
						  echo "<tr>";
						  echo "<td>".$row['sno']."</td>";
						  echo "<td>".$row['sub']."</td>";	  
						  echo "<td>".$row['marks']."</td>";
						  
						  echo "</tr>";
						  }
						  }
						  }
						  ?></table>
				
			</div>	
	</body>
</html>
