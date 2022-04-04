<?php
$fi = fopen("moni.txt", "a+")
        or die("problemas al crear el archivo");
fwrite($fi, $_POST["comentario"]);
echo 'Correcto, archivo almacenado en carpeta htpdocs/cck';
fclose($fi);

        

?>