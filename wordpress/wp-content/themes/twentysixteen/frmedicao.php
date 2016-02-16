
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$tabela = $_GET['tab'];
		$titulo = "Controle &raquo; Editar $tabela";
		require_once ("includes/header.php"); 
	?>
</head>
<body>
			<?php 
				include('includes/topoemenu.php');
				require_once('includes/db.php');
			 ?>
			<div id="principal">
						
				<?php
					$edita = $_GET['cod'];
					if($tabela == "produtos") //verifica o que esta sendo editado, no caso produtos
					{		
						// aqui começa a recuperar dados pra preencher o form 
					
						if(isset($_POST['alterar'])) // faz a alteraçao
						{
							$preco = mysql_query("SELECT PRECO FROM produtos WHERE CODPROD = $edita");
							$nome = $_POST['nome'];
							$preco = $_POST['preco'];
							$descr = $_POST['descr'];
					
						
							$altera = mysql_query("UPDATE produtos SET NOME='$nome', PRECO = '$preco', DESCR = '$descr' ") or die(mysql_error());
							echo "Alterado com Sucesso.";
						}
						//faz as consultas pra gerar o formulario	
						$recupera = mysql_query("SELECT * FROM produtos WHERE CODPROD = $edita") or die (mysql_error());
						$query = mysql_fetch_array($recupera);//aqui recupera o produto escolhido a ser editado
						?> 
					
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
					<fieldset>
						<legend class="titulo">Editar Produto</legend>
						<div class="col-md-12">
							<label>Nome</label>						
							<input type="text" name="nome" value="<?php echo $query['NOME']; ?>" /><br />
						</div>
						<div class="col-md-12">
							<label>Preço</label>						
							<input type="text" name="preco" value="<?php echo $query['PRECO'];?>"  /> <br />
						</div>
						<div class="col-md-12">
							<label>Descrição</label>
							<input type="text" name="descr" value="<?php echo $query['DESCR']; ?>" /><br />	
						</div>

						<br />
						
						<input class="botao" type="submit" name="alterar" value="Editar" />
						<a class="botao" href="produtos.php">Voltar</a>	
					</fieldset>
				</form>
			
				<?php 
					}//fim da ediçao de produtos
					else //aqui começa a ediçao de outras tabelas.
						if ($tabela == 'clientes') //aqui a ediçao de clientes
						{
							if($_POST)
							{
								$nome = $_POST['nome'];
								$fone = $_POST['fone'];
								$email = $_POST['email'];
								
								$altera = mysql_query("UPDATE clientes SET NOME = '$nome', FONE = '$fone', EMAIL = '$email' WHERE CODIGO = $edita")
								or die("ERRO");
								echo "Alterado com sucesso.";
							}
							$clientes = mysql_query("SELECT * FROM clientes WHERE CODIGO = $edita");
							$result = mysql_fetch_array($clientes);
				?>
							<form action="#" method="post">
								<fieldset>
									<legend class="titulo">Editar Clientes </legend>
									<div class="col-md-12">
										<label>Nome</label>
										<input type="text" name="nome" value="<?php echo $result['NOME']; ?>" /><br />
									</div>
									<div class="col-md-12">
										<label>Telefone</label>
										<input type="text" name="fone" value="<?php echo $result['FONE']; ?>" /><br />
									</div>
									<div class="col-md-12">
										<label>Email</label>
										<input type="text" name="email" value="<?php echo $result['EMAIL']; ?>" /><br />
									</div>
									<input class="botao" type="submit" name="alterar" value="Editar"/>
									<a class="botao" href="produtos.php">Voltar</a>	
							
				
							
				<?php 
						}//fim da ediçao de clientes
						
				else 
						if ($tabela == 'pedidos') //aqui a ediçao de pedidos
						{
							
							$clientes = mysql_query("SELECT * FROM pedidos WHERE CODPEDIDO = $edita");
							$result = mysql_fetch_array($clientes);
							$cod_produto = $result['CODPRODUTO'];
							$cod_cliente = $result['CODCLIENTE'];
							$recupera1 = mysql_query("SELECT * FROM produtos WHERE CODPROD = $cod_produto") or die (mysql_error());
							$recupera2 = mysql_query("SELECT * FROM clientes WHERE CODIGO = $cod_cliente") or die (mysql_error());
				?>
							<form action="#" method="post">
								<fieldset>
									<legend class="titulo">Editar Pedidos </legend>
									<div class="col-md-12">
									<label>Produto</label>
									<select name ='produto'>
									<?php 
										while($sqlProdutoResultFim= mysql_fetch_assoc($recupera1))
										{
										?>
										<option value="<?=$sqlProdutoResultFim["CODPROD"]?>"> 
										<?=$sqlProdutoResultFim["NOME"]?> 
										</option>
										<?php
										}
									?>
									</select><br />
								</div>
								<div class="col-md-12">
									<label>Cliente</label>
									<select name ='cliente'>
									  <?php 
										while($sqlClienteResultFim= mysql_fetch_assoc($recupera2))
										{
										?>
										<option value="<?=$sqlClienteResultFim["CODIGO"]?>"> 
										<?=$sqlClienteResultFim["NOME"]?> 
										</option>
										<?php
										}
									?>
									</select><br />
								</div>
									
									<a class="botao" href="pedidos.php">Voltar</a>	
							
				
							
				<?php 
						}//fim da ediçao de pedidos
						
				?>
				
			</div> 
			<?php include('includes/fimerodape.php'); ?>
</body>
</html>