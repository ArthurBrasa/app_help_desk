<?php 
	// 
	session_start();

	//echo '<pre>';
	//print_r($_POST);
	//echo '</pre>';

	$usuario = $_SESSION['nome'];
	// $r = strpos($nome, '@');
	// $usuario = substr($nome, 0, $r).'.hd';
	$nome = $_SESSION['id'];

	//$arquivo = fopen($nome, 'a');
	//mkdir(__DIR__.'/registros/', 0777, true);	

	$pasta = './help_desk_scripts/registros';
	if (!is_dir($pasta)){
		mkdir($pasta, 0777);
	}

	$dir = $pasta."/".$nome;
	// echo $dir;

	if(!is_file($dir)){
			$arquivo = fopen($dir, 'a');
			fwrite($arquivo, $usuario.PHP_EOL);
			fclose($arquivo);
		}
	// escrever no arquivo

	$arquivo = fopen($dir, 'a');
	foreach ($_POST as $reg) {
		fwrite($arquivo, $reg.'#');
	}
	fwrite($arquivo, PHP_EOL);

	fclose($arquivo);

	header('Location: abrir_chamado.php')
	// movendo arquivo
	// $move_arquivo = "$pasta/$nome";
	// rename($nome, $move_arquivo);

	//lendo arquivo file_exists()
	// $ler_arquivo = fopen($move_arquivo, 'a');

	// while(!feof){ fgers(nome_arquivo)}

	//file_get_contents($nome_do_arquivo)



?>
