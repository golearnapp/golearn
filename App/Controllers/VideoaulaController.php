<?php
namespace App\Controllers;

use App\Models\Videoaula;
use MF\Controller\Action;
use MF\Model\Container;

class VideoaulaController extends Action {

    public function salvar() {

        
        session_start();
        

    
        // Verifica se o usuário é gestor
        if ($_SESSION['nivel_acesso'] != 2) {
            header('Location: /apphome?erro=acesso_negado');
            exit;
        }

        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
            $allowedTypes = ['video/mp4', 'video/avi', 'video/mpeg'];
            if (!in_array($_FILES['video']['type'], $allowedTypes)) {
                die("Formato de arquivo inválido.");
            }
    
            $uploadFile = $uploadDir . uniqid() . "_" . basename($_FILES['video']['name']);
            if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadFile)) {
                $videoaula = Container::getModel('Videoaula');
    
                // Sanitização de entrada
                $titulo = htmlspecialchars($_POST['titulo'], ENT_QUOTES, 'UTF-8');
                $descricao = isset($_POST['descricao']) ? htmlspecialchars($_POST['descricao'], ENT_QUOTES, 'UTF-8') : '';
                $id_usuario = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;
    
                // Salvando no banco
                $videoaula->titulo = $titulo;
                $videoaula->descricao = $descricao;
                $videoaula->caminho = $uploadFile;
                $videoaula->id_usuario = $id_usuario;
    
                if ($videoaula->salvar()) {
                    $_SESSION['mensagem'] = "Vídeo salvo com sucesso.";
                } else {
                    $_SESSION['mensagem'] = "Erro ao salvar os dados no banco de dados.";
                }
            } else {
                $_SESSION['mensagem'] = "Erro ao mover o arquivo.";
            }
        } else {
            $_SESSION['mensagem'] = "Nenhum arquivo enviado ou houve erro no upload.";
        }

        // Redirecione para a página de upload
    header('Location: /uplod');
    exit;
    }

    public function listar()
    { 

        AuthMiddleware::isAuthenticated(); // Todos os usuários autenticados 

        $videoaula = Container::getModel('Videoaula');
        $videos = $videoaula->listarTodos(); 

        $this->view->videos = $videos; 

        $this->render('listar_videoaulas', 'layout2'); 

    } 

} 

 
    
