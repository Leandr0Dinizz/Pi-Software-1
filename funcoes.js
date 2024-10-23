// Seleciona os elementos dos modais
const modalRetirar = document.getElementById('modalRetirar');
const modalDevolver = document.getElementById('modalDevolver');
const modalCadastrarKit = document.getElementById('modalCadastrarKit');
const modalAtualizarDados = document.getElementById('modalAtualizarDados');
const modalCadastrarDocente = document.getElementById('modalCadastrarDocente');

const btnRetirar = document.getElementById('btnRetirar');
const btnDevolver = document.getElementById('btnDevolver');
const btnMenu = document.getElementById('btnMenu');
const menu = document.getElementById('menu');
const closeMenu = document.getElementById('btnFecharMenu');

// Função para abrir um modal
function abrirModal(modal) {
    if (modal) modal.style.display = 'flex';
}

// Função para fechar um modal
function fecharModal(modal) {
    if (modal) modal.style.display = 'none';
}

// Função para fechar o modal ao clicar fora do conteúdo
function fecharModalSeClicarFora(event, modal) {
    if (event.target === modal) {
        fecharModal(modal);
    }
}

// Abre o menu
btnMenu.onclick = function() {
    menu.style.display = 'block';
};

// Fecha o menu
closeMenu.onclick = function() {
    menu.style.display = 'none';
};

// Fecha o menu ao clicar fora dele
window.onclick = function(event) {
    if (event.target === menu) {
        menu.style.display = 'none';
    }

    // Verifica se o clique foi fora dos modais
    fecharModalSeClicarFora(event, modalRetirar);
    fecharModalSeClicarFora(event, modalDevolver);
    fecharModalSeClicarFora(event, modalCadastrarKit);
    fecharModalSeClicarFora(event, modalAtualizarDados);
    fecharModalSeClicarFora(event, modalCadastrarDocente);
};

// Abre o modal correspondente ao clicar nas opções do menu
document.getElementById('btnCadastrarKitModal').onclick = function() {
    document.getElementById('modalCadastrarDocente').style.display = "flex"; // Usa flex para centralizar
    fecharModal(menu); // Fecha o menu
    abrirModal(modalCadastrarKit);
};

document.getElementById('btnCadastrarDocenteModal').onclick = function() {
    document.getElementById('modalCadastrarDocente').style.display = "none";
    fecharModal(menu); // Fecha o menu
    abrirModal(modalCadastrarDocente);
};

document.getElementById('btnAtualizarDadosModal').onclick = function() {
    fecharModal(menu); // Fecha o menu
    abrirModal(modalAtualizarDados);
};

// Abre o modal de retirar
if (btnRetirar) {
    btnRetirar.onclick = function() {
        abrirModal(modalRetirar);
    };
}

// Abre o modal de devolver
if (btnDevolver) {
    btnDevolver.onclick = function() {
        abrirModal(modalDevolver);
    };
}

// Fecha os modais e menu ao clicar no "x"
const closeRetirar = document.getElementById('closeRetirar');
const closeDevolver = document.getElementById('closeDevolver');
const closeModalKit = document.getElementById('closeCadastrarKit');
const closeAtualizarDados = document.getElementById('closeAtualizarDados');
const closeCadastrarDocente = document.getElementById('closeCadastrarDocente');

if (closeRetirar) {
    closeRetirar.onclick = function() {
        fecharModal(modalRetirar);
    };
}

if (closeDevolver) {
    closeDevolver.onclick = function() {
        fecharModal(modalDevolver);
    };
}

if (closeModalKit) {
    closeModalKit.onclick = function() {
        fecharModal(modalCadastrarKit);
    };
}

if (closeAtualizarDados) {
    closeAtualizarDados.onclick = function() {
        fecharModal(modalAtualizarDados);
    };
}

if (closeCadastrarDocente) {
    closeCadastrarDocente.onclick = function() {
        fecharModal(modalCadastrarDocente);
    };
};

// Garante que todos os modais estejam fechados ao carregar a página
window.onload = function() {
    fecharModal(modalRetirar);
    fecharModal(modalDevolver);
    fecharModal(modalCadastrarKit);
    fecharModal(modalAtualizarDados);
    fecharModal(modalCadastrarDocente);
    menu.style.display = 'none'; // Garante que o menu esteja fechado
};



