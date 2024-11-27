<?php if ($_SESSION['nivel_acesso'] >= 3): ?>
    <a href="/admin/usuarios">Gerenciar Usuários</a>
<?php endif; ?>

<?php if ($_SESSION['nivel_acesso'] >= 2): ?>
    <a href="/relatorios">Uplod dos Aquivos</a>
<?php endif; ?>
<?php
return [
    'apphome' => 1,
    'admin' => 3,
    'salvar_video' => 2,
    'alterar_nivel_acesso' => 3,
    'excluir_usuarios' => 3,
];
?>