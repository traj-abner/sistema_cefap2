
<?php 
    $this->load->view('header');  
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style-small.css"/>
<div id="myModal" class="modal hide fade" style="">
</div>


<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
        <h2>Lista de Agendamentos</h2>
		<a href="<?php echo base_url('/agendamentos/criar'); ?>" class="btn btn-primary" id="btn-right-listar"><i class="icon-plus icon-white"></i> Adicionar</a>
		<div class="clear"></div>

    <div class="clear"></div>
    
 
    <?php
    if(isset($msg) && isset($msg_type)){ ?>
       <div class="alert <?php echo $msg_type?>" id="alert-success">
           <button type="button" class="close" data-dismiss="alert">*</button>
           <?php echo $msg; ?>
       </div> 
    <?php 

    }else{
        echo ('');

    }
    
    if ($msg_type != 'alert-block'):

     ?> 
    
    
    
<!-- tabela -->	
	<div class="clear"></div>
	<div>
		<ul class="pager">
				<li><a href="<?php echo $buttonArray[0]; ?>"><i class="icon-fast-backward"></i></a></li>
				<li><a href="<?php echo $buttonArray[1]; ?>"><i class="icon-backward"></i></a></li>
				<li><input type="text" id="gotopage" class="input-mini input-page center" value="<?php echo $this->uri->segment(5,1); ?>" /></li>
				<li><a href="<?php echo $buttonArray[2]; ?>"><i class="icon-forward"></i></a></li>
				<li><a href="<?php echo $buttonArray[3]; ?>"><i class="icon-fast-forward"></i></a></li> 
		</ul>
		
		<div class="qntd_usuario_listar seletor_qtde_container">
			<p>Agendamentos por página:
			<select id="selectQntd" class="input-mini">
					<option <?php if ($limit == '5') echo 'selected="selected"'; ?> value="5">5</option>
					<option <?php if ($limit == '10') echo 'selected="selected"'; ?> value="10">10</option>
					<option <?php if ($limit == '20') echo 'selected="selected"'; ?> value="20">20</option>
					<option <?php if ($limit == '30') echo 'selected="selected"'; ?> value="30">30</option>
			</select>
			</p>
		</div>
	</div>
		
    <div class="clear"></div>
          
    
<table class="table">
    <caption >Lista de Usuários</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th style="width:30px;">
                        
                        <?php 
                                if(isset($img) && $img == 'id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?><br />
                        <a href='<?php echo base_url("agendamentos/listar/id/$limit/$perpage/DESC"); ?>'>ID
                            
                            </a>
                        </th>
                        <th>
						<div class="btn-group dropup">
                            <a class="btn dropdown-toggle btn-link" style="width::15px;" data-toggle="dropdown" href="#">
                            <i class="icon-filter"></i><span class="caret"></span>
                          </a>
                          <?php if ($this->session->userdata('credencial') == CREDENCIAL_USUARIO_SUPERADMIN): ?>
                          <ul class="dropdown-menu">
                          <?php 
						  $fclu = new Usuario();
						  $fclu->where('status',STATUS_USUARIO_ATIVO)->where('credencial',CREDENCIAL_USUARIO_COMUM)->order_by('nome, sobrenome')->get();
						 if (!isset($_GET['fid']))
						  	$fid = '';
						  else
						  	$fid = $_GET['fid'];
						
						if (!isset($_GET['pid']))
						  	$pid = '';
						  else
						  	$pid = $_GET['pid'];
						
						if (!isset($_GET['s']))
						  	$s = '';
						  else
						  	$s = $_GET['s'];
							
						  foreach ($fclu as $flu):
						  
						  ?>
                            <li><a href="?uid=<?php echo $flu->id; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>&s=<?php echo $s; ?>" role="button" class="btn btn-link" ><?php echo $flu->nome . ' ' . $flu->sobrenome; ?></a></li>
                            <?php endforeach; endif;?>
                          </ul></div><br />
						<?php 
                                if(isset($img) && $img == 'usuario_id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/usuario_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/usuario_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?>       <br /><a href='<?php echo base_url("agendamentos/listar/usuario_id/$limit/$perpage/DESC"); ?>'>Usuário
                                       
                            </a>
                        </th>
                        <th>
						<div class="btn-group dropup">
                            <a class="btn dropdown-toggle btn-link" style="width::15px;" data-toggle="dropdown" href="#">
                            <i class="icon-filter"></i><span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                          <?php 
						  $fclu = new Facility();
						  $fclu->where('status',STATUS_FACILITIES_ATIVO)->order_by('nome_abreviado, nome')->get();
						 if (!isset($_GET['uid']))
						  	$uid = '';
						  else
						  	$uid = $_GET['uid'];
						
						if (!isset($_GET['pid']))
						  	$pid = '';
						  else
						  	$pid = $_GET['pid'];
						
						if (!isset($_GET['s']))
						  	$s = '';
						  else
						  	$s = $_GET['s'];
							
						  foreach ($fclu as $flu):
						  
						  ?>
                            <li><a href="?fid=<?php echo $flu->id; ?>&uid=<?php echo $uid; ?>&pid=<?php echo $pid; ?>&s=<?php echo $s; ?>" role="button" class="btn btn-link" ><?php echo $flu->nome_abreviado; ?></a></li>
                            <?php endforeach;?>
                          </ul></div><br />
						
						<?php 
                                if(isset($img) && $img == 'facility_id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/facility_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/facility_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?><br /><a href='<?php echo base_url("agendamentos/listar/facility_id/$limit/$perpage/DESC"); ?>'>Facility
                            
                            </a>
                        </th>
                        <th>
						<div class="btn-group dropup">
                            <a class="btn dropdown-toggle btn-link" style="width::15px;" data-toggle="dropdown" href="#">
                            <i class="icon-filter"></i><span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
						<?php 
						  $fclu = new Projeto();
						  $fclu->where('status',STATUS_PROJETO_ATIVO)->order_by('titulo')->get();
						 if (!isset($_GET['uid']))
						  	$uid = '';
						  else
						  	$uid = $_GET['uid'];
						
						if (!isset($_GET['fid']))
						  	$fid = '';
						  else
						  	$fid = $_GET['fid'];
						
						if (!isset($_GET['s']))
						  	$s = '';
						  else
						  	$s = $_GET['s'];
							
						  foreach ($fclu as $flu):
						  
						  ?>
                            <li><a href="?pid=<?php echo $flu->id; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&s=<?php echo $s; ?>" role="button" class="btn btn-link" ><?php echo $flu->titulo; ?></a></li>
                            <?php endforeach; ?>
                          </ul></div><br />
						
						<?php 
                                if(isset($img) && $img == 'projeto_id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/projeto_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/projeto_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?><br /><a href='<?php echo base_url("agendamentos/listar/projeto_id/$limit/$perpage/DESC"); ?>'>Projeto
                            
                            </a>
                        </th>
                        <th><?php 
                                if(isset($img) && $img == 'periodo_inicial'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                      
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?><br /><a href='<?php echo base_url("agendamentos/listar/periodo_inicial/$limit/$perpage/DESC"); ?>'>Periodo Solicitado
                            
                            </a>
                        </th>
                        <th><?php 
                                if(isset($img) && $img == 'periodo_inicial_marcado'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial_marcado/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                      
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial_marcado/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?><br /><a href='<?php echo base_url("agendamentos/listar/periodo_inicial_marcado/$limit/$perpage/DESC"); ?>'>Periodo Agendado
                            
                            </a>
                        </th>
                        <th> 
						<div class="btn-group dropup">
                            <a class="btn dropdown-toggle btn-link" style="width::15px;" data-toggle="dropdown" href="#">
                            <i class="icon-filter"></i><span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
						<?php 
						 if (!isset($_GET['uid']))
						  	$uid = '';
						  else
						  	$uid = $_GET['uid'];
						
						if (!isset($_GET['fid']))
						  	$fid = '';
						  else
						  	$fid = $_GET['fid'];
						
						if (!isset($_GET['pid']))
						  	$pid = '';
						  else
						  	$pid = $_GET['pid'];
							
						 
						  
						  ?>
                            <li><a href="?s=<?php echo AGENDAMENTO_STATUS_SOLICITADO; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>" role="button" class="btn btn-link" >Solicitado</a></li>
                             <li><a href="?s=<?php echo AGENDAMENTO_STATUS_APROVADO; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>" role="button" class="btn btn-link" >Aprovado</a></li>
                              <li><a href="?s=<?php echo AGENDAMENTO_STATUS_NEGADO; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>" role="button" class="btn btn-link" >Negado</a></li>
                               <li><a href="?s=<?php echo AGENDAMENTO_STATUS_FALTOU; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>" role="button" class="btn btn-link" >Faltou</a></li>
                                <li><a href="?s=<?php echo AGENDAMENTO_STATUS_COMPARECEU; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>" role="button" class="btn btn-link" >Compareceu</a></li>
                                 <li><a href="?s=<?php echo AGENDAMENTO_STATUS_CANCELADO; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>&pid=<?php echo $pid; ?>" role="button" class="btn btn-link" >Cancelado</a></li>
                           
                          </ul></div><br />
						
						<?php 
                                if(isset($img) && $img == 'status'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/status/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i></a>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/status/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i></a>';
                                } 
                            ?><br /><a href='<?php echo base_url("agendamentos/listar/status/$limit/$perpage/DESC"); ?>'>Status
                           
                            </a>
                        </th>
                        <th><div class="btn-group dropup">
                            <a href="?uid=&fid=&pid=&s=" role="button" class="btn btn-small" >Limpar Filtros</a>
                          </div><br />Opções</th>
                </tr>
        </thead>
        
        <tbody>
        <?php 
		$us = new Usuario();
		$ft = new Facility();
		$pj = new Projeto();
		foreach($agn as $ag){ ?>

                <tr class="listar_usuario" id="usuario-<?php echo $ag->id; ?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $ag->id;?></td>
                        <td><?php $us->get_by_id($ag->usuario_id); echo $us->nome; ?></td>
                        <td><?php $ft->get_by_id($ag->facility_id); echo $ft->nome_abreviado; ?></td>
                        <td><?php $pj->get_by_id($ag->projeto_id); echo $pj->titulo; ?></td>
                        <td><?php echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)).' a '.date('H:i',strtotime($ag->periodo_final)); ?></td>
                        <td> <?php if ($ag->periodo_inicial_marcado == '0000-00-00 00:00:00'):
										echo '';
									else:
										//echo $ag->periodo_inicial_marcado;
										echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)).' a '.date('H:i',strtotime($ag->periodo_final_marcado));
									endif;
						 ?>
                        </td>
                       
                        <td> <?php
							switch ($ag->status):
								case AGENDAMENTO_STATUS_SOLICITADO: echo 'Solicitado'; break;
								case AGENDAMENTO_STATUS_APROVADO: echo 'Aprovado'; break;
								case AGENDAMENTO_STATUS_NEGADO: echo 'Negado'; break;
								case AGENDAMENTO_STATUS_FALTOU: echo 'Faltou'; break;
								case AGENDAMENTO_STATUS_COMPARECEU: echo 'Compareceu'; break;
								case AGENDAMENTO_STATUS_CANCELADO: echo 'Cancelado'; break;
							endswitch;
						?>
                        </td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                <option value='dados_pessoais' data-toggle="modal">Ver Detalhes</option>
                                <?php
									if ($uRole >= CREDENCIAL_USUARIO_ADMIN):
										 $cn = $ft->where_related_usuario('id',$this->session->userdata('id'))->where('id',$ag->facility_id)->count();
										
										if ($cn > 0 or $uRole == CREDENCIAL_USUARIO_SUPERADMIN ):
											if ($ag->status == AGENDAMENTO_STATUS_SOLICITADO or $ag->status == AGENDAMENTO_STATUS_NEGADO):
								 ?>
                                <option value='<?php echo ("agendamentos/aprovar/".$ag->id);?>'>Aprovar</option>
                                		<?php endif;?>
                                		<option value='<?php echo ("agendamentos/editar/".$ag->id);?>'>Editar</option>
                                	<?php endif; ?>
                                <?php endif; ?>
								<?php if ($ag->usuario_id == $this->session->userdata('id') and $uRole == CREDENCIAL_USUARIO_COMUM):?><option value='<?php echo ("agendamentos/editar/".$ag->id);?>'>Editar</option><?php endif;?>                               
                               </optgroup>
                            </select>
                        </td>
                </tr>
           <?php } ?>  
           </tbody>
    </table>
         
  
    

    <?php 
    echo $page;
        
    ?>
    
</div>
<?php
    $this->load->view('footer'); 
?>
<script type="text/javascript">
    $(function () {
    $("#checkAll").change(function(){
    if (this.checked) {
        $(".chM").attr({ checked: true });
    }else {
        $(".chM").attr({ checked: false });
     }
    });
    $(".chM").change(function(){
        if ($("#main").attr('checked') == true) {
            $("#main").attr({ checked: false })
        }
    });
    });
    
    jQuery(document).ready(function(){
        Array.prototype.join = function(separator){
        if (separator == undefined){separator = ','}
        var text = new String;
        for (obj in this){
          text += this[obj] + separator}
        return text.slice(0,text.length - separator.length)}


        
        jQuery('#selectQntd').change(function(){
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("agendamentos/listar/id");  ?>' + '/' + option + '/1' ;
        });
   		
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("agendamentos/listar/id");  ?>' + '/' + qtd + '/' + option ;
        });
   
   
        jQuery(".change_option").change(function(){
         
           var option = jQuery(this).val();
           
           if (jQuery(this).attr('id') == 'comMarcados' ) {
               
               if (option == 'selecione'){
                   alert('Selecione outra opção');
               }else{
                    var checked = jQuery("input[name='user_List']:checked");

                    if(checked.length > 0){
                        var userIds = [];

                         checked.each(function(index){
                             var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                             id = id[1];
                             userIds[index] = id;
                         });
                         id = userIds.join('_');
						if (option == 'mensagem'){
                         window.location.href = '<?php echo base_url('mensagens/escrever/to/'); ?>' + '/' + id;}
						else {
							window.location.href = '<?php echo base_url('usuarios/mudar_status'); ?>' + '/' + id + '/' + option;
						}
                    }else{
                         alert('Selecione pelo menos um usuário');
                         return;
                    }
                }
            }else {
            
                switch(option){
                    case 'selecione':
                        alert('Selecione outra opção');  
                    break;

                    case 'dados_pessoais':      
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("agendamentos/ver/"); ?>/" + id,
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
						
                    break;
					
					case 'creditos':      
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("creditos/extrato/"); ?>/" + id,
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
						
                    break;

                    default:
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        window.location.href = '<?php echo base_url(''); ?>' + option;
                     break;
                } 
				
           }
        });    
    });
    
    
</script>
<?php endif;?>