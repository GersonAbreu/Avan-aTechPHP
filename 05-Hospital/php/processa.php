<?php
function calcularIdadeDetalhada($dataNascimento) {
    // Cria um objeto DateTime com a data de nascimento
    $nascimento = new DateTime($dataNascimento);
    
    // Cria um objeto DateTime com a data atual
    $hoje = new DateTime();
    
    // Calcula a diferença entre a data atual e a data de nascimento
    $diferenca = $hoje->diff($nascimento);

    // Retorna os anos, meses e dias como uma string formatada
    return "Você tem " . $diferenca->y . " anos, " . 
    $diferenca->m . " meses,  " . 
    $diferenca->d . " dias e " . $diferenca->h . " horas, " . 
    $diferenca->h. "minutos e " . $diferenca->s . "segundos.";
}

// Exemplo de uso da função
$dataNascimento = "2008-08-29-00:30:00"; // Data de nascimento no formato AAAA-MM-DD
echo calcularIdadeDetalhada($dataNascimento);
?>