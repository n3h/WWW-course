<?php
include 'ustawienia.php';
isset($_GET['dzialanie']) ? $dzialanie=$_GET['dzialanie'] : $dzialanie="";

if($dzialanie=='usun'){
	$id=$_REQUEST['id'];
	$query = mysqli_query($conn,"DELETE FROM komentarze WHERE id='$id'") or die(mysqli_error($conn));
	if($query){
	echo "Komentarz usuniety";
	}
}

if(isset($_POST['zapisz'])){
	extract($_REQUEST);
	$query=mysqli_query($conn,"insert into komentarze SET nick='$nick', koment='$komentarz'") or die(mysqli_error($conn));
	if($query){
		echo "dodano nowy komentarz";
	}
}

$query=mysqli_query($conn,"select id, nick, koment from komentarze");
?>

<table border="1">
<tr>
<th>Nick</th>
<th>Komentarz</th>
<th>Edycja</th>
<th>Usuwanie</th>
</tr>

<?php
while($row=mysqli_fetch_array($query)){
extract($row);
?>

<tr>
	<td><?php echo $nick; ?></td>
	<td><?php echo $koment; ?></td>
	<td>
		<a href="edytuj.php?id=<?php echo $id; ?>">Edytuj</a>
	</td>
	<td>
		<a href='#' onclick='usun_wpis(<?php echo $id; ?>);'>Usuñ</a>
	</td>
</tr>


<?php
}
?>
</table>

Dodaj nowy komentarz:
<form action='#' method='post' border='0'>
	<table>
		<tr>
			<td>Nick</td>
			<td><input type='text' name='nick' /></td>
		</tr>
		<tr>
			<td>Komentarz</td>
			<td><textarea name='komentarz' /></textarea></td>
		</tr>
		<tr>
			<td></td>
		<td>
			<input type='submit' value='Zapisz' name="zapisz" />
			</td>
		</tr>
	</table>
</form>


<script type='text/javascript'>
function usun_wpis( id ){
	var odp = confirm('Na pewno?');
	if ( odp ){
		window.location = 'index.php?dzialanie=usun&id=' + id;
	}
}
</script>