<!-- Larry's Shoppe - customer_report.php 
	Jacob Baynes
	4/18/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Customer Report";
include('../includes/header.html');


//connect to the larrys shoppe Database
include "../db_connect.php";
?>


	<br><br>
	<h1>Customer Report</h1>

	<?php
	$query = "SELECT cust_id, date, CONCAT(first_name, ' ', last_name) AS Name, CONCAT(street, ', ', city, ', ', state, ', ', zip) AS Address, phone, email from customers;";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	?>
	
	<table id="inv_report">
		<tr>
			<th>Customer ID</th>
			<th>Date</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email</th>
		</tr>
	
	<?php
	
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['cust_id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['Address']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['email']."</td>";
	}
	?>
	</table>






<?php
// close connection to larry's shoppe database
mysqli_close($db_connection);
	
// Include site footer
include('../includes/footer.html');
?>