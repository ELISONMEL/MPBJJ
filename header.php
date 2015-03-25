<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
@$pgatual = strtolower(end(explode('/', $_GET['topicos'])));
?>

<?php include"scripts.php";?>
<title>MPBJJ | <?php echo $pgatual;?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="scripts/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="box">

	<div id="header">
		
        <div id="header_logo">
		<img src="images/mp_ct.jpg" />       

	    </div><!--HEADER LOGO-->
        <div id="header_logo_nu">
        <img src="images/new_logo_nu_header.jpg"/>
        </div>
        
        <div id="header_contatos">
        O Maior Centro de Lutas<br/>
        da América Latina.<br/>
        Venha fazer parte desta familia.
        </div>
   
	</div><!--HEADER-->
	
 <!--MENU-->   
    <div id="menu">
    
     <ul>
      <li><a href="index.php?topicos=nav/home">academia</a></li>
      <li><a href="index.php?topicos=nav/mpbjj">mpbjj</a></li>
      <li><a href="index.php?topicos=nav/eventos">eventos</a></li>
      <li><a href="index.php?topicos=nav/atletas">atletas</a></li>
      <li><a href="index.php?topicos=nav/produtos">produtos</a></li>
      <li><a href="index.php?topicos=nav/contato">fale conosco</a></li>
     </ul>
         <div id="menu_search">
         <form name="search" action="" method="post">
          <input type="text" name="search" />
          <input type="submit" name="Encontre" value="Encontre" class="search_btn" />        
         </form>      
         </div>

    </div>
    
<!-- Search-->
<!--FIM DO MENU-->
    
<div id="content">