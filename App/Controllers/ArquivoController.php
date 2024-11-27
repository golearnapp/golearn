<?php

namespace App\Controllers;

use App\Models\Arquivo;
use MF\Controller\Action;
use MF\Model\Container;

class ArquivoController extends Action {
    public function postararquivo() {
        session_start();

        // Verifica se o usuário é gestor
        if (!isset($_SESSION['nivel_acesso']) || $_SESSION['nivel_acesso'] != 2) {
            header('Location: /apphome?erro=acesso_negado');
            exit;
        }

        $caminhoPasta = 'uploads/';
        if (!is_dir($caminhoPasta)) {
            mkdir($caminhoPasta, 0755, true);
        }

        if (isset($_FILES['arquivo'])) {
            if ($_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
                $nomeArquivo = $_FILES['arquivo']['name'] ?? null;
                if (!$nomeArquivo) {
                    $_SESSION['mensagem'] = "Nenhum arquivo foi enviado.";
                    header('Location: /upload?erro=nenhum_arquivo');
                    exit;
                }

                $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
                $extensoesPermitidas = ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'mp4'];
                $mimeTypesPermitidos = [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/png',
                    'image/jpeg'
                ];

                // Validação da extensão e MIME type
                if (in_array($extensao, $extensoesPermitidas)) {
                    $nomeArquivo = $_FILES['arquivo']['name'];
                    $tipoArquivo = $_FILES['arquivo']['type']; // Captura o tipo de arquivo
                    $tamanhoArquivo = $_FILES['arquivo']['size']; // Captura o tamanho do arquivo            
                    $caminhoDestino = $caminhoPasta . uniqid() . '_' . basename($nomeArquivo);

                    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoDestino)) {
                        $arquivo = Container::getModel('Arquivo');

                        $dados = [
                            'nome_arquivo' => $nomeArquivo,
                            'caminho_arquivo' => $caminhoDestino,
                            'tipo_arquivo' => $tipoArquivo,
                            'tamanho_arquivo' => $tamanhoArquivo,
                            'enviado_por' => $_SESSION['id']
                        ];

                        if ($arquivo->salvar($dados)) {
                            $_SESSION['mensagem'] = "Arquivo enviado com sucesso!";
                            header('Location: /upload?sucesso=arquivo_enviado');
                        } else {
                            $_SESSION['mensagem'] = "Erro ao salvar as informações no banco de dados.";
                            header('Location: /upload?erro=salvar_falhou');
                        }
                    } else {
                        $_SESSION['mensagem'] = "Erro ao mover o arquivo para o destino.";
                        header('Location: /upload?erro=upload_falhou');
                    }
                } else {
                    $_SESSION['mensagem'] = "Extensão de arquivo não permitida.";
                    header('Location: /upload?erro=extensao_invalida');
                }
            } else {
                $_SESSION['mensagem'] = "Nenhum arquivo enviado ou houve um erro no upload.";
                header('Location: /upload?erro=nenhum_arquivo');
            }
        }
    }
}

