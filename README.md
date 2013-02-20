sistema_cefap
v0.32
19/02/13 - Abner
#descri��o
Corre��o de Bugs

#changelog
- Link para edi��o de agenda de facility
- Implementar fullcalendar em edi��o de agenda de facility
- corre��o dos bugs
- grava��o incorreta do campo "tipo_agendamento" na tabela "facilities". Usar a constante definida para tal, e n�o a string 
- editar agendamento: data agendada n�o est� sendo pr�-populada 
- definir action padr�o para todos os controllers (redirecionar para "listar")
- erros de digita��o/acentua��o nos headers de listar projetos 
- mostrar status das facilities em "facilities_listar"
- t�tulo errado no listar projetos
- validar se n�mero da p�gina requisitada existe antes de continuar o processamento.
- faltando mostrar o total de registros sendo mostrados, em rela��o ao total, em todos os "listar" ("Mostrando usu�rios 1 ao 19, de um total de 230").
- faltando popular o n�mero da p�gina atual no seletor de pag. 
- padronizar marca��o HTML, seguindo o padr�o usado em adicionar usu�rio, listar agendamentos, novo agendamento

#known issues
- Views mensagens_recebidas, mensagens_enviadas, creditos_lancamentos e creditos_extrato com erro
- dashboards incorretos. N�o batem com os wireframes
- n�o entendi a diferen�a entre "aprovar" e "editar" agendamento? Aprovar n�o cont�m o mesmo c�digo que Editar?
- faltando filtros com select box em listar agendamentos, etc.
- width dos colunas est� pequeno quando aparecem as setas de ordena��o, ocorrendo quebra de linha quando n�o deveria
- css: centralizar nos arquivos .css. Deixar blocos <style> somente quando for algo muito espec�fico para a p�gina sendo editada
- MVC n�o seguida no controller Main, etc.
- breadcrumbs incorretos. Editar breadcrumbs.php para corrigir nomes sendo exibidos.

#todo
- corre��o dos bugs
- corrigir formatos de campos em todas as tabelas do banco de dados. Em "usuarios", por exemplo, est� tudo como varchar(45).
- implementar @TODOs citados no c�digo
- Em facilities_listar:
	- acrescentar "com marcados" em facilities_listar
	- recuperar qtde de exibi��es por p�gina ao redirecionar. Este dado est� sendo perdido ???


================================================================================
================================================================================

v0.31
18/02/13 - Abner
#descri��o
Agendamentos

#changelog
Implementa��o de edi��o de agenda de facilities

#known issues
- Drop-down menu de cor diferente da barra de menu.
- grava��o incorreta do campo "tipo_agendamento" na tabela "facilities". Usar a constante definida para tal, e n�o a string
- dashboards incorretos. N�o batem com os wireframes
- editar agendamento: data agendada n�o est� sendo pr�-populada
- definir action padr�o para todos os controllers (redirecionar para "listar")
- n�o entendi a diferen�a entre "aprovar" e "editar" agendamento? Aprovar n�o cont�m o mesmo c�digo que Editar?
- faltando filtros com select box em listar agendamentos, etc.
- faltando mostrar o total de registros sendo mostrados, em rela��o ao total, em todos os "listar" ("Mostrando usu�rios 1 ao 19, de um total de 230").
- width dos colunas est� pequeno quando aparecem as setas de ordena��o, ocorrendo quebra de linha quando n�o deveria
- faltando popular o n�mero da p�gina atual no seletor de pag.
- validar se n�mero da p�gina requisitada existe antes de continuar o processamento.
- t�tulo errado no listar projetos
- erros de digita��o/acentua��o nos headers de listar projetos
- css: centralizar nos arquivos .css. Deixar blocos <style> somente quando for algo muito espec�fico para a p�gina sendo editada
- MVC n�o seguida no controller Main, etc.
- breadcrumbs incorretos. Editar breadcrumbs.php para corrigir nomes sendo exibidos.

#todo
- Link para edi��o de agenda de facility
- Implementar fullcalendar em edi��o de agenda de facility
- corre��o dos bugs
- corrigir formatos de campos em todas as tabelas do banco de dados. Em "usuarios", por exemplo, est� tudo como varchar(45).
- implementar @TODOs citados no c�digo
- padronizar marca��o HTML, seguindo o padr�o usado em adicionar usu�rio, listar agendamentos, novo agendamento
- Em facilities_listar:
	- acrescentar "com marcados" em facilities_listar
	- mostrar status das facilities em "facilities_listar"
	- recuperar qtde de exibi��es por p�gina ao redirecionar. Este dado est� sendo perdido


================================================================================
================================================================================
v0.30 18/02/13 - Francisco

DESCRI��O
- Aperfei�oamentos de layout, sobretudo em adicionar usu�rio, listar agendamentos, novo agendamento
- Corre��o de v�rios bugs e diagn�stico de outros ainda pendentes (abaixo)
- Utilizado style.less para edi��o dos estilos e fornecido o compilador SimpLESS (pasta DEVELOPMENT) para gerar o arquivo style.css ap�s edi��o de style.less, sempre que necess�rio
- Implementadas rotinas de valida��o din�mica em adicionar usu�rio, com valida��o do CPF e outras. Implementadas m�scaras de campos em adicionar usu�rio.

BUGS
- v�rios links apontando para endere�os relativos do tipo "../usuarios/adicionar", que se tornam incorretos quando o URL cont�m mais segmentos. CORRIGIDO
- views/dashboard.php, linha 188, faltou "php" na abertura da tag. CORRIGIDO
- login n�o est� restringindo usu�rios que n�o confirmaram inscri��o. CORRIGIDO
- na constru��o do menu, deve-se exibir somente as facilities ativas. CORRIGIDO
- faltando mostrar o saldo na topbar, se usu�rio comum. CORRIGIDO
- relacionamento de usuarios com agendamentos com erro em "usuarios.php", "other_field". CORRIGIDO
- grava��o incorreta do campo "tipo_agendamento" na tabela "facilities". Usar a constante definida para tal, e n�o a string
- dashboards incorretos. N�o batem com os wireframes
- editar agendamento: data agendada n�o est� sendo pr�-populada
- definir action padr�o para todos os controllers (redirecionar para "listar")
- n�o entendi a diferen�a entre "aprovar" e "editar" agendamento? Aprovar n�o cont�m o mesmo c�digo que Editar?
- faltando filtros com select box em listar agendamentos, etc.
- faltando mostrar o total de registros sendo mostrados, em rela��o ao total, em todos os "listar" ("Mostrando usu�rios 1 ao 19, de um total de 230").
- width dos colunas est� pequeno quando aparecem as setas de ordena��o, ocorrendo quebra de linha quando n�o deveria
- faltando popular o n�mero da p�gina atual no seletor de pag.
- validar se n�mero da p�gina requisitada existe antes de continuar o processamento.
- t�tulo errado no listar projetos
- erros de digita��o/acentua��o nos headers de listar projetos
- css: centralizar nos arquivos .css. Deixar blocos <style> somente quando for algo muito espec�fico para a p�gina sendo editada
- MVC n�o seguida no controller Main, etc.
- breadcrumbs incorretos. Editar breadcrumbs.php para corrigir nomes sendo exibidos.


TODOs
- corre��o dos bugs
- corrigir formatos de campos em todas as tabelas do banco de dados. Em "usuarios", por exemplo, est� tudo como varchar(45).
- implementar @TODOs citados no c�digo
- padronizar marca��o HTML, seguindo o padr�o usado em adicionar usu�rio, listar agendamentos, novo agendamento
- Em facilities_listar:
	- acrescentar "com marcados" em facilities_listar
	- mostrar status das facilities em "facilities_listar"
	- recuperar qtde de exibi��es por p�gina ao redirecionar. Este dado est� sendo perdido


PARA V2.0
- m�dulo FORMUL�RIOS
- m�dulo RELAT�RIOS
- m�dulo LOGS

================================================================================
================================================================================
v0.28
15/02/13 - Abner
#descri��o
Dashboard, Ajuda, Header

#changelog
Implementa��o de Ajuda (ver e editar)
Implementa��o de Dashboard
Implementa��o b�sica do menu superior (pendente atualiza��o pelo designer)

#known issues
Gr�ficos do Dashboard

#todo


================================================================================
================================================================================
v0.27
14/02/13 - Abner
#descri��o
Header

#changelog
Corre��es de Bugs em agendamentos_editar, facilities, facilities_editar, agendamentos, creditos, creditos_listar, projetos.
Cria��o de views agendamentos_calendario, projetos_listar_meus.
Implementa��o do menu.

#known issues


#todo


================================================================================
================================================================================

v0.26
13/02/13 - Abner
#descri��o
M�dulo Agendamento | M�dulo Facilities

#changelog
Corre��es de Bugs na aprova��o de Agendamentos
Implementadas edi��o e visualiza��o do agendamento
Implementados extratos html e pdf das facilities

#known issues


#todo


================================================================================
================================================================================

v0.25
07/02/13 - Abner
#descri��o
M�dulo Agendamento

#changelog
Implementados controllers e views para cria��o, aprova��o e listagem de agendamentos

#known issues


#todo


================================================================================
================================================================================

v0.23
04/02/13 - Abner
#descri��o
M�dulo Projetos

#changelog
Implementados controllers e views para cria��o e edi��o; controller para exclus�o
Corre��es de Bugs M�dulo Cr�ditos

#known issues
N�o subindo arquivo na edi��o

#todo


================================================================================
================================================================================

v0.22
31/01/13 - Abner
#descri��o
M�dulo Mensagens | M�dulo Creditos

#changelog
Implementa��o de lista de enviados
Implementa��o de Inser��o de Cr�ditos

#known issues
N�o listando apenas relacionados

#todo
Inser��o direta por Superadmins

================================================================================
================================================================================

v0.21
30/01/13 - Abner
#descri��o
M�dulo Mensagens | M�dulo Creditos

#changelog
Altera��o na integra��o com o BD (Mensagens)
Implementa��o de renderiza��o de Boleto

#known issues
N�o listando apenas relacionados

#todo
View mensagens_enviadas
creditos_inserir

================================================================================
================================================================================

v0.20
29/01/13 - Abner
#descri��o
M�dulo Mensagens

#changelog
Implementa��o de lista
Implementa��o de escrita (enviar/encaminha)
Corre��o no envio de emails
Fun��es de marca��o (Lido/N�o Lido/Excluido)

#known issues
N�o listando apenas relacionados

#todo
View mensagens_enviadas

================================================================================
================================================================================

v0.19
28/01/13 - Abner
#descri��o
Altera��es m�dulo Cr�ditos/In�cio m�dulo Mensagens

#changelog
Implementa��o de a��es com marcados (cr�ditos)
Lista de lan�amentos ao visualizar dados do usu�rio
Criado formulario e a��o de envio de mensagem

#known issues
n�o enviando email para todos os destinatarios

#todo


================================================================================
================================================================================

v0.18
24/01/13 - Abner
#descri��o
Altera��es m�dulo Cr�ditos

#changelog
Implementada lista de lan�amentos para o superadmin, incluindo altera��es no status (ativo, inativo, cancelado) e lista de lan�amentos cancelados

#known issues


#todo
a��es com marcados

================================================================================
================================================================================
v0.17
23/01/13 - Abner
#descri��o
Altera��es m�dulo Cr�ditos

#changelog
Implementada lista de lan�amentos (extrato) por usu�rio

#known issues


#todo

================================================================================
================================================================================
v0.16
22/01/13 - Abner
#descri��o
Altera��es m�dulo Cr�ditos

#changelog
Corre��es na lista de boletos
Implementadas a��es para sele��o multipla
Iniciada lista de creditos->usuario

#known issues
BUG: a��es com marcados


#todo


================================================================================
================================================================================
v0.15
21/01/13 - Abner
#descri��o
Implementada lista de boletos

#changelog
Cria��o da view e controller listar
Implementadas fun��es de marca��o: em aberto, vencido, cancelado, pago
Cria��o de constantes para defini��o de s�mbolo de moeda corrente

#known issues
H� 2 campos com valor. Confirmar qual deve ser exibido na lista
Confirmar qual tipo de exibi��o de moeda corrente: ISO4217 ou Local


#todo
a��es com marcados

================================================================================
================================================================================
v0.14
18/01/13 - Abner
#descri��o
Corre��es de intera��o com Banco de Dados

#changelog
Corre��es em usuario.php e facility.php
Implementado gerenciamento de administradores de facilities
Adicionado campo de altera��o de status em facilities/editar/

#known issues



#todo
Upload de arquivos
Implementar calend�rio

================================================================================
================================================================================

v0.13
17/01/13 - Abner
#descri��o
Corre��es na lista de facilities

#changelog
Corre��o na cria��o e edi��o de facilities
Inclus�o de op��o de excluir facility (superadmin apenas)
Altera��o de queries para padr�o DataMapper
Corre��o de fluxo de dados  formulario de cadastro de facilities -> action incluir

#known issues



#todo
Upload de arquivos
Salvar rela��o facility <=> usu�rio no cadastro da facility

================================================================================
================================================================================
v0.12
16/01/13 - Abner
#descri��o
Corre��es na lista de facilities

#changelog
Implementada navega��o de p�gina por bot�es na lista de usu�rios
Implementada sele��o de ordena��o
Implementada visualiza��o de administradores
Corre��o de BUG: query n�o retornava primeiro resultado

#known issues



#todo
Terminar formata��o da visualiza��o de administradores

================================================================================
================================================================================

v0.11
15/01/13 - Abner
#descri��o
Corre��o na lista de usu�rios

#changelog
Implementada navega��o de p�gina por bot�es na lista de usu�rios

#known issues
Evento de sele��o n�o reinicia select box


#todo
corrigir evento de sele��o das select boxes

================================================================================
================================================================================

v0.10
03/01/13 - Thais
#descri��o
Criada todas as views do m�dulo facilities

#changelog
Implementada a action de listar facilities(ainda falta alguns ajustes)
Implementada a action de editar facilities(ainda falta alguns ajustes)
Implementada a action de adicionar facilities(ainda falta alguns ajustes)
modal para ver facilities j� implementado
modal para ver extrato das facilities j� implementado

#known issues
jquery de selecionar arquivo ainda n�o est� igual ao do wireframe.
Falta corre��es de bugs de css em todas as views do m�dulo facilitites


#todo
ultimas configura��es do jQuery da p�gina de adicionar facilities
alterar_status
ver (exibir os resultados obtidos do banco de dados)
excluir
extrato (exibir os resultados obtidos do banco de dados)
extrato_pdf
editar_agenda

================================================================================
================================================================================

v0.9
02/01/13 - Thais
#descri��o
Configura��es iniciais do m�dulo facilities.
�ltimos ajustes na dashboard.

#changelog
Atualiza��o dos itens exibidos para o usu�rio na dashboard de acordo com a credencial do usu�rio logado
Iniciada a codifica��o do m�dulo facilitites.
Jquery para sele��o de usu�rios administrativos associados a esta facility - OK


#known issues
jquery para adicionar os arquivos ainda n�o est� funcionando
view Adicionar ainda n�o conclu�da (muitos bugs de css)

#todo
implementa��es jQuery
salvar facilities no banco de dados
listar facilities
editar facilities
alterar_status
ver
excluir
extrato
extrato_pdf
editar_agenda

================================================================================