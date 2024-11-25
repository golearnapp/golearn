<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model {

	// Propriedades
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $nivel_acesso;

    // Getters e Setters
    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    
    // Salvar usuário
    public function salvar() {
        // Verifica se os campos obrigatórios estão preenchidos
        if (empty($this->__get('nome')) || empty($this->__get('email')) || empty($this->__get('senha'))) {
            throw new Exception("Nome, Email e Senha são obrigatórios.");
        }

        // Define o nível de acesso como 3 (Usuário Comum) se não for configurado
        if (empty($this->__get('nivel_acesso'))) {
            $this->__set('nivel_acesso', 3);
        }

        // Hash seguro para a senha
        $senhaHash = password_hash($this->__get('senha'), PASSWORD_DEFAULT);

        // Query para salvar o usuário
        $query = "INSERT INTO usuarios (nome, email, telefone, senha, nivel_acesso)
                  VALUES (:nome, :email, :telefone, :senha, :nivel_acesso)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':senha', $senhaHash); // Senha com hash seguro
        $stmt->bindValue(':nivel_acesso', $this->__get('nivel_acesso')); // Nível de acesso
        $stmt->execute();

        return $this;
    }
    
    public function validarCadastro() {
        // Validações básicas
        if (
            strlen($this->__get('nome')) < 3 || 
            !filter_var($this->__get('email'), FILTER_VALIDATE_EMAIL) || 
            strlen($this->__get('senha')) < 6
        ) {
            return false; // Dados inválidos
        }
        return true; // Dados válidos
    }
       
    //recuperar um usuário por e-mail
    public function getUsuarioPorEmail() {
        $query = "select nome, email from usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();
    
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Validação de credenciais (para login)
    public function autenticar() {
        $query = "SELECT id, nome, email, senha, nivel_acesso FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($usuario && password_verify($this->__get('senha'), $usuario['senha'])) {
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
            $this->__set('nivel_acesso', $usuario['nivel_acesso']);
        }

        return $this;
    }
    // Método para listar todos os usuários
    public function getAll() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } 

    // Atualiza o nível de acesso de um usuário
    public function atualizarNivelAcesso($idUsuario, $novoNivel)
    {   
        // Garantir que apenas um Administrador Geral exista
        if ($novoNivel == 3) {
            $query = "SELECT id FROM usuarios WHERE nivel_acesso = 3 AND id != :id LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->fetch()) {
                // Já existe um Administrador Geral diferente do atual
                return false;
            }
        }

        $query = "UPDATE usuarios SET nivel_acesso = :nivel_acesso WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nivel_acesso', $novoNivel);
        $stmt->bindValue(':id', $idUsuario);

        return $stmt->execute();
    }
}

?>