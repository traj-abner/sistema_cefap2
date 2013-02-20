<?php

class Usuario extends DataMapper {

	public $senha_conf;

	// @TODO alterar $senha_conf para private ou mesmo protected e implementar um setter
	public function setSenha_conf($senha_conf){
		$this->senha_conf = $senha_conf;
	}

	/* @TODO terminar validação
	 * @TODO encriptar senha (usando 'encrypt', a senha é criptografada e salva no banco. 
	 * Porém, o salt usado não é recuperado em $u->salt. Verificar necessidade de criar campo salt na tabela usuarios)
	*/ 
	public $validation = array(
	array(
			'field'	=> 'username',
			'label'	=> 'Username',
			'rules'	=> array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20)
	), // checar se username é único
	array(
			'field'	=> 'senha',
			'label'	=> 'Senha',
			'rules'	=> array('required', 'trim', 'min_length' => 6)
	),
	array(
						'field'	=> 'senha_conf',
						'label'	=> 'Redigite a Senha',
						'rules'	=> array('matches'=>'senha')
				),
				array(
						'field'	=> 'nome',
						'label'	=> 'Nome',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'sobrenome',
						'label'	=> 'Sobrenome',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'endereco',
						'label'	=> 'Endereço',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'cep',
						'label'	=> 'CEP',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'cidade',
						'label'	=> 'Cidade',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'uf',
						'label'	=> 'UF',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'instituicao',
						'label'	=> 'Instituição',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'departamento',
						'label'	=> 'Departamento',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'telefone',
						'label'	=> 'Telefone',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'celular',
						'label'	=> 'Celular',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'data_nascimento',
						'label'	=> 'Data de Nascimento',
						'rules'	=> array('required')
				),
				array(
						'field'	=> 'cpf',
						'label'	=> 'CPF',
						'rules'	=> array('required', 'trim',' unique')
				),
				array(
						'field'	=> 'email',
						'label'	=> 'E-mail',
						'rules'	=> array('required', 'trim', 'valid_email', 'unique')
				),
				array(
						'field'	=> 'tipo',
						'label'	=> 'Tipo',
						'rules'	=> array('required')
				)
		);

    // Insert related models that User can have just one of.
    public $has_one = array(
    			'conta' => array(
    						'class' 		=> 'conta',
    						'other_field'	=> 'usuario'
    					),
    			
    		);
    
    // Insert related models that User can have more than one of.
    // @TODO testar e adicionar parâmetros das relações mais complexas, como em 'fclts_coordenadas'
	public $has_many = array(
		'projeto' => array(
			'class' => 'projeto',
			'other_field' => 'usuario',
			'join_self_as' => 'usuario',
			'join_other_as' => 'projeto',
			'join_table' => 'projetos_usuarios'
		),
		'mensagem' => array(
			'class' => 'mensagem',
			'other_field' => 'usuario',
		),
		'facility' => array(
			'class' => 'facility',
			'other_field' => 'usuario',
			'join_self_as' => 'usuario',
			'join_other_as' => 'facility',
			'join_table' => 'facilities_usuarios'
		),
		'log' => array (
			'class' => 'log',
			'other_field' => 'usuario',
		),
		
		'agendamentos' => array (
			'class' => 'agendamento',
			'other_field' => 'usuario'
		),
		'respostas' => array (
			'class' => 'resposta',
			'other_field' => 'usuario'
		),
		'boleto' => array (
			'class' => 'boleto',
			'other_field' => 'usuario'
		)
	);
	
	public function login() {
        // Create a temporary user object
        $u = new Usuario();
        
        $uName = $this->username;

        // Get this users stored record via their username
        $u->where('username', $this->username)->get();

        // Give this user their stored salt
        $this->salt = $u->salt;

        // Validate and get this user by their property values,
        // this will see the 'encrypt' validation run, encrypting the password with the salt
        $this->validate()->get();

        // If the username and encrypted password matched a record in the database,
        // this user object would be fully populated, complete with their ID.

        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($this->id) || ($u->status != STATUS_USUARIO_ATIVO)) {
            // Login failed, so set a custom error message
            $this->error_message('login', 'Username ou senha inválido');

            $this->username = $uName;
            
            return FALSE;
        } else {
            // Login succeeded
            return TRUE;
        }
    }

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
	public function _encrypt($field) {
        // Don't encrypt an empty string
        if (!empty($this->{$field})) {
            // Generate a random salt if empty
            if (empty($this->salt)) {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }
   
   }

?>