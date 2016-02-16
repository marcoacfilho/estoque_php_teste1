
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$titulo = "Controle &raquo; Cadastrar Produto";
		require_once ("includes/header.php"); 
	?>

</head>
<body>
			<?php 
				include('includes/topoemenu.php');
				require_once('includes/db.php');
				if ($_POST)
				{
					$nome = $_POST['produto'];
					$desc = $_POST['desc'];
					$preco = $_POST['preco'];
					if ($nome == '' ||  $desc == '' || $preco == ''){
						$cad = 0;
						echo "<script>alert('Preencha todos os campos');</script>";
					}
					else					
						$cad = mysql_query ("INSERT INTO produtos(CODPROD,NOME,PRECO,DESCR) values(NULL,'$nome','$preco','$desc') ") or die ("ERRO");	
					if ($cad != 0)
						echo "<script>alert('Cadastro foi efetuado com sucesso');</script>";			
				}
			 ?>
			
			<div id="principal">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<fieldset>
						<legend class="titulo">Cadastro de Produto &darr; </legend>
						<label>Nome</label>
						<input type="text" name="produto" /><br />
						<label>Descrição</label>
						<input type="text" name="desc" /><br />
						<label>Preço</label>
						<input type="text" name="preco" /><br />
						
						<input class="botao" type="submit" name="enviar" value="Cadastrar" />
					</fieldset>				
				</form>
			</div> <!-- Fim da div#principal -->
			
			<?php include('includes/fimerodape.php'); ?>
			
</body>
</html>