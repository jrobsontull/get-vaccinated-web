<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<?php

	include('config/usersdb.php');

if ($connection->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

?>

<table border="1" align="center">
<tr>
  <td>First Name</td>
  <td>Surname</td>
  <td>Email</td>
  <td>Address</td>
  <td>Phone</td>
  <td>Password</td>
  <td>Birth Date</td>
  <td>Token</td>
  <td>Verified?</td>
  <td>Date registered</td>
</tr>

<?php

$query = mysqli_query($connection, "SELECT * FROM users")
   or die (mysqli_error($connection));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['firstName']}</td>
    <td>{$row['lastName']}</td>
    <td>{$row['email']}</td>
    <td>{$row['address']}</td>
    <td>{$row['phone']}</td>
    <td>{$row['password']}</td>
    <td>{$row['birthDate']}</td>
    <td>{$row['token']}</td>
    <td>{$row['is_active']}</td>
    <td>{$row['date_time']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>