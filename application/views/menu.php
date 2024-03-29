<h2>Bem-vindo ao sistema interno da Anestesiologia USP!</h2>
<div class='box1' id='box_messages'>
	<?php if($unread_total > 0) : ?>
	<p class='title_box'>Você tem <strong><?php echo $unread_total; ?></strong> mensagen(s) não lida(s).</p>
	<table id="tabMsg">
		<thead>
			<tr>
				<th>De:</th>
				<th>Assunto:</th>
				<th>Data:</th>
			</tr>
		</thead>
		<tbody>
			
			<?php foreach($unread as $i => $m) : ?>
			<tr>
				<td><?php echo $m->from->nome; ?></td>
				<td><a href='<?php echo base_url('mensagens/read') . '/' . $m->id ;?>' title='Ler'><?php echo $m->subject; ?></a></td>
				<td><?php echo FormatDate($m->created); ?></td>
			</tr>
			<?php endforeach; ?>
			
		</tbody>
	
	</table>	
	<?php else : ?>
	<p class='title_box'>Nenhuma mensagem não lida.</p>
	<?php endif; ?>
</div>

<div class='box1' id='box_pendencias'>
<p class="title_box">Pendências</p>
<?php if($aval_pend > 0) : ?>
	<p>Nenhuma avaliação para responder</p>
<?php else : ?>
	<p><a href="<?php echo base_url('respostas/pending'); ?>">Preenchimento de avaliação</a></p>
<?php endif; ?>

<?php if($aprov_pend > 0) : ?>
	<p>Nenhuma aprovação atribuída a você</p>
<?php else : ?>
	<p><a href="<?php echo base_url('aprovacoes/mostrar/pendentes/'); ?>">Aprovação de relatório</a></p>
<?php endif; ?>
	
</div>

	<ul id="ulMenuComum" class="ulMenu">
		<li>Avaliações
			<ul>
				<li><a href='<?php echo base_url('respostas/pending'); ?>'>Avaliações para preencher</a></li>
				<li><a href='<?php echo base_url('respostas/about_me'); ?>'>Avaliações sobre mim</a></li>
			</ul>
		</li>
		<li>Aprovações
			<ul>
				<li><a href='<?php echo base_url('aprovacoes/mostrar/pendentes/'); ?>'>Aprovações pendentes</a></li>
				<li><a href='<?php echo base_url('aprovacoes/mostrar/'); ?>'>Todas as aprovações</a></li>
			</ul>
		</li>		
		<li>Resultados
			<ul>
				<li><a href='<?php echo base_url('controlador/relatorio'); ?>'>Consultar relatórios</a></li>
			</ul>
		</li>
		<li>Mensagens
			<ul>
				<li><a href='<?php echo base_url('mensagens'); ?>'>Mensagens recebidas</a></li>
				<li><a href='<?php echo base_url('mensagens/sent'); ?>'>Mensagens enviadas</a></li>
				<li><a href='<?php echo base_url('mensagens/write'); ?>'>Nova mensagem</a></li>
			</ul>
		</li>		
	</ul>
	<div class="clear"></div>
<div class="box1" id="boxMenuAdm">
	<p id="legMenuAdm" class="title_box">Menu administrativo</p>
	<ul id="ulMenuAdm" class="ulMenu">
		<li>Usuários
			<ul>
				<li><a href='<?php echo base_url('usuarios'); ?>'>Lista de usuários</a></li>
				<li><a href='<?php echo base_url('usuarios/add'); ?>'>Adicionar usuário</a></li>
			</ul>
		</li>
		<li>Grupos
			<ul>
				<li><a href='<?php echo base_url('grupos'); ?>'>Lista de grupos</a></li>
				<li><a href='<?php echo base_url('grupos/add'); ?>'>Adicionar grupo</a></li>
			</ul>
		</li>

		<li>Configurações
			<ul>
				<li><a href='<?php echo base_url('configuracoes/email'); ?>'>Configurações de e-mail</a></li>
				<li><a href='<?php echo base_url('configuracoes/salario'); ?>'>Tabela de salários</a></li>
			</ul>
		</li>
		<li>Modelos de avaliações
			<ul>
				<li><a href='<?php echo base_url('avaliacoes'); ?>'>Modelos cadastrados</a></li>
				<li><a href='<?php echo base_url('avaliacoes/add'); ?>'>Adicionar modelo</a></li>
			</ul>
		</li>
		<li>Produção
			<ul>
				<li><a href='<?php echo base_url('producoes/show/1/'); ?>'>Lista de produções</a></li>
			</ul>
		</li>
		
		<li>Avaliações
			<ul>
				<li><a href='<?php echo base_url('respostas/mostrar_admin/pendentes/'); ?>'>Avaliações pendentes</a></li>
				<li><a href='<?php echo base_url('respostas/mostrar_admin/'); ?>'>Todas as avaliações</a></li>
			</ul>
		</li>
		
		<li>Aprovações
			<ul>
				<li><a href='<?php echo base_url('aprovacoes/mostrar_admin/pendentes/'); ?>'>Aprovações pendentes</a></li>
				<li><a href='<?php echo base_url('aprovacoes/mostrar_admin/'); ?>'>Todas as aprovações</a></li>
			</ul>
		</li>
		
		<li>Resultados
			<ul>
				<li><a href='<?php echo base_url('controlador/show/'); ?>'>Resultados mensais</a></li>
				
			</ul>
		</li>
</div>

