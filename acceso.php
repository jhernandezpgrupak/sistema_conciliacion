<?php
	if(isset($_POST['submit']))
	{
		$user=$_POST['user'];
		$pwd=$_POST['psw'];
		$x=0;

		if(!preg_match("/^[A-Za-z]{5,10}$/",$user))
		{
			$x=1;
		}
		if(!preg_match("/^[0-9]{5,10}$/",$pwd))
		{
			$x=1;
		}
		
		if($x==0)
		{
			$y=0;
			$data = array(0=>'invitado',1=>'12345');
			//var_dump($data);

			if($user!=$data[0] OR $pwd!=$data[1])
			{
				$y=1;
				header('Location:index.php?Result=Datos Incorrectos: No puede acceder');
			}
			else
			{
				session_start();
				$_SESSION['uze']=$user;
				header('Location:conciliacion.php');
			}
		}
		else
		{
			header('Location:index.php?Result=Datos Incorrectos: No puede acceder');
		}	

	}
?>