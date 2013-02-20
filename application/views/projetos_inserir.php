
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();
	
	
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
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>




<!-- /TinyMCE -->


<div id="main_content">	
<?php 
	if ($msg != ''): ?>
    
    <div class="<?php echo $alert_class; ?>">
		<?php echo $msg; ?>
	</div>

	
<?php	endif;
?>
 <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
   <h2>Criar Projeto</h2>
      
    
    
  
     <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'projetos_inserir', 'name' => 'frmusuarios')
    );

        echo form_open_multipart('projetos/novo',$attributes['form']);
    ?>
	<table>
    	<tr>
            <td class="section" colspan="3">
                Projeto de Pesquisa
                <hr  />
            </td>
        </tr>
        <tr>
        	<td class="title center" colspan="3">Nome do Projeto</td>
        </tr>
    	<tr>
            <td class="center" colspan="3"><input type="text" name="titulo" maxlength="400" style="width:912px;;"  /></td>
        </tr>
        <tr>
        	<td class="title center" colspan="3">Resumo</td>
        </tr>
        <tr>
        	<td colspan="3"><textarea id="elm1" name="resumo" rows="10" cols="100" style="width: 100%"> </textarea></td>
        </tr>
        <tr>
       		 <td class="title right top-align" colspan="1">Instituição(ões) de Fomento</td>
            <td class="left" colspan="2">
            	<select name="inst_fomento[]" multiple="multiple" size="5">
                	<?php $inst = unserialize(INSTITUICOES_FOMENTO); 
						foreach ($inst as $if): ?>
                    	<option value="<?php echo $if ?>"><?php echo $if ?></option>
                    <?php endforeach; ?>
            	</select>
            </td>
        </tr>
        <tr>
        	<td class="title right" colspan="1" style="width:200px;"><?php echo form_label('Arquivos do Projeto de Pesquisa: ', 'uploadForponto'); ?></td>
            <td class="left" colspan="2"><?php echo form_upload('uploadForponto', 'uploadForponto'); ?></td>
        </tr>
        <!-- PENDING UPLOAD FIELD -->
        
    </table>
    	<!-- SECTION CHIEF RESEARCHER -->
    	<table style="width:90%;">
        	<tr>
        		<td class="section section-pad" colspan="4">Pesquisador Responsável<hr /></td>
        	</tr>
            <tr>
            	<td class="title right" colspan="1">Nome</td>
                <td class="left" colspan="3"><input type="text" name="responsavel" maxlength="250" style="width:817px;"  /></td>
            </tr>
            <tr>
            	<td class="title right">Departamento</td>
                <td class="left"><input type="text" name="departamento" maxlength="250" style="width:357px;"  /></td>
                <td class="title right">Instituição</td>
                <td class="left"><input type="text" name="instituicao" maxlength="250" style="width:347px;"  /></td>
            </tr>
            <tr>
            	<td class="title right">Telefone 1</td>
                <td class="left"><input type="text" name="telefone1" maxlength="30" style="width:357px;"  /></td>
                <td class="title right">Telefone 2</td>
                <td class="left"><input type="text" name="telefone2" maxlength="30" style="width:347px;"  /></td>
            </tr>
             <tr>
            	<td class="title right" colspan="1">Email</td>
                <td class="left" colspan="3"><input type="text" name="email" maxlength="250" style="width:817px;"  /></td>
            </tr>
            <tr>
            	<td class="right" colspan="4"><input type="submit" class="btn btn-primary" style="margin-top:20px;" /></td>
            </tr>
        </table>
      </form>
</div>

<?php
    $this->load->view('footer'); 
?>
