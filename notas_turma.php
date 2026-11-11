<?php
// Atividade: PHP com MySQL
// Resumo simples das notas de uma turma de 5 alunos

// 1) Array com o nome do aluno e a nota obtida
$alunos = [
    "Ana Beatriz"   => 8.5,
    "Bruno Costa"   => 6.0,
    "Carla Dias"    => 4.5,
    "Diego Martins" => 7.2,
    "Elisa Rocha"   => 5.5,
];

// 2) Contadores de cada situação
$aprovado   = 0;
$recuperacao = 0;
$reprovado  = 0;

// 3) Tabela de situação de cada aluno
$linhas = "";

// 4) Laço foreach percorrendo o array de notas
foreach ($alunos as $nome => $nota) {

    // 5) Estruturas condicionais classificando a nota
    if ($nota >= 7.0) {
        $situacao = "Aprovado";
        $cor = "#1e7d32";
        $aprovado++;
    } elseif ($nota >= 5.0) {
        $situacao = "Recuperação";
        $cor = "#c77700";
        $recuperacao++;
    } else {
        $situacao = "Reprovado";
        $cor = "#c62828";
        $reprovado++;
    }

    $linhas .= "<tr><td>" . htmlspecialchars($nome) . "</td>"
             . "<td>" . number_format($nota, 1, ',', '.') . "</td>"
             . "<td style='color:" . $cor . ";font-weight:bold;'>" . $situacao . "</td></tr>";
}

$total = count($alunos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo de Notas da Turma</title>
    <style>
        body { font-family: "Segoe UI", Arial, sans-serif; background: #f4f6fa; color: #22303f; padding: 30px; }
        .caixa { max-width: 620px; margin: 0 auto; background: #fff; border-radius: 12px; padding: 28px; box-shadow: 0 4px 14px rgba(0,0,0,.08); }
        h1 { font-size: 1.4rem; color: #1b4a8a; margin-bottom: 18px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 22px; }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #e3e8f0; }
        th { background: #1b4a8a; color: #fff; }
        .resumo { display: flex; gap: 14px; flex-wrap: wrap; }
        .item { flex: 1; min-width: 130px; background: #f4f6fa; border-radius: 10px; padding: 16px; text-align: center; }
        .item span { display: block; font-size: 1.8rem; font-weight: bold; }
        .ap { color: #1e7d32; } .rc { color: #c77700; } .rp { color: #c62828; }
        .nota { margin-top: 20px; font-size: .92rem; color: #555; border-top: 1px dashed #ccc; padding-top: 14px; }
    </style>
</head>
<body>
    <div class="caixa">
        <h1>Resumo de Notas da Turma (<?php echo $total; ?> alunos)</h1>

        <table>
            <thead>
                <tr><th>Aluno</th><th>Nota</th><th>Situa&ccedil;&atilde;o</th></tr>
            </thead>
            <tbody>
                <?php echo $linhas; ?>
            </tbody>
        </table>

        <div class="resumo">
            <div class="item"><span class="ap"><?php echo $aprovado; ?></span>Aprovados</div>
            <div class="item"><span class="rc"><?php echo $recuperacao; ?></span>Recupera&ccedil;&atilde;o</div>
            <div class="item"><span class="rp"><?php echo $reprovado; ?></span>Reprovados</div>
        </div>
    </div>
</body>
</html>
