<?php
   include("db_connect.inc.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['employee_name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['employee_pw']); 
      
	  
				
	  if (empty($myusername) || empty($mypassword)) {
		header("Location: index.php?login=empty");
		exit();
		}else {
		
		
	    
		
		
		
		$sql = "SELECT * FROM employee_info WHERE employee_name = '$myusername'" ;
		$result = mysqli_query($db,$sql);
		$resultCheck = mysqli_num_rows($result);
	    
		
		
		
		if ($resultCheck < 1){
		  header ("Location: index.php?login=error");
		  exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					//de-hash pw
					$hashedPwcheck = password_verify($mypassword, $row['employee_pw']);
					if ($hashedPwcheck == false) {
						 header ("Location: index.php?login=error");
						 exit();
						
					} elseif ($hashedPwcheck == true) {
						//Check if BIG BOSS logs in
						{
							if ($row['employee_id'] == 999)
							{
							$_SESSION['login_user'] = $myusername;											
							header ("Location: boss.php?login=success");
							exit();
							}
						}
						
						//Log in the user here 						
						$_SESSION['username'] = $row['employee_name'];
						$_SESSION['login_user'] = $myusername;
						
						
						header ("Location: welcome.php?login=success");
						exit();
						
						
						
						
						
						
					
						
					}
				}
			}
	
	    }
   }
	
   
   
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Employee Name  :</label><input type = "text" name = "employee_name" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "employee_pw" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
			
					  
				<html>
            </div>
				
         </div>
			
      </div>

   </body>
</html>
	


				
             