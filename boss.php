<?php
   include('session.php');
   include ('db_connect.inc.php');
 

 
$link=mysqli_connect("localhost","root","","employee");
mysqli_select_db($link,"employee");
$res=mysqli_query($link,"select * from employee_info");
 
if (isset($_POST['delete']))
{
	$box=$_POST['num'];
	while (list ($key,$val) = @each ($box)) 
	{	
	mysqli_query($link,"delete from employee_info where employee_id=$val"); 
	}
	
	
	?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}

 
 
 
 
?>

<form name="deleteform" action"" method="post">
<html">
<head>
<title> Employee Data </title>
</head>
   <style>p.indent{ padding-left: 2.8em }</style>
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign out</a></h2>
	  
	  
	  
	  
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-mb3i{background-color:#D2E4FC;text-align:right;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 1122px">
<colgroup>
<col style="width: 25px">
<col style="width: 44px">
<col style="width: 150px">
<col style="width: 98px">
<col style="width: 190px">
<col style="width: 196px">
<col style="width: 102px">
<col style="width: 101px">
<col style="width: 94px">
<col style="width: 122px">
</colgroup>
  <tr>
    <th class="tg-baqh" colspan="10">Employee Info</th>
  </tr>
  <tr>
    <td class="tg-6k2t"></td>
    <td class="tg-6k2t">ID</td>
    <td class="tg-6k2t">Name</td>
    <td class="tg-6k2t">HP </td>
    <td class="tg-6k2t">Email</td>
    <td class="tg-6k2t">Address</td>
    <td class="tg-6k2t">Postal Code</td>
    <td class="tg-6k2t">Joined Date</td>
    <td class="tg-6k2t">Salary</td>
    <td class="tg-6k2t">Role</td>
  </tr>
  <tr>

  
	<?php
	$sql = 'SELECT * from employee_info';
	$query = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_array($res))
		{
			if($row['employee_id'] != 999)
			{
				
			
			echo '<tr>
	<td align="center" bgcolor="#FFFFFF"><input name="num[]" type="checkbox"  class="other" value=" '.$row['employee_id'].' "></td>		
	<td> '.$row['employee_id'].' </td>	
	<td> '.$row['employee_name'].' </td>	
	<td> '.$row['employee_hp'].' </td>	
	<td> '.$row['employee_email'].' </td>	
	<td> '.$row['employee_address'].' </td>
	<td> '.$row['employee_postal_code'].' </td>
	<td> '. date('F d, Y', strtotime ($row['employee_joined_date'])).'</td>
	<td> $'.$row['employee_salary'].' </td>	
	<td> '.$row['employee_role'].' </td>	
	
	
	</tr>';
		}
	
		}
	
	
	?>
	
	
    
	
<tfoot>
			<tr>
				
				<th colspan="10"> <a href = "add.php">Add new employee</a> <p class="indent"></p>	<a href = "update.php">Update new details</a></th>
				
			</tr>
		</tfoot>
  
  
</table>
	  
	  <input type="submit" id="delete" name="delete" value="DELETE SELECTED" style="width:150px; height:50px;" />

	  
	  
	  
   </body>
   
</html>