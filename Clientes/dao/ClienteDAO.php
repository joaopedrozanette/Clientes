<?php

    require_once("modelo/Cliente.php");
    require_once("modelo/ClientePF.php");
    require_once("modelo/ClientePJ.php");

    require_once("util/Conexao.php");

class ClienteDAO {

    public function inserirCliente(Cliente $cliente) {


        $sql = "INSERT INTO clientes (tipo, nome_social, email, nome, cpf, razao_social ,cnpj)
                VALUES
                (?,?,?,?,?,?,?)";

                $con = Conexao::getCon();

                $stm = $con->prepare($sql);
                if($cliente instanceof ClientePF){
                $stm->execute(array($cliente->getTipo(),
                                    $cliente->getNomeSocial(),
                                    $cliente->getEmail(),
                                    $cliente->getNome(),
                                    $cliente->getCpf(),
                                    null,
                                    null));
                } elseif($cliente instanceof ClientePJ ){

                    $stm->execute(array($cliente->getTipo(),
                                    $cliente->getNomeSocial(),
                                    $cliente->getEmail(),
                                    null,
                                    null,
                                    $cliente->getRazaoSocial(),
                                    $cliente->getCnpj()));

                }

    }

    public function listarClientes(){
        $sql = "SELECT * FROM clientes";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();

        print_r($registros);
    }

}