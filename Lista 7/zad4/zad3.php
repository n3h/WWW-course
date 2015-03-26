<?php
header( "Cache-Control: max-age=-1" );
if ($_GET["wartosc"] == "prudnik" ) {
echo "To jest PRUDNIK <br /> <img src=\"http://www.schroniskomlodziezowe.prudnik.pl/files/zdjecie,600,185245,20110602,prudnik-rynek.jpg\" \>";
} elseif ($_GET["wartosc"] == "krakow") {
echo "To jest KRAKÓW <br /> <img src=\"http://www.gsea.pl/assets/regions/krakow-8f4b4159003d40eebecc65f8cf5d8983.jpg\" \>";
} elseif ($_GET["wartosc"] == "poznan") {
echo "To jest POZNAŃ <br /> <img src=\"http://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Pozna%C5%84_panorama_1.JPG/600px-Pozna%C5%84_panorama_1.JPG\" \>";
} elseif ($_GET["wartosc"] == "warszawa") {
echo "To jest WARSZAWA <br /> <img src=\"http://static2.wikia.nocookie.net/__cb20090125184127/warszawa/images/7/7c/Warsaw6vb.jpg\" \>";
} elseif ($_GET["wartosc"] == "wroclaw") {
echo "To jest WROCŁAW <br /> <img src=\"http://www.ajsblo.pl/wp-content/uploads/2013/04/fontanna-we-wroclawiu-2012.jpg\" \>"; }

?>