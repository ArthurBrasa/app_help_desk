<?php 

session_start();
/*
print_r($_GET);
echo $_GET['email'].'<br>';
echo $_GET['senha'];
*/

#print_r($_POST);

$usuario_autenticado = false;
$adm = null;
$nome = ''; 
$id = null;

// usuarios do sistema...
$usuarios_app = array(
	array('id' => 619, 'email' => 'adm@teste.com', 'senha' => '123456', 'adm'=>true ),
	array('id' => 982, 'email' => 'user@teste.com', 'senha' => '123456', 'adm'=>true),
	array('id' => 343, 'email' => 'zerotwo@teste.com', 'senha' => '123456', 'adm'=>false ),
	array('id' => 124, 'email' => 'itadori@teste.com', 'senha' => '123456', 'adm'=>false ),
	array('id' => 254, 'email' => 'rem@teste.com', 'senha' => '123456', 'adm'=>false ),
);
/*
echo '<pre>';
print_r($usuarios_app);
echo '</pre>';
*/

foreach($usuarios_app as $user){
	// print_r($user);
	// echo '<hr>';

	// echo 'email: '.$user['email'].' senha: '.$user['senha'];
	// echo '<br>';
	// echo 'email: '.$_POST['email'].' senha: '.$_POST['senha'];
	// echo '<hr>';

	if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
		$usuario_autenticado = true;
		$adm = $user['adm'];
		$nome = $user['email'];
		$id = $user['id'];
		}
}

if($usuario_autenticado){
	$_SESSION['autenticado'] = $usuario_autenticado;
	$_SESSION['adm'] = $adm;
	$_SESSION['nome'] = $nome;
	$_SESSION['id'] = $id;
	header('Location: home.php');
}else{
	header('Location: index.php?login=erro');
}



?>