<?php

class Entrada_saida {

    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    }

    /**
     * Listar todas as entradas e saídas
     * @return array
     * @example $variavel = $Obj->listar()
     */
    public function listar(){
        $sql = $this->pdo->prepare('SELECT * FROM entrada_saida');        
        $sql->execute();
    
        $dados = $sql->fetchAll(PDO::FETCH_OBJ);
    
        // Retorna os dados como JSON
        return $dados;
    }      

    /**
     * Cadastrar uma nova entrada e saída
     * @param array $dados    
     * @return int
     * @example $Obj->cadastrar($_POST);
     * 
     */
    public function cadastrar(array $dados)
    {
        $sql = $this->pdo->prepare('INSERT INTO entrada_saida 
                                    (id_usuario, id_kit, data_entrada, data_saida)
                                    VALUES
                                    (:id_usuario, :id_kit, :data_entrada, :data_saida)
                                ');

        $sql->bindParam(':id_usuario', $dados['id_usuario']);
        $sql->bindParam(':id_kit', $dados['id_kit']);
        $sql->bindParam(':data_entrada', $dados['data_entrada']);
        $sql->bindParam(':data_saida', $dados['data_saida']);
        $sql->execute();
    }

    /**
     * Retorna os dados de uma entrada e saída
     * @param int $id_entrada_saida
     * @return object
     * @example $variavel = $Obj->mostrar($id_entrada_saida);
     */
    public function mostrar(int $id_entrada_saida)
    {
    	// Montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM entrada_saida WHERE id_entrada_saida = :id_entrada_saida LIMIT 1');
        $sql->bindParam(':id_entrada_saida', $id_entrada_saida);
    	// Executar a consulta
    	$sql->execute();
    	// Pega os dados retornados
        // Como será retornado apenas UMA entrada e saída, usamos fetch.
    	$dados = $sql->fetch(PDO::FETCH_OBJ);
    	return $dados;
    }

    /**
     * Atualiza uma determinada entrada e saída
     *
     * @param array $dados   
     * @return int id - do ITEM
     * @example $Obj->editar($_POST);
     */
    public function editar(array $dados)
    {
        $sql = $this->pdo->prepare("UPDATE entrada_saida SET
            id_usuario = :id_usuario,
            id_kit = :id_kit,
            data_entrada = :data_entrada,
            data_saida = :data_saida             
        WHERE id_entrada_saida = :id_entrada_saida
        ");

        $id_usuario = $dados['id_usuario'];
        $id_kit = $dados['id_kit'];
        $data_entrada = $dados['data_entrada'];
        $data_saida = $dados['data_saida'];
        $id_entrada_saida = $dados['id_entrada_saida'];

        $sql->bindParam(':id_usuario', $id_usuario);  
        $sql->bindParam(':id_kit', $id_kit);
        $sql->bindParam(':data_entrada', $data_entrada);
        $sql->bindParam(':data_saida', $data_saida);
        $sql->bindParam(':id_entrada_saida', $id_entrada_saida);

        $sql->execute();
    }

    /**
     * Excluir entrada e saída
     *
     * @param integer $id_entrada_saida
     * @return void (esse metodo não retorna nada)
     */
    public function excluir(int $id_entrada_saida)
    {
        $sql = $this->pdo->prepare("DELETE FROM entrada_saida WHERE id_entrada_saida = :id_entrada_saida");

        $sql->bindParam(':id_entrada_saida', $id_entrada_saida);

        $sql->execute();
    }

 }

?>
