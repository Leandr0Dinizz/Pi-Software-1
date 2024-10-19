<?php
    include('../class/classes.php');
    
    $Kit = new Kit();
        
    if(isset($_POST['btnCadastrar'])){
        $Kit->cadastrarKit($_POST);
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Kits</title>
    <link rel="stylesheet" href="../css/Kits.css">
    <link rel="stylesheet" href="../css/modal.css">
    <script src="../funcoes.js" defer></script>
</head>
<body>

<section class="barra-status">
    <div class="status-box" role="status">Disponíveis</div>
    <div class="status-box" role="status">Indisponíveis</div>
</section>

   

<section class="cadastro-kit">
    <button class="botao-cadastrar" id="btnMenu">Menu</button>
    <div id="menu" class="menu oculto">
        <button class="botao-fechar" id="btnFecharMenu">&times;</button>
        <ul>
            <li><a href="#" id="btnCadastrarKitModal">Cadastrar Kit</a></li>
            <li><a href="#" id="btnCadastrarDocenteModal">Cadastrar Docente</a></li>
            <li><a href="#" id="btnAtualizarDadosModal">Atualizar Dados</a></li>
        </ul>
    </div>
</section>



<div id="modalCadastrarKit" class="modal" role="dialog" aria-labelledby="text-cadastrar-kit" aria-modal="true">
    <div class="modal-content">
        <span class="close" id="closeCadastrarKit" aria-label="Fechar">&times;</span>
        <h2 id="text-cadastrar-kit">Cadastrar Kit</h2>
        <form method="POST" action="?" id="cadastrar-kit-form">
            <div class="input-group">
                <label for="kitNome">Número do Kit:</label>
                <input type="text" id="kitNome" name="n_sala" class="modal-input" placeholder="Número do Kit" required>
            </div>
            <div class="input-group">
                <label for="kitDescricao">Descrição:</label>
                <input type="text" id="kitDescricao" name="descricao" class="modal-input" placeholder="Descrição" required>
            </div>
            <button type="submit" name="btnCadastrar" class="modal-button">Cadastrar</button>
        </form>
    </div>
</div>


<div id="modalCadastrarDocente" class="modal">
    <div class="modal-content">
        <span class="close" id="closeCadastrarDocente">&times;</span>
        <h2>Cadastrar Docente</h2>
        <form id="cadastrar-docente-form">
            <div class="input-group">
                <label for="nomeDocente">Nome:</label>
                <input type="text" id="nomeDocente" class="modal-input" placeholder="Nome" required>
            </div>
            <div class="input-group">
                <label for="cpfDocente">CPF:</label>
                <input type="text" id="cpfDocente" class="modal-input" placeholder="CPF" required>
            </div>
            <button type="submit" class="modal-button">Cadastrar</button>
        </form>
    </div>
</div>


<div id="modalAtualizarDados" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAtualizarDados">&times;</span>
        <h2>Atualizar Dados</h2>
        <form id="atualizar-dados-form">
            <!-- Campos do formulário aqui -->
            <div class="input-group">
                <label for="campo1">Campo 1:</label>
                <input type="text" id="campo1" class="modal-input" placeholder="Campo 1" required>
            </div>
            <button type="submit" class="modal-button">Atualizar</button>
        </form>
    </div>
</div>




<section class="secao-busca">
    <input type="text" class="input-busca" placeholder="Buscar..." aria-label="Campo de busca">
    <button class="botao-busca" type="button">BUSCAR</button>
</section>

<section class="tabela">
    <table>
        <thead>
            <tr>
                <th>Kits</th>
                <th>Responsável</th>
                <th>Situação</th>
            </tr>
        </thead>
    </table>
</section>


    <div class="botao-status">
        <button class="status-box2" id="btnRetirar" type="button">Retirar</button>
        <button class="status-box2" id="btnDevolver" type="button">Devolver</button>
    </div>
</section>

<!-- Modal para Retirar Kit -->
<div id="modalRetirar" class="modal" role="dialog" aria-labelledby="text-retirar" aria-modal="true">
    <div class="modal-content">
        <span class="close" id="closeRetirar" aria-label="Fechar">&times;</span>
        <h2 id="text-retirar">Retirar Kit</h2>
        <form id="retirar-form">
            <div class="input-group">
                <label for="telefone">Nº Registro:</label>
                <input type="text" id="telefone" class="modal-input" placeholder="Nº Registro" required>
            </div>
            <div class="input-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="modal-input" placeholder="Nome" required>
            </div>
            <div class="input-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" class="modal-input" placeholder="CPF" required>
            </div>
            <div class="input-group">
                <label for="observacoes">Observações:</label>
                <input type="text" id="observacoes" class="modal-input" placeholder="Observações">
            </div>
            <button type="submit" class="modal-button">Confirmar</button>
        </form>
    </div>
</div>

<!-- Modal para Devolver Kit -->
<div id="modalDevolver" class="modal" role="dialog" aria-labelledby="text-devolver" aria-modal="true">
    <div class="modal-content">
        <span class="close" id="closeDevolver" aria-label="Fechar">&times;</span>
        <h2 id="text-devolver">Devolver Kit</h2>
        <form id="devolver-form">
            <div class="input-group">
                <label for="nRegistro">Nº Registro:</label>
                <input type="text" id="nRegistro" class="modal-input" placeholder="Nº Registro" required>
            </div>
            <div class="input-group">
                <label for="nomeDevolver">Nome:</label>
                <input type="text" id="nomeDevolver" class="modal-input" placeholder="Nome" required>
            </div>
            <div class="input-group">
                <label for="cpfDevolver">CPF:</label>
                <input type="text" id="cpfDevolver" class="modal-input" placeholder="CPF" required>
            </div>
            <div class="input-group">
                <label for="observacoesDevolver">Observações:</label>
                <input type="text" id="observacoesDevolver" class="modal-input" placeholder="Observações">
            </div>
            <button type="submit" class="modal-button">Confirmar Devolução</button>
        </form>
    </div>
</div>

<footer class="rodape">
    <p>Imagens meramente ilustrativas. Copyright 2024 © Axo Solution's Todos os direitos reservados.</p>
</footer>

</body>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        
    </script>
</html>
