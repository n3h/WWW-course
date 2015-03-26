<?PHP
$katalog = 'upload/';
if(move_uploaded_file($_FILES['plik']['tmp_name'], $katalog.$_FILES['plik']['name'])){
    echo("Plik został załadowany.");
}
else{
    echo("Plik nie został załadowany.");
}
?>