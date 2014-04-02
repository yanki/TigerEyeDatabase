<?

$fail='Wrong Username and Password';

if($_POST['username']!='root' && $_POST['password']!='root'){
	echo "
		<script>
			alert('$fail');
			window.location = 'http://people.clemson.edu/~myankou/php/EyeApp/admin.html';
		</script>
	";
} else{
	echo'
		<table border="1">
		  <tr>
		    <td align="center">Enter Point Info</td>
		  </tr>
		  <tr>
		    <td>
		      <table>
		        <form method="post" action="add.php">
		        <tr>
		          <td>Name:</td>
		          <td><input type="text" name="name" size="20">
		          </td>
		        </tr>
		        <tr>
		          <td>Latitude:</td>
		          <td><input type="text" name="lat" size="20">
		          </td>
		        </tr>
		        <tr>
		          <td>Longitude:</td>
		          <td><input type="text" name="lon" size="20">
		          </td>
		        </tr>
		        <tr>
		          <td>Location ID:</td>
		          <td><input type="text" name="loc" size="20">
		          </td>
		        </tr>
		        <tr>
		          <td></td>
		          <td align="center"><input type="submit" 
		          name="submit" value="Add"></td>
		        </tr>
		        </table>
		      </td>
		    </tr>
		</table>';
}

?>