<?php
class COsoba
{
	public $id;
	public $nick;
	public $koment;
}
?>
<?php
include('ustawienia.php');

try
{
  $dbh = new PDO( $dsn, $uzytkownik, $haslo );
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $dbh->beginTransaction();
  $dbh->commit();  
}
catch ( Exception $e )
{
  $dbh->rollBack();
  echo "Failed: " . $e->getMessage();
}


isset($_GET['dzialanie']) ? $dzialanie=$_GET['dzialanie'] : $dzialanie="";

if($dzialanie=='usun'){
	$id=$_REQUEST['id'];
	
try
{
  $dbh = new PDO( $dsn, $uzytkownik, $haslo );
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $dbh->exec("DELETE FROM komentarze WHERE id='$id'");
}
catch ( Exception $e )
{
  echo "blad: " . $e->getMessage();
}
	
	
	
//	$query = mysqli_query($conn,"DELETE FROM komentarze WHERE id='$id'") or die(mysqli_error($conn));

	echo "Komentarz usuniety";
}

if(isset($_POST['zapisz'])){
	extract($_REQUEST);
	
	
try
{
  $dbh = new PDO( $dsn, $uzytkownik, $haslo );
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $dbh->exec("insert into komentarze SET nick='$nick', koment='$komentarz'");
}
catch ( Exception $e )
{
  echo "blad: " . $e->getMessage();
}
	
	
//	$query=mysqli_query($conn,"insert into komentarze SET nick='$nick', koment='$komentarz'") or die(mysqli_error($conn));
		echo "dodano nowy komentarz";
}

//$query=mysqli_query($conn,"select id, nick, koment from komentarze");


?>

<table border="1">
<tr>
<th>Nick</th>
<th>Komentarz</th>
<th>Edycja</th>
<th>Usuwanie</th>
</tr>

<?php
try
{
  
   $dbh = new PDO( $dsn, $uzytkownik, $haslo );
   $o=new COsoba();
   $rs=$dbh->query( 'SELECT * FROM komentarze', PDO::FETCH_CLASS, "COsoba" );

   while ( $o=$rs->fetch() )
   {
?>
<tr>
	<td><?php echo "$o->nick"; ?></td>
	<td><?php echo "$o->koment"; ?></td>
	<td>
		<a href="edytuj.php?id=<?php echo "$o->id"; ?>">Edytuj</a>
	</td>
	<td>
		<a href='#' onclick='usun_wpis(<?php echo "$o->id"; ?>);'>Usuñ</a>
	</td>
</tr>
<?php
   }
   $dbh = null;
}
catch ( PDOException $e )
{
   print "blad!: " . $e->getMessage() . "<br/>";
   die();
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