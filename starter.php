<?php
session_start();
setcookie("srvstart", "lacookie", time()+15, "/");
if(isset($_COOKIE["srvstart"]))
      {
echo 'Alguien intento iniciarlo, esperar 15 segundos en cada reinicio';
      }
else  {
$socket = stream_socket_client('tcp://dominio.com:25565', $errno, $errstr, 1);
if (!$socket)
{
if($ssh = ssh2_connect('127.0.0.1', 22)) {
    if(ssh2_auth_password($ssh, "root", "lapass")) {
      echo 'Iniciando servidor!';
      $stream = ssh2_exec($ssh, '/root/Network/Servidores/Prueba1/./start.sh > /dev/null 2>&1 &');
      stream_set_blocking($stream, true);
      fclose($stream);
  }
 }
}
else
{
echo 'el server ya esta iniciado! estais flipando?';
}
fclose($socket);
}
?>
