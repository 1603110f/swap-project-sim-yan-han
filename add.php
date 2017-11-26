 <html>
<body>
<?php
include ('db_connect.inc.php');
include('session.php');

if (isset($_POST['cmdback']))
{
	header ("Location: boss.php?return=success");
} 


if (isset($_POST['cmdadd']))
{

$sql_errors = 0;	
	
$sessionid = $row['employee_id'];	
$employee_address = mysqli_real_escape_string($db,$_POST['employee_address']);
$employee_name = mysqli_real_escape_string($db,$_POST['employee_name']);
$employee_email = mysqli_real_escape_string($db,$_POST['employee_email']);
$employee_hp = mysqli_real_escape_string($db,$_POST['employee_hp']);
$employee_postal_code = mysqli_real_escape_string($db,$_POST['employee_postal_code']);
$employee_joined_date = mysqli_real_escape_string($db,$_POST['employee_joined_date']);
$employee_salary = mysqli_real_escape_string($db,$_POST['employee_salary']);
$employee_role = mysqli_real_escape_string($db,$_POST['employee_role']);
$employee_id = mysqli_real_escape_string($db,$_POST['employee_id']);
$employee_pw = mysqli_real_escape_string($db,$_POST['employee_pw']);

$hashedPw = password_hash($employee_pw, PASSWORD_DEFAULT);
$sql = "INSERT INTO employee_info (employee_id,employee_name, employee_address, employee_email, 
employee_hp,employee_postal_code, employee_joined_date, employee_salary, employee_pw, employee_role) VALUES 
('$employee_id','$employee_name', '$employee_address', '$employee_email', '$employee_hp', '$employee_postal_code',
'$employee_joined_date', '$employee_salary','$hashedPw', '$employee_role' );";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
	$sql_errors++;
    echo "Error: " . $sql . "<br>" . $db->error;
}


mysqli_close($db);
if ($sql_errors == 0)
{
	header ("Location: boss.php?update=success");	
}
else
{
 echo "Error updating record...: " . mysqli_error($db);
	 
}
} 
?>
</html>


<form action="add.php" method="post">
 
 <fieldset> 
  <legend>Add employee details:</legend> 
  
  
  <dl> 
    <dt> 
      <label title="Employee ID">Employee ID:
      <input tabindex="1" accesskey="p" name="employee_id" type="number" min="1" maxlength="255"" id="id" required="" /> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Employee name">Employee name:
      <input tabindex="1" accesskey="u" name="employee_name" type="text" maxlength="50" id="username" required="" /> 
      </label> 
    </dt> 
  </dl> 
  <dl> 
  
  
  <dl> 
    <dt> 
      <label title="Password">Password:
      <input tabindex="3" accesskey="p" name="employee_pw" type="password" maxlength="255"" id="password" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
    <dt> 
      <label title="HP">HP:
      <input tabindex="2" accesskey="p" name="employee_hp" type="number" min="1" maxlength="8" id="HP" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Email">Email:
      <input tabindex="3" accesskey="p" name="employee_email" type="text" maxlength="255"" id="email" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Address">Address:
      <input tabindex="4" accesskey="p" name="employee_address" type="text" maxlength="255" id="address" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  <dl> 
    <dt> 
      <label title="Postal Code">Postal Code:
      <input tabindex="4" accesskey="p" name="employee_postal_code" type="number" min="1" maxlength="255" id="postalcode" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Joined Date">Joined Date:
      <input tabindex="3" accesskey="p" name="employee_joined_date" type="date" maxlength="255"" id="date" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Salary">Salary:
      <input tabindex="3" accesskey="p" name="employee_salary" type="number_format" maxlength="255"" id="salary" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Role">Role:
      <input tabindex="3" accesskey="p" name="employee_role" type="text" maxlength="255"" id="role" required=""/> 
      </label> 
    </dt> 
  </dl> 
  
  <dl> 
    <dt> 
      <label title="Submit"> 
      <input tabindex="5" accesskey="l" type="submit" name="cmdadd" value="ADD EMPLOYEE" required="" /> 
      </label> 
    </dt> 
	<dl> 
    <dt> 
      <label title="Submit"> 
      <input tabindex="6" accesskey="l" type="submit" name="cmdback" value="Back" formnovalidate="" /> 
      </label> 
    </dt> 
  </dl> 