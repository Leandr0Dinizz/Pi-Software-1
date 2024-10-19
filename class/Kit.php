<?php

class Kit {

    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    }

    /**
     * Listar todos os kits
     * @return array
     * @example $variavel = $Obj->listar()
     */
    public function listar(){
        $sql = $this->pdo->prepare('SELECT * FROM kits');        
        $sql->execute();
    
        $dados = $sql->fetchAll(PDO::FETCH_OBJ);
    
        // Retorna os dados como JSON
        return $dados;
    }      

    /**
     * Cadastrar um novo kit
     * @param array $dados    
     * @return int
     * @example $Obj->cadastrar($_POST);
     * 
     */
    public function cadastrarKit(array $dados)
    {
        $sql = $this->pdo->prepare('INSERT INTO kits 
                                    (n_sala, situacao, descricao)
                                    VALUES
                                    (:n_sala, :situacao, :descricao)
                                ');

        $n_sala = $dados['n_sala'];
        $situacao = 1;
        $descricao = $dados['descricao'];

        $sql->bindParam(':n_sala', $n_sala);
        $sql->bindParam(':situacao', $situacao);
        $sql->bindParam(':descricao', $descricao);
        $sql->execute();

        echo ("<script>alert('Kit ".$dados['n_sala']." cadastrado com sucesso')</script>");
    }

    /**
     * Retorna os dados de um kit
     * @param int $id_kit
     * @return object
     * @example $variavel = $Obj->mostrar($id_kit);
     */
    public function mostrar(int $id_kit)
    {
    	// Montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM kits WHERE id_kit = :id_kit LIMIT 1');
        $sql->bindParam(':id_kit', $id_kit);
    	// Executar a consulta
    	$sql->execute();
    	// Pega os dados retornados
        // Como será retornado apenas UM kit, usamos fetch.
    	$dados = $sql->fetch(PDO::FETCH_OBJ);
    	return $dados;
    }

    /**
     * Atualiza um determinado kit
     *
     * @param array $dados   
     * @return int id - do ITEM
     * @example $Obj->editar($_POST);
     */
    public function editar(array $dados)
    {
        $sql = $this->pdo->prepare("UPDATE kits SET
            n_sala = :n_sala             
        WHERE id_kit = :id_kit
        ");

        $n_sala = $dados['n_sala'];
        $id_kit = $dados['id_kit'];

        $sql->bindParam(':n_sala', $n_sala);  
        $sql->bindParam(':id_kit', $id_kit);

        $sql->execute();
    }

    /**
     * Excluir kit
     *
     * @param integer $id_kit
     * @return void (esse metodo não retorna nada)
     */
    public function excluir(int $id_kit)
    {
        $sql = $this->pdo->prepare("DELETE FROM kits WHERE id_kit = :id_kit");

        $sql->bindParam(':id_kit', $id_kit);

        $sql->execute();
    }

 }

?>
