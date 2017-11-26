 <html>
<body>
<?php
include ('db_connect.inc.php');
include('session.php');

$sql = "SELECT * FROM employee_info WHERE employee_name = '$login_session'" ;
		$result = mysqli_query($db,$sql);
		$resultCheck = mysqli_num_rows($result);


if (isset($_POST['cmdback']) && $row['employee_id'] == 999)
{
	header ("Location: boss.php?return=success");
} 
elseif (isset($_POST['cmdback']))
{
	header ("Location: welcome.php?return=success");
} 

if (isset($_POST['cmdupdate']))
{

$sql_errors = 0;	
	
$sessionid = $row['employee_id'];	
$employee_address = mysqli_real_escape_string($db,$_POST['employee_address']);
$employee_name = mysqli_real_escape_string($db,$_POST['employee_name']);
$employee_email = mysqli_real_escape_string($db,$_POST['employee_email']);
$employee_hp = mysqli_real_escape_string($db,$_POST['employee_hp']);
$employee_postal_code = mysqli_real_escape_string($db,$_POST['employee_postal_code']);


if (!empty($employee_address))
{
	$sql = "UPDATE employee_info SET employee_address='$employee_address' WHERE employee_id = $sessionid";
		if (mysqli_query($db, $sql)) {} 
     else $sql_errors++;
}

if (!empty($employee_name))
{
	$sql = "UPDATE employee_info SET employee_name='$employee_name' WHERE employee_id = $sessionid";
		if (mysqli_query($db, $sql)) {} 
     else $sql_errors++;
}

if (!empty($employee_email))
{
	$sql = "UPDATE employee_info SET employee_email='$employee_email' WHERE employee_id = $sessionid";
		if (mysqli_query($db, $sql)) {} 
     else $sql_errors++;
}


if (!empty($employee_hp))
{
	$sql = "UPDATE employee_info SET employee_hp='$employee_hp' WHERE employee_id = $sessionid";
		if (mysqli_query($db, $sql)) {} 
     else $sql_errors++;
}

if (!empty($employee_postal_code))
{
	$sql = "UPDATE employee_info SET employee_postal_code='$employee_postal_code' WHERE employee_id = $sessionid";
		if (mysqli_query($db, $sql)) {} 
     else $sql_errors++;
}



mysqli_close($db);
if ($sql_errors == 0 && $row['employee_id'] == 999)
{
	header ("Location: boss.php?update=success");	
}


elseif ($sql_errors == 0)
{
	header ("Location: welcome.php?update=success");	
}
else
{
	 echo "Error updating record...: " . mysqli_error($db);
	 
	 
}

} 

?>
</html>


<form action="update.php" method="post">
 
 <fieldset> 
  <legend>Update details:</legend> 
  <dl> 
    <dt> 
      <label title="Employee name">Employee name:
      <input tabindex="1" accesskey="u" name="employee_name" type="text" maxlength="50" id="username" /> 
      </label> 
    </dt> 
  </dl> 
  <dl> 
    <dt> 
      <label title="HP">HP:
      <input tabindex="2" accesskey="p" name="employee_hp" type="number" min="1" maxlength="8" id="HP" /> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Email">Email:
      <input tabindex="3" accesskey="p" name="employee_email" type="text" maxlength="255"" id="email" /> 
      </label> 
    </dt> 
  </dl> 
  
  
  <dl> 
    <dt> 
      <label title="Address">Address:
      <input tabindex="4" accesskey="p" name="employee_address" type="text" maxlength="255" id="address" /> 
      </label> 
    </dt> 
  </dl> 
  
  <dl> 
    <dt> 
      <label title="Postal Code">Postal Code:
      <input tabindex="4" accesskey="p" name="employee_postal_code" type="number" min="1" maxlength="255" id="postalcode" /> 
      </label> 
    </dt> 
  </dl> 
  
  <dl> 
    <dt> 
      <label title="Submit"> 
      <input tabindex="5" accesskey="l" type="submit" name="cmdupdate" value="UPDATE INFORMATION" /> 
      </label> 
    </dt> 
	<dl> 
    <dt> 
      <label title="Submit"> 
      <input tabindex="6" accesskey="l" type="submit" name="cmdback" value="Back" /> 
      </label> 
    </dt> 
  </dl> 