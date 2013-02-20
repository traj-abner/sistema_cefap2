
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();

	$tomorrow = date('Y-m-d', strtotime('tomorrow noon'));
	
?>
<style type="text/css">
.title {
	font-weight:bold;
	color:#555;
}
.left {
	text-align:left;
	padding-left:5px;
}
.right {
	text-align:right;
	padding-right:5px;
}
.center {
	text-align:center;
}


table td {
	padding-top:10px;
	padding-left:15px;
}
.tablepad {
	margin-top:30px;
	margin-left:33px;
	margin-bottom:30px;
}


.section {
	font-size:16px;
	text-transform:uppercase;
	font-weight:bold;
	text-align:center;
	width:100%;
	color:#333;
	padding-top:10px;
}

.section-pad {
	padding-top:50px;
}

.section hr { 
	background-color:#999;
	height: 2px;
}

.top-align {
	vertical-align:top;
	padding-top:15px;
}

#calendar {
		width: 900px;
		margin: 0 auto;
		}
.submit {
	text-align:center;
	margin-top:30px;
	margin-right:15px;
}


	
	
/*css seleção de quantidade de registros por página*/
 .select p {text-align: center; background-color: #FFFFFF; border: 0px #FFFFFF}
   .qntd_usuario_listar {float: right; margin-top:-32px;}
   #selectQntd {margin-top: 2px; margin-left:25%}
   .img-order{background-image: url(images/asc.png);}
   /*css modal*/
   #myModal {height:200px; width: 400px; margin-left: 0px; margin-top:40px;}
   .modal.fade.in {top:27%; bottom: 10%;}
   .modal-body {max-height:588px;}
   .modal {left: 41%;}
   .btn-right {margin-left: 550px;}
   .btn-right-creditos {margin-left: 257px; margin-top: -20px;}
   .modal th {background-color: #ccc}
   #btn-right-listar{float:right; margin-right: 20px;}}


  
</style>

<script type="text/javascript" src="<?php echo base_url('js/tiny_mce/tiny_mce.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/date.format.js'); ?>"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
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
			selectable: true,
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
	if ($msg != ''): ?>
    
    <div class="<?php echo $alert_class; ?>">
		<?php echo $msg; ?>
	</div>

	
<?php	endif;
?>
 <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
	<h2>Novo Agendamento</h2>
    
  
     <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'projetos_inserir', 'name' => 'frmusuarios')
    );

        echo form_open_multipart('agendamentos/novo',$attributes['form']);
    ?>
		<div class="alert alert-info">Seu <strong>projeto de pesquisa</strong> precisa estar cadastrado no sistema antes de você solicitar um agendamento. Se ele ainda não estiver cadastrado, <a href="<?php echo base_url('projetos/inserir/'); ?>">cadastre-o primeiro</a>.</div>
    	<table>
		    <tr>
            	<td class="right title">Projeto de Pesquisa</td>
                <td class="left">
                	<select style="width:500px;" name="projeto">
                    	<?php foreach ($proj as $p): ?>
                		<option value="<?php echo $p->id; ?>"><?php echo $p->titulo; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="left"><a class="btn btn-small btn-primary" href="<?php echo base_url('projetos/inserir/'); ?>"><i class="icon-plus icon-white"></i> Novo projeto...</a></td>
            </tr>
    		<?php 
    			if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN):
    		?>
    			<tr>
    				<td class="right title">Usuário</td>
    				<td class="left" colspan="2">
    					<select style="width:500px;" name="usuario">
	                    	<?php foreach ($us as $ur): ?>
	                			<option value="<?php echo $ur->id; ?>"><?php echo $ur->nome . ' ' . $ur->sobrenome; ?></option>
	                        <?php endforeach; ?>
                    	</select>
    				</td>
    			</tr>
    		<?php endif; ?>
        	<tr>
            	<td class="right title">Facilidade</td>
                <td class="left" colspan="2">
                	<select style="width:500px;" name="facility">
                    	<?php foreach ($fcl as $ft): ?>
                		<option value="<?php echo $ft->id; ?>"><?php echo $ft->nome; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

        </table>
		
		<div class="alert alert-info" style="margin-top: 20px; margin-bottom: 20px;"><strong>Seletor de data</strong><br>Selecione um dia e um intervalo de horário em que deseja utilizar a facilidade de interesse.<br>Você pode tanto utilizar os três campos abaixo, como selecionar sua opção de data/horários clicando no calendário mostrado logo abaixo. Se optar pelo calendário, os campos abaixo serão atualizados conforme sua opção feita no calendário.</div>
		
		<div class="alert alert-warning"><strong>Nota: </strong>a data e intervalo de horário definitivos serão definidos pela equipe do CEFAP após aprovação de sua solicitação. Esta é apenas uma <strong>sugestão</strong> de data.</div>
		
        <table class="tablepad">
        	<tr>
            	<td class="title right">Data sugerida</td>
                <td class="left"><input type="date" name="dateField" id="dateField" style="width:130px;" value="<?php echo $tomorrow; ?>"></td>
                <td class="title right">Início</td>
                <td class="left"><input class="right" type="number" name="hinicio" id="hinicio" style="width:49px;" min="0" max="23" value="09">:<input class="left" type="number" name="minicio" id="minicio" style="width:49px;" min="0" max="59" value="00"></td>
                <td class="title right">Fim</td>
                <td class="left"><input class="right" type="number" name="hfim" id="hfim" style="width:49px;" min="0" max="23" value="17">:<input class="left" type="number" name="mfim" id="mfim" style="width:49px;" min="0" max="59" value="00"></td>
            </tr>
        </table>
        
        <br />
		<div id='calendar'></div>
		<div class="submit">
        	<input type="submit" class="btn btn-primary" value="Solicitar agendamento" />
        </div>
        
            
      </form>
      
<?php
    $this->load->view('footer'); 
?>
