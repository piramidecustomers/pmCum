<?php

$tAlias= trim($_POST["usu"]);
$tClave= $_POST["contra"];
$archivo = file('black_list.txt'); 
$encontrado=0;

foreach($archivo as $linea) 
{
    
  if(strpos($tAlias, ' '.trim($linea).' ')!==false)
  {
     $encontrado=1; 
     break;
  }
  elseif(strpos($tClave, ' '.trim($linea).' ')!==false)
  {
     $encontrado=1; 
     break;
  }
}


if ($encontrado==1) header('Location: Login.php');
else
{
    //header('Location: digitar.php?id='.$hId.'&op=b');  
    header('Location: ingresar.php?usu='.$tAlias.'&contra='.$tClave);
}
fclose($archivo);
exit;

?>
