<?php

require_once("util/Conexao.php");
require_once("modelo/ClientePF.php");
require_once("modelo/ClientePJ.php");
require_once("dao/ClienteDAO.php");

$conexao = new Conexao();
$con = Conexao::getCon();
//print_r($con);

do {
    echo "\n-----------CADASTRO DE CLIENTES-------\n";
    echo "1- Cadastrar Cliente PF\n";
    echo "2- Cadastrar Cliente PJ\n";
    echo "3- Listar Clientes\n";
    echo "4- Buscar Cliente\n";
    echo "5- Excluir Cliente\n";
    echo "0- Sair\n";

    $opcao = readline("Informe opcao: ");
    switch ($opcao) {
        case 1:

            $cliente = new ClientePF();
            $cliente->setNome(Readline("Informe o nome: "));
            $cliente->setNomeSocial(Readline("Informe o nome social: "));
            $cliente->setCpf(Readline("Informe o cpf: "));
            $cliente->setEmail(Readline("Informe o e-mail: "));

            $clienteDAO = new ClienteDAO();
            $clienteDAO->inserirCliente($cliente);

            echo "Cliente PF cadastrado com sucesso!\n\n";
            break;
        case 2:
            $cliente = new ClientePJ();
            $cliente->setRazaoSocial(Readline("Informe o Razao Social: "));
            $cliente->setNomeSocial(Readline("Informe o nome social: "));
            $cliente->setCnpj(Readline("Informe o cnpj: "));
            $cliente->setEmail(Readline("Informe o e-mail: "));

            $clienteDAO = new ClienteDAO();
            $clienteDAO->inserirCliente($cliente);

            echo "Cliente PJ cadastrado com sucesso!\n\n";

            break;
        case 3:
            //buscar os objetos no banco de dados
            $clienteDAO = new ClienteDAO();
            $clientes = $clienteDAO->listarClientes();

            //exbibir os dados dos objetos
            foreach ($clientes as $c) {
                
                    printf("%d- %s | %s | %s | %s | %s\n",
                $c->getId(), $c->getTipo(), $c->getNomeSocial(),
                $c->getIdentificacao(), $c->getNroDoc(),
            $c->getEmail());
                
            }

            break;
        case 4:
            //buscar cliente pelo ID

            //1- ler o ID

            $id = 0;

            //2- Chamar o metodo que retorna o objeto do cliente do banco de dados
            $clienteDAO = new ClienteDAO();
            $cliente = $clienteDAO->buscarPorId();

            //3- verificar se o cliente retomar é diferente de null
            //3.1- se for diferente de null, mostrar os dados do cliente
            //3.2- Se for igual a null, mostrar mensagem que o cliente nao foi encontrado

            break;
        case 5:
            break;
        case 0:
            break;
    }
} while ($opcao = 0);
