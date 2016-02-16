
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$titulo = "Controle &raquo; Cadastrar Clientes";
		require_once ("includes/header.php"); 
	?>

</head>
<body>
			<?php 
				include('includes/topoemenu.php');
				require_once('includes/db.php');
				if ($_POST)
				{
					$nome = $_POST['nome'];
					$fone = $_POST['fone'];
					$email = $_POST['email'];
					
					if ($nome == '' || $fone == '' || $email == '')
					{
						echo "<script>alert('Preencha todos os campos')</script>";	
						$cad = 0;				
					}
					else
						$cad = mysql_query ("INSERT INTO clientes(CODIGO,NOME,FONE,EMAIL) 
						values(NULL,'$nome','$fone','$email') ") 
						or die (mysql_error());
						if ($cad != 0)
							echo "<script>alert('Cadastro foi efetuado com sucesso');</script>";

				}
			 ?>
			 	
			<div id="principal">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<fieldset>
						<legend class="titulo">Cadastro de Clientes &darr; </legend>
						<label>Nome</label>
						<input type="text" name="nome" maxlength="45"  onfocus="this.style.backgroundColor='#fff';" onblur="this.style.backgroundColor='#EEE';"/><br />
						<label>Telefone</label>
						<input type="text" name="fone" maxlength="11" /> <br />
						<label>Email</label>
						<input type="text" name="email"  />  <br />
						<input class="botao" type="submit" name="enviar" value="Cadastrar" /> 
					</fieldset>				
				</form>
			</div> <!-- Fim da div#principal -->
			<?php include('includes/fimerodape.php'); ?>
</body>
</html>