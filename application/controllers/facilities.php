<?php

class Facilities extends CI_Controller {
    
    public function __constructor(){
        
        parent::__construct();
        // if user is NOT logged in...
        if ( ! $this->session->userdata('logged_in')) {
            // initialize user role with FALSE;
                $this->uRole = FALSE;
        }
        // else, user is logged in...
        else {
            $u = new Usuario();
            $u->select('credencial')->where('id', $this->session->userdata('id'))->get();
            // initialize user role with proper value
            $this->uRole = $u->credencial;
        }
        
    }
    
    public function index(){
        
        redirect('facilities/listar');
    }
	  
    public function listar(){
        
        //COMUM: apenas facilities com o status "ATIVO";
        //ADMINISTRADOR: apenas com status "ATIVO" e "INATIVO";
        //SUPERADMINISTRADOR: sÃ£o mostradas tambÃ©m as facilities com o status "EXCLUÃ�DO", permitindo que sejam ativadas novamente. Mostrar botÃ£o "adicionar" no topo da pÃ¡gina;
        //A opÃ§Ã£o de reativar uma facility inativa sÃ³ Ã© mostrada se o usuÃ¡rio logado estiver associado Ã  facility como um de seus gestores (esta opÃ§Ã£o Ã© configurÃ¡vel para cada facility).
        
        $total = $this->db->count_all("facilities");

        if ($total > 0 ){
            $order = $this->uri->segment(3, 'id'); #ordena de acordo com a opÃ§Ã£o escolhida pelo usuÃ¡rio
            $limit = $this->uri->segment(4, 5); #limite de resultados por pÃ¡gina
            $npage = $this->uri->segment(5, 1); //nÃºmero da pÃ¡gina 
            $exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.


            if($limit == 'usuarios' && $npage == 'adicionar'){
                redirect('usuarios/adicionar');
            }


            $offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a pÃ¡gina que o usuÃ¡rio clicar
            if($offset < 0){
                $offset = 0;
            }                    
            $fclt = new Facility();
			
            $u = $this->session->userdata('credencial');
            
            switch ($u){
                
                case CREDENCIAL_USUARIO_COMUM :
                    $fclt->select('id, nome, tipo_agendamento,  arquivos, status')->where('status',STATUS_FACILITIES_ATIVO)->limit($limit, $offset);
                break;
                case CREDENCIAL_USUARIO_SUPERADMIN :
                    $fclt->select('id, nome, tipo_agendamento,  arquivos, status')->limit($limit, $offset);
                break;
                //usuÃ¡rio com a credencial de admin nÃ£o poderÃ¡ ver a lista de usuÃ¡rios excluÃ­dos.
                case CREDENCIAL_USUARIO_ADMIN :
                    $fclt->select('id, nome, tipo_agendamento,  arquivos, status')->limit($limit, $offset)->where_not_in('status', STATUS_FACILITIES_EXCLUIDO)->limit($limit, $offset); 
                break;
				
				
                }
            //ordena de acordo com a opÃ§Ã£o que o usuÃ¡rio escolher    
            if(empty($order)){
                $fclt->order_by('id', $exib);

            }else{
                $fclt->order_by($order, $exib);
            }
			$i=0;
			

            $fclt->get();
			
			$cd = new Usuario();
			$cd->select('credencial')->where('id', $this->session->userdata('id'))->get();
			$data['uRole'] = $cd->credencial;
            $data['img'] = $order;
            $data['fclts'] = $fclt; 
            $data['limit'] = $limit;
            $data['offset'] = $offset;
            $data['perpage'] = $npage;

        }else{
            $data['msg'] = '<strong>Nenhum usuÃ¡rio encontrado.</strong>';
            $data['msg_type'] = 'alert-block';
        }     

        /* PAGINAÃ‡ÃƒO */
            $pagination = $total / $limit;
			$page = ceil($pagination);
			if ($npage > $page):
				redirect('facilities/listar/'.$order.'/'.$limit.'/'.$page.'/'.$exib);
			endif;
            $links = "";
			if ($npage > $page)
					{
						$buttonArray[2] = '#';
						$buttonArray[3] = '#';
					}
            for($i = 1; $i <= $page; $i++){
                $order = $this->uri->segment(3, 'id');

                $url = base_url("facilities/listar/$order/$limit/$i");
                $links .= "<a href='$url'>[ $i ]</a>&nbsp;";   
				$urlarray[$i-1]=$url;
							if ($i == 1) 
							{
								$buttonArray[0] = $url;
								$buttonArray[1] = '#';
							}
							if ($i >= 1) 
									if ($i == $npage - 1):
										$buttonArray[1] = $url;
									endif;
							else
								$buttonArray[1] = '#';
							if ($i <= $page)
							{
									if ($i == $npage): $buttonArray[2] = '#'; endif;
									if ($i == $npage + 1): $buttonArray[2] = $url; endif;
							}
							else
								$buttonArray[2] = '#';
							if ($i == $page) 
							{
								$buttonArray[3] = $url;
							}
                }    
				$data['buttonArray'] = $buttonArray;
				$data['urlarray'] = $urlarray;  
                $data['page'] =  $links;
                
                $partial = $offset+1 ." a ";
                if (($npage * $limit) > $total):
                $partial .= $total;
                else:
                $partial .= $npage * $limit;
                endif;
                $data['buttonArray'] = $buttonArray;
                $data['urlarray'] = $urlarray;
                $data['page'] = "Exibindo registros " . $partial . " de " . $total . " | P&aacute;ginas: " . $links;
         /*END PAGINAÃ‡ÃƒO*/     
		$data['uID'] = $this->session->userdata('id');
        $data['title'] = 'Lista de Facilities';
        $this->load->view('facilities_listar',$data);
    }
    
    public function adicionar(){
        
        
        // default view
        $view = 'facilities_adicionar';
		$check = '';
		$fclt = new Facility();
        if($this->input->post('submit')){

                $cd = new Usuario();
			
                $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
                
                $fclt->nome_abreviado	= $post['nomeabrev'];
                $fclt->nome             = $post['nome_completo'];
                $fclt->descricao	= $post['descricao'];
                $fclt->status		= STATUS_FACILITIES_ATIVO;		# status padrÃ£o para novas facilities
                $fclt->tipo_agendamento	= $post['tipo_agendamento'];		# @TODO use case datas de agendamento (TIPO_AGENDAMENTO_AGENDA) - implementar google calendar ou similar

				$usrs = explode(',',$post['hidden_selecionador_administradores']);
				
                $cd->where_in('id',$usrs)->get();
                
                if( !$fclt->save_usuario($cd->all) ) { 
				
                    $data['msg'] = $fclt->error->string;;
                    $data['msg_type'] = 'error';	
				
                }else {
                    $data['msg'] = 'Nova alteraÃ§Ã£o da facility ' .$fclt->nome_abreviado. ' efetuada  com sucesso!';
                    $data['msg_type'] = 'alert-success';
                }
        }

        $data['title'] = 'Cadastro de Facility';
        $this->load->view($view, $data);
    }
	
	public function inativar(){
        
        
        // default view
        $fclt = new Facility();
        $fclt->where('id', $this->uri->segment(3))->get();
        $data['fclt'] = $fclt;
        		$fclt->status = STATUS_FACILITIES_INATIVO;
                if( !$fclt->save() ) { 
				
                    $data['msg'] = $fclt->error->string;;
                    $data['msg_type'] = 'error';	
				
                }else {
                    $data['msg'] = 'Inativa&ccedil;&atilde;o da facility ' .$fclt->nome_abreviado. ' efetuada  com sucesso!';
                    $data['msg_type'] = 'alert-success';
                }
			redirect(base_url('facilities/listar',$data));
    }
	
	public function ativar(){
        
        
        // default view
        $fclt = new Facility();
        $fclt->where('id', $this->uri->segment(3))->get();
        $data['fclt'] = $fclt;
        
				$fclt->status = STATUS_FACILITIES_ATIVO;
                if( !$fclt->save() ) { 
				
                    $data['msg'] = $fclt->error->string;;
                    $data['msg_type'] = 'error';	
				
                }else {
                    $data['msg'] = 'Ativa&ccedil;&atilde;o da facility ' .$fclt->nome_abreviado. ' efetuada  com sucesso!';
                    $data['msg_type'] = 'alert-success';
                }
			redirect(base_url('facilities/listar',$data));
    }
    //@todo
    public function editar(){
        $agn_all = new Agendamento();
		$agn_all->include_related('facilities')->include_related('usuario')->include_related('projeto')->where('facility_id',$this->uri->segment(3))->get();
		$data['agn'] = $agn_all;
		
        $fclt = new Facility();
        $fclt->where('id', $this->uri->segment(3))->get();
        $data['fclt'] = $fclt;
        if($this->input->post('submit')){
				$cd = new Usuario();
				$ft = new Facility();
                $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
                
                $fclt->nome_abreviado	= $post['nomeabrev'];
                $fclt->nome             = $post['nome_completo'];
                $fclt->descricao	= $post['descricao'];
                $fclt->tipo_agendamento	= $post['tipo_agendamento'];		
				$fclt->status	= $post['status'];
				$usrs = explode(',',$post['hidden_selecionador_administradores']);
				
                $cd->where_in('id',$usrs)->get();
          
               if( !$fclt->save_usuario($cd->all) ) {
				
                    $data['msg'] = $fclt->error->string;;
                    $data['msg_type'] = 'error';	
				
                }else {
                    $data['msg'] = 'Altera&ccedil;&atilde;o na facility ' .$fclt->nome_abreviado. ' efetuada com sucesso!';
                    $data['msg_type'] = 'alert-success';
                }
        }
        
        $data['uRole'] = $this->session->userdata('credencial');
		
        $data['title'] = 'Editar Facilities';
		
        $this->load->view('facilities_editar', $data);
    }
    
    public function alterar_status(){
        
        
    }
    
    public function ver(){
        
        $id = $this->uri->segment(3);
        
        $fclt = new Facility();
        $fclt->where('id', $id);
        $fclt->get();
        $data['uID'] = $this->session->userdata('id'); 
        $data['fclt'] = $fclt;
		
        
        $this->load->view('facilities_ver', $data);
    }
    
    public function excluir(){
        
            
        // default view
        $fclt = new Facility();
        $fclt->where('id', $this->uri->segment(3))->get();
        $data['fclt'] = $fclt;
        
				$fclt->status = STATUS_FACILITIES_EXCLUIDO;
                if( !$fclt->save() ) { // error on save
				
                    $data['msg'] = $fclt->error->string;;
                    $data['msg_type'] = 'error';	
				
                }else {
                    $data['msg'] = 'Inativa&ccedil;&atilde;o da facility ' .$fclt->nome_abreviado. ' efetuada  com sucesso!';
                    $data['msg_type'] = 'alert-success';
                }
			redirect(base_url('facilities/listar',$data));
    }
    
    public function extrato(){
    	$usr = new Usuario();
    	$usr->get_by_id($this->session->userdata('id'));
    	$data['usr'] = $usr;
    	
    	$data['msg'] = '';
    	$data['title'] = 'Extrato de Utilização de Facility';
    	
    	$agn = new Agendamento();
    	$data['agn'] = $agn;
    	
    	$fcl = new Facility();
    	$fcl->include_related('usuarios')->get_by_id($this->uri->segment(3));
    	$data['fcl'] = $fcl;
    	
    	$i=0;
    	foreach ($fcl as $fl):
    		$admins[$i] = $fl->usuario_nome . ' ' . $fl->usuario_sobrenome;
    		$i++;
    	endforeach;
    	$admin = implode(', ',$admins);
    	$data['admins'] = $admin;
    	
    	$lcn = new Lancamento();
    	$lcn->include_related('usuarios')->where('facility_id',$fcl->id)->order_by('modified','ASC')->get();
    	$data['lcn'] = $lcn;
    	
    	
    	$lcn_sm = new Lancamento();
    	$lcn_sm->select_sum('valor','soma')->where('facility_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
    	$data['credit'] = $lcn_sm->soma;
    	
    	$lcn_sm->select_sum('valor','soma')->where('facility_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
    	$data['debit'] = $lcn_sm->soma;
    	
    	$data['cashout'] = $data['credit'] - $data['debit'];
    	
    	
    	$this->load->view('facilities_extrato', $data);
        
    }
    
    public function extrato_pdf(){
    	$usr = new Usuario();
    	$usr->get_by_id($this->session->userdata('id'));
    	$data['usr'] = $usr;
    	 
    	$data['msg'] = '';
    	$data['title'] = 'Extrato de Utilização de Facility';
    	 
    	$agn = new Agendamento();
    	$data['agn'] = $agn;
    	 
    	$fcl = new Facility();
    	$fcl->include_related('usuarios')->get_by_id($this->uri->segment(3));
    	$data['fcl'] = $fcl;
    	 
    	$i=0;
    	foreach ($fcl as $fl):
    	$admins[$i] = $fl->usuario_nome . ' ' . $fl->usuario_sobrenome;
    	$i++;
    	endforeach;
    	$admin = implode(', ',$admins);
    	$data['admins'] = $admin;
    	 
    	$lcn = new Lancamento();
    	$lcn->include_related('usuarios')->where('facility_id',$fcl->id)->order_by('modified','ASC')->get();
    	$data['lcn'] = $lcn;
    	 
    	 
    	$lcn_sm = new Lancamento();
    	$lcn_sm->select_sum('valor','soma')->where('facility_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
    	$data['credit'] = $lcn_sm->soma;
    	 
    	$lcn_sm->select_sum('valor','soma')->where('facility_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
    	$data['debit'] = $lcn_sm->soma;
    	 
    	$data['cashout'] = $data['credit'] - $data['debit'];
    	 
    	 
    	$this->load->view('facilities_extrato_pdf', $data);
        
    }
    
    public function editar_agenda(){
		$options = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$code = "";
		$length = 32;
		for($i = 0; $i < $length; $i++):
			$key = rand(0, strlen($options) - 1);
			$code .= $options[$key];
		endfor;
        $data['title'] = 'Editar Agenda';
		if ($this->session->userdata('credencial') == CREDENCIAL_USUARIO_COMUM):
			redirect('main');
		endif;
		
		
		
		$fcl = new Facility();
		$data['found'] = true;
		if (!$fcl->get_by_id($this->uri->segment(3)) or $this->uri->segment(3) == ''):
			$data['msg'] = 'Facility não encontrada';
			$data['msg_type'] = 'alert-error';
			$data['found'] = false;
		else:
			$per = new Periodo();
			$per->include_related('facilities')->where('status',PERIODO_STATUS_INDISPONIVEL)->where_related_facility('status',STATUS_FACILITIES_ATIVO)->where('facility_id',$this->uri->segment(3))->get();
			$data['per'] = $per;
			if ($this->uri->segment(4) == 'saved'):
				
				if ($_POST['repeat'] == 'dont'):
					$agn = new Periodo();
					$agn->facility_id = $this->uri->segment(3);
					$agn->chave = $code;
					$agn->periodo_inicial = date('Y-m-d H:i:s',strtotime($_POST['startd'].' '.$_POST['starth'].':'.$_POST['startm'].':00'));
					$agn->periodo_final = date('Y-m-d H:i:s',strtotime($_POST['endd'].' '.$_POST['endh'].':'.$_POST['endm'].':00'));
					$agn->obs = $_POST['obs'];
					$agn->autor_id = $this->session->userdata('id');
					$agn->status = PERIODO_STATUS_INDISPONIVEL;
					$agn->save();
				else: 
					$end = strtotime($_POST['endd'].' '.$_POST['endh'].':'.$_POST['endm'].':00');
					$start = strtotime($_POST['startd'].' '.$_POST['starth'].':'.$_POST['startm'].':00');
					$repeat = strtotime($_POST['repeatd'].' '.$_POST['repeath'].':'.$_POST['repeatm'].':00');
					while ($start <= $repeat):
						$agn = new Periodo();
						$agn->facility_id = $this->uri->segment(3);
						$agn->chave = $code;
						$agn->periodo_inicial = date('Y-m-d H:i:s',$start);
						$agn->periodo_final = date('Y-m-d H:i:s',$end);
						$agn->obs = $_POST['obs'];
						$agn->autor_id = $this->session->userdata('id');
						$agn->status = PERIODO_STATUS_INDISPONIVEL;
						$agn->save();
						switch ($_POST['repeat']):
							case 'daily': 
								$start = strtotime('+1 day',$start);
								$end = strtotime('+1 day',$end); break;
							case 'weekly': 
								$start = strtotime('+1 week',$start);
								$end = strtotime('+1 week',$end); break;
							case 'monthly': 
								$start = strtotime('+1 month',$start);
								$end = strtotime('+1 month',$end); break;
							case 'annualy': 
								$start = strtotime('+1 year',$start);
								$end = strtotime('+1 year',$end); break;
						endswitch;
						
					endwhile;					
				endif;
				redirect('facilities/editar_agenda/'.$this->uri->segment(3));
				
			elseif ($this->uri->segment(4) == 'ocur'): #edit single event
				$agn = new Periodo();
				$agn->get_by_id($this->uri->segment(5));
				$agn->chave = $code;
				$end = strtotime($_POST['endd'].' '.$_POST['endh'].':'.$_POST['endm'].':00');
				$start = strtotime($_POST['startd'].' '.$_POST['starth'].':'.$_POST['startm'].':00');
				$agn->periodo_inicial = date('Y-m-d H:i:s',$start);
				$agn->periodo_final = date('Y-m-d H:i:s',$end);
				$agn->obs = $_POST['obs'];
				$agn->save();
				redirect('facilities/editar_agenda/'.$this->uri->segment(3));
				
			elseif ($this->uri->segment(4) == 'ser'): #edit series
				$agk = new Periodo();
				$agk->get_by_id($this->uri->segment(5));
				$agd = new Periodo();
				$agd->where('chave',$agk->chave)->get();
				foreach ($agd as $ad):
					$ad->delete();
				endforeach;
				
				
				$agn = new Periodo();
				$end = strtotime($_POST['endd'].' '.$_POST['endh'].':'.$_POST['endm'].':00');
				$start = strtotime($_POST['startd'].' '.$_POST['starth'].':'.$_POST['startm'].':00');
				$repeat = strtotime($_POST['repeatd'].' '.$_POST['repeath'].':'.$_POST['repeatm'].':00');
				while ($start <= $repeat):
					$agn = new Periodo();
					$agn->facility_id = $this->uri->segment(3);
					$agn->chave = $code;
					$agn->periodo_inicial = date('Y-m-d H:i:s',$start);
					$agn->periodo_final = date('Y-m-d H:i:s',$end);
					$agn->obs = $_POST['obs'];
					$agn->autor_id = $this->session->userdata('id');
					$agn->status = PERIODO_STATUS_INDISPONIVEL;
					$agn->save();
					switch ($_POST['repeat']):
						case 'daily': 
							$start = strtotime('+1 day',$start);
							$end = strtotime('+1 day',$end); break;
						case 'weekly': 
							$start = strtotime('+1 week',$start);
							$end = strtotime('+1 week',$end); break;
						case 'monthly': 
							$start = strtotime('+1 month',$start);
							$end = strtotime('+1 month',$end); break;
						case 'annualy': 
							$start = strtotime('+1 year',$start);
							$end = strtotime('+1 year',$end); break;
					endswitch;
					
				endwhile;	
			
			elseif ($this->uri->segment(4) == 'del'): #delete
				if ($this->uri->segment(5) == 'ocur'): #single
					$agn = new Periodo();
					$agn->get_by_id($this->uri->segment(6));
					$agn->delete();
				else: #series
					$agn = new Periodo();
					$agn->get_by_id($this->uri->segment(6));
					$agd = new Periodo();
					$agd->where('chave',$agn->chave)->get();
					foreach ($agd as $ad):
						$ad->delete();
					endforeach;
				endif;	
					
				redirect('facilities/editar_agenda/'.$this->uri->segment(3));
			endif;
			
			
			$data['fcl'] = $fcl;
			
			$curdate = getdate();
			$today = strtotime($curdate['year'].'-'.$curdate['mon'].'-'.$curdate['mday'].' '.$curdate['hours'].':'.$curdate['minutes'].':'.$curdate['seconds']);
			
			$agn = new Periodo();
			$data['count'] = $agn->where('periodo_inicial >',date('Y-m-d H:i:s',$today))->where('facility_id',$fcl->id)->order_by('periodo_inicial, periodo_final')->count();
			if ($data['count'] == 0):
				$data['msg'] = 'Nenhum agendamento encontrado';
				$data['msg_type'] = 'alert-error';
			else:
				$data['agn'] =  $agn->where('periodo_inicial >',date('Y-m-d H:i:s',$today))->where('facility_id',$fcl->id)->order_by('periodo_inicial, periodo_final')->get();
			endif;
			
			
		endif;
		
		$this->load->view('facilities_editar_agenda',$data);
		
        
    }
    
    public function __destruct(){
        
    }
}

?>
