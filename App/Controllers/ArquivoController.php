<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;

class ArquivoController extends Action {
    public function postarArquivo() {
        session_start();
    
        // Verifica se o usuário é gestor
        if ($_SESSION['nivel_acesso'] != 2) {
            header('Location: /apphome?erro=acesso_negado');
            exit;
        }
    
        // Verifica se um arquivo foi enviado
        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
            $nomeArquivo = $_FILES['arquivo']['name'];
            $caminhoDestino = 'uploads/' . uniqid() . '_' . $nomeArquivo;
    
            // Move o arquivo para o diretório final
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoDestino)) {
                // Salva as informações do arquivo no banco
                $arquivo = Container::getModel('Arquivo');
                $arquivo->salvar([
                    'nome_arquivo' => $nomeArquivo,
                    'caminho_arquivo' => $caminhoDestino,
                    'enviado_por' => $_SESSION['id']
                ]);
    
                header('Location: /apphome?sucesso=arquivo_enviado');
            } else {
                header('Location: /apphome?erro=upload_falhou');
            }
        } else {
            header('Location: /apphome?erro=nenhum_arquivo');
        }
    }
    
}