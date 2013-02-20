
<?php 
    $this->load->view('header');
	$tomorrow = date('Y-m-d', strtotime('tomorrow noon'));  
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>

<link rel='stylesheet' type='text/css' href='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/jquery/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/jquery/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url('js/fullcalendar-1.5.4'); ?>/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		
		var calendar = $('#calendar').fullCalendar({
			allDayDefault: false,
			defaultView: 'month',
			header: {
				left: 'prev,next today',
				center: 'title',
				//right: 'month,agendaWeek,agendaDay'
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: false,
			disableDragging: true,
			selectHelper: true,
			
			dayClick: function(date, allDay, jsEvent, view) {
				if (allDay) {
					$("#dateField").val(date.format("yyyy-mm-dd"));
				}else{
					$("#hinicio").val(date.format("HH"));
					$("#minicio").val(date.format("MM"));
				}
			},
			select: function( startDate, endDate, allDay, jsEvent, view ) {
				if (!allDay) {
					$("#dateField").val(startDate.format("yyyy-mm-dd"));
					$("#hinicio").val(startDate.format("HH"));
					$("#minicio").val(startDate.format("MM"));
					$("#hfim").val(endDate.format("HH"));
					$("#mfim").val(endDate.format("MM"));
				}
			},
			eventColor: '#A00',
			editable: false,
			events: [
			<?php 
			date_default_timezone_set("UTC");
			foreach ($per as $pe): 
			
			?>
				{
					title: '<?php echo $pe->facility_nome_abreviado . ' | ' . $pe->obs; ?>',
					start: '<?php echo date("Y-m-d", strtotime($pe->periodo_inicial)) . 'T' . date("H:i:s",strtotime($pe->periodo_inicial)).'Z';  ?>',
					end: '<?php echo date("Y-m-d", strtotime($pe->periodo_final)) . 'T' . date("H:i:s",strtotime($pe->periodo_final)).'Z';  ?>',
					
					
				},
			<?php endforeach; ?>
				
			]
		});
			
	});


</script>

<div id="main_content">	
<?php
    if(isset($msg) && isset($msg_type)){ ?>
       <div class="alert <?php echo $msg_type?>" id="alert-success">
           <button type="button" class="close" data-dismiss="alert">×</button>
           <?php echo $msg; ?>
       </div> 
    <?php 

    }else{
        echo ('');

    }

     ?> 
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div>
   <?php if ($found): ?> 
    <h2>Agenda da Facility <?php echo $fcl->nome; ?></h2>

<!-- tabelas -->	
<?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'frmagen', 'name' => 'frmagen')
    );

        echo form_open('facilities/editar_agenda/'.$this->uri->segment(3).'/saved',$attributes['form']);
    ?>
<table style="width:100%;">
	<tr>
    	<td class="title right">Per&iacute;odo Inicial: </td>
        <td colspan="2"><input type="date" name="startd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="starth" id="starth" style="width:49px;" min="0" max="23" value="09">:<input class="left" type="number" name="startm" id="startm" style="width:49px;" min="0" max="59" value="00"></td>
        <td class="title right">Per&iacute;odo Final: </td>
        <td colspan="2"><input type="date" name="endd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="endh" id="endh" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="endm" id="endm" style="width:49px;" min="0" max="59" value="00"></td>
    </tr>
    <tr>
    	<td class="title right"> Observações:</td>
        <td colspan="5"><input type="text" name="obs" style="width:730px;" maxlength="550" /></td>
    </tr>
    <tr>
    	<td class="title right">Repertir:</td>
        <td colspan="2">
        <select name="repeat">
        	<option value="dont" selected="selected">Não Repetir</option>
        	<option value="daily">Diariamente</option>
            <option value="weekly">Semanalmente</option>
            <option value="monthly">Mensalmente</option>
            <option value="annualy">Anualmente</option>
        </select>
        </td>
        <td class="title right">Até</td>
        <td colspan="2"><input type="date" name="repeatd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="repeath" id="repeath" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="repeatm" id="repeatm" style="width:49px;" min="0" max="59" value="00"></td>
    </tr>
    
    <tr>
    	<td colspan="5" align="center" class="center"><input type="submit" class="btn btn-primary" name="submit" value="Adicionar" onclick="frmagen.submit()" /></td>
    </tr>
</table>

</form>

            <br />

<?php if ($count > 0): ?><br /><br />
<table class="table">
	
    <caption >&nbsp;</caption>
        <thead>
                <tr>    
                        
                        <th><a href='#'>Período Inicial</a>
                        </th>
                        <th><a href='#'>Período Final</a>
                        </th>
                        <th><a href='#'>Criado por</a>
                        </th>
                        <th><a href='#'>Tipo</a>
                        </th>
                        
                        <th><a href='#'>Observações </a>
                        </th>
                        <th><a href='#'>&nbsp; </a>
                        </th>
                        
                </tr>
        </thead>
        
        <tbody>
        <?php 
		$ur = new Usuario();
		foreach($agn as $ag){ ?>

                <tr class="listar_usuario" id="usuario-<?php echo $ag->id; ?>">
                        <td><?php echo date('d/m/Y H:i',strtotime($ag->periodo_inicial));?></td>
                        <td><?php echo date('d/m/Y H:i',strtotime($ag->periodo_final));; ?></td>
                        <td><?php $ur->get_by_id($ag->autor_id); echo $ur->nome . ' ' . $ur->sobrenome; ?></td>
                        <td><?php 
						switch($ag->status):
							case PERIODO_STATUS_DISPONIVEL: echo 'Dispon&iacute;vel'; break;
							case PERIODO_STATUS_A_CONFIRMAR: echo 'A Confirmar'; break;
							case PERIODO_STATUS_INDISPONIVEL: echo 'Indispon&iacute;vel'; break;
						endswitch;
						?></td>
                        <td><?php echo $ag->obs; ?></td>
                        <td class="right" align="right"><div class="btn-group">
                          <a class="btn dropdown-toggle btn-link" data-toggle="dropdown" href="#">
                            <i class="icon-edit"></i> Editar<span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="#myModal<?php echo $ag->id; ?>ocur" role="button" class="btn btn-link" data-toggle="modal">Ocorrência</a></li>
                            <li><a href="#myModal<?php echo $ag->id; ?>ser" role="button" class="btn btn-link" data-toggle="modal">Série</a></li>
                          </ul>
                        </div></td>
                      
                </tr>
                <!-- SINGLE EVENT -->
                 <div id="myModal<?php echo $ag->id; ?>ocur" style="height:370px; width: 500px; margin-left:-2%; margin-top:70px;" class="modal hide fade">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Editar Ocorrência</h3>
                    </div>
                    <div class="modal-body-small">
                    	<?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'frmagenedocur'.$ag->id, 'name' => 'frmagenedocur'.$ag->id)
    );

        echo form_open('facilities/editar_agenda/'.$this->uri->segment(3).'/ocur/'.$ag->id,$attributes['form']);
    ?>
    				<strong class="title">Per&iacute;odo Inicial: </strong>
        				<input type="date" name="startd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="starth" id="starth" style="width:49px;" min="0" max="23" value="09">:<input class="left" type="number" name="startm" id="startm" style="width:49px;" min="0" max="59" value="00"><br /><br />
                    <strong class="title">Per&iacute;odo Final: </strong>&nbsp;
        				<input type="date" name="endd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="endh" id="endh" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="endm" id="endm" style="width:49px;" min="0" max="59" value="00"><br /><br />
    				<strong class="title">Observações: </strong><input type="text" name="obs" style="width:300px;" maxlength="550" value="<?php echo $ag->obs; ?>" /><br /><br />
                    <div class="center btn-group" style="margin-left:35%">
                     <a class="btn btn-danger" href='<?php echo base_url('facilities/editar_agenda/'.$this->uri->segment(3).'/del/ocur/'.$ag->id); ?>'>Excluir</a>
                    <input type="button" value="salvar" class="btn btn-primary" onclick="frmagenedocur<?php echo $ag->id; ?>.submit()" /></div></form>
                    </div>
                    <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                </div>
                <!-- SERIES -->
                <div id="myModal<?php echo $ag->id; ?>ser" style="height:450px; width: 500px; min-height:120px; margin-left:0px; margin-top:70px;" class="modal hide fade">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Editar Série</h3>
                    </div>
                    <div class="modal-body-small">
                    
                    	<?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'frmagenedser'.$ag->id, 'name' => 'frmagenedser'.$ag->id)
    );

        echo form_open('facilities/editar_agenda/'.$this->uri->segment(3).'/ser/'.$ag->id,$attributes['form']);
    ?>
    				<strong class="title">Per&iacute;odo Inicial: </strong>
        				<input type="date" name="startd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="starth" id="starth" style="width:49px;" min="0" max="23" value="09">:<input class="left" type="number" name="startm" id="startm" style="width:49px;" min="0" max="59" value="00"><br /><br />
                    <strong class="title">Per&iacute;odo Final: </strong>&nbsp;
        				<input type="date" name="endd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="endh" id="endh" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="endm" id="endm" style="width:49px;" min="0" max="59" value="00"><br /><br />
    				<strong class="title" style="margin-left:2px;">Observações: </strong><input type="text" name="obs" style="width:300px;" maxlength="550" value="<?php echo $ag->obs; ?>" /><br /><br />
                    <strong class="title" style="margin-left:35px;">Repetir: </strong>
                 <select name="repeat">
                    <option value="dont">Não Repetir</option>
                    <option value="daily" selected="selected">Diariamente</option>
                    <option value="weekly">Semanalmente</option>
                    <option value="monthly">Mensalmente</option>
                    <option value="annualy">Anualmente</option>
                </select><br /><br /> <strong class="title" style="margin-left:55px;">Até: </strong>
                <input type="date" name="repeatd" style="width:135px;" value="<?php echo $tomorrow; ?>" /> <input class="right" type="number" name="repeath" id="repeath" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="repeatm" id="repeatm" style="width:49px;" min="0" max="59" value="00">
                
                     <div class="center btn-group"  style="margin-left:35%">
                     <a class="btn btn-danger" href='<?php echo base_url('facilities/editar_agenda/'.$this->uri->segment(3).'/del/ser/'.$ag->id); ?>'>Excluir</a>
                    <input type="button" value="salvar" class="btn btn-primary" onclick="frmagenedser<?php echo $ag->id; ?>.submit()" /></div></form>
                    </div>
                    <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                </div>
           <?php } ?>  
           </tbody>
    </table><br><br>
    <div id='calendar'></div>
<?php endif; ?>        

    <?php endif; ?>
</div>
<?php
    $this->load->view('footer'); 
?>
