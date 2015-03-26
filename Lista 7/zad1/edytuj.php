<?php

include('ustawienia.php');
if(isset($_REQUEST['edycja'])){
	extract($_REQUEST);
	$query=mysqli_query($conn,"update komentarze set nick='$nick', koment='$koment' where id='$id'") or die(mysql_error());

	if($query){
	echo "komentarz edytowany";
	}
}

$id=$_REQUEST['id'];

$query=mysqli_query($conn,"select * from komentarze where id='$id'") or die(mysqli_error($conn));

$row=mysqli_fetch_assoc($query);
extract($row);
?>
<form action='' method='post' border='0'>
	<table>
		<tr>
			<td>Nick</td>
			<td><input type='text' name='nick' value='<?php echo $nick;  ?>' /></td>
		</tr>
		<tr>
			<td>Komentarz</td>
			<td><textarea name='koment' value='<?php echo $koment;  ?>' /></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='hidden' name='id' value='<?php echo $id ?>' />
				<input type='submit' value='Edytuj' name="edycja" />
			</td>
		</tr>
	</table>
</form>

<a href='index.php'>wróc do strony g³ównej</a>