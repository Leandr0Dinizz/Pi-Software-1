<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Kits</title>
    <link rel="stylesheet" href="css/Kits.css">
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>

<div class="input-group">
                <label for="dataNascimento">Selecione uma Data</label>
                <input type="date" id="dataNascimento" name="data_nascimento" class="modal-input" required>
            </div>

<section class="tabela">
    <table>
        <thead>
            <tr>
                <th>Kits</th>
                <th>Responsável</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aqui você pode adicionar suas linhas da tabela -->
        </tbody>
    </table>
</section>

<script src="funcoes.js" defer></script> <!-- Inclui o arquivo JavaScript -->
</body>
</html>
