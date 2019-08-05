<?php 

          require_once("config.php");
         //carrega um usuario
          //$root = new Usuario();
          //$root->loadById(1);
         //echo $root;

          //carrega uma lista de usuario
          //$lista = Usuario::getList();
          //echo json_encode($lista);

          //carrega uma lista de usuarios buscando pelo login
          //$search = Usuario::search("go");
          //echo json_encode($search);

          //carrega usuario usando login e senha
          $usuario = new Usuario();
          $usuario->login("gomes", "34434343");

          echo $usuario;




 ?>