<?php include"header.php" ?>

<?php 
foreach ($_REQUEST as $___opt => $___val) {
  $$___opt = $___val;
}
if(empty($topicos)) {
include("nav/home.php");
}
elseif(substr($topicos, 0, 4)=='http' or substr($topicos, 
0, 1)=="/" or substr($topicos, 0, 1)==".") 
{
echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
}
else {
include("$topicos.php");
}

?>

    
<?php include"footer.php" ?>