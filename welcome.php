<?php
   include('session.php');
   include ('db_connect.inc.php');

?>
<html">
<head>
<title> Employee Data </title>
</head>
   
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
<table class="tg" style="undefined;table-layout: fixed; width: 982px">
<colgroup>
<col style="width: 30px">
<col style="width: 87px">
<col style="width: 110px">
<col style="width: 166px">
<col style="width: 163px">
<col style="width: 94px">
<col style="width: 106px">
<col style="width: 93px">
<col style="width: 133px">
</colgroup>
  <tr>
    <th class="tg-baqh" colspan="9">Employee Info</th>
  </tr>
  <tr>
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
	
	
	echo '<tr>
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
	
	?>
	
	
	
		
    
	
<tfoot>
			<tr>
				
				<th colspan="9">  <a href = "update.php">Update new details</a> </th>
			</tr>
		</tfoot>
  
  
</table>
	  
	  

	
	  
	  
	  
	  
	  
	  
	  
	  
	  
   </body>
   
</html>