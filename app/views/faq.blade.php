@extends('layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<!--   JQUERY - Google Ajax API CDN (Also supports SSL via HTTPS)   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-ui-1.8.17.custom.min.js"></script>

<!--   JQUERY - Validate   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.validate.js"></script>

<!--   JS - Masked input   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/masked-input.js"></script>

<!-- JS - Font size increment and decrement -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/font_increment.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.tools.min.js"></script>

<!-- Google Maps API -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>

@stop

@section('content')

    <!--   MEIO DO SITE - ÁREA DE NAVEGAÇÃO   -->
    <div id="content" class="container">
      <!--   COLUNA ESQUERDA   -->
      <div class="eight columns">
        <!--   CONTEÚDO SOBRE O PROJETO   -->
       <h1 id="project_title">Ajuda - Perguntas e Respostas mais frequentes</h1>
        <div id="project_text_tools">
	        <a href="#"  title="Imprimir" id="printer_icon"></a>
        </div>
        <!--   TEXTO DO PROJETO   -->
        <div id="project_text">
        <br />
        
           <h3> Posso fazer uso comercial das imagens do Arquigrafia? </h3> 
           Se a licença Creative Commons atribuída pelo autor da imagem permitir esse uso sim - Atribuição (BY) -, desde que seja dado crédito pela criação original. Se a licença restringir o uso comercial, não há permissão do autor para tanto, e eventuais usos indevidos estarão sujeitos às penalidades legais cabíveis.
           <br />
           <br />
        
           <h3> Posso utilizar as imagens do Arquigrafia em publicações? </h3> 
           Se a publicação for comercializada, cabem os esclarecimentos refentes ao uso comercial de imagens do Arquigrafia. Se a publicação não for comercializada, o uso das imagens deve ser pautado pela licença Creative Commons atribuída pelo autor. Em todo caso, a autoria deve sempre ser mencionada.
           <br />
           <br />
        
           <h3> Todas as imagens do Arquigrafia tem a mesma licença Creative Commons? </h3> 
           Não, cada autor atribui uma licença específica às suas imagens, e pode mesmo atribuir licenças distintas para cada uma de suas imagens.
           <br />
           <br />
        
           <h3> Se eu fizer um download de uma imagem do Acervo da Biblioteca da FAU no Arquigrafia, como posso reconhecer esta imagem depois, em meio a outras nos meus arquivos pessoais? </h3> 
           Clicando com o botão direito do mouse sobre a imagem acesse ‘Propriedades’. Em seguida entre em ‘Detalhes’ e verifique a propriedade ‘Origem’, no qual constam os Direitos Autorais, e outros metadados.. A informação que consta neste campo irá mencionar FAU e depois a licença CC atribuída pelo autor ou por seus familiares, como por exemplo: FAU - Creative Commons 3.0 BY-NC-ND
           <br />
           <br />
        
           <h3> Como faço para remover uma fotografia que enviei? </h3> 
           Entre em seu perfil de usuário e em ‘Minhas imagens’ clique sobre a imagem que deseja remover. Assim que a imagem for ampliada clique no ícone ‘Remover foto’. 
           <br />
           <br />
           
          <h3>Outras perguntas</h3>
          <p> Caso ainda tenha dúvidas entre contato com nossa equipe usando o email <a href="mailto:arquigrafiabrasil@gmail.com " target="_blank">arquigrafiabrasil@gmail.com</a>.</p>
	 	</div>
        <!--   FIM - TEXTO DO PROJETO   -->
      </div>
      <!--   FIM - COLUNA ESQUERDA   -->
      <!--   COLUNA DIREITA   -->
      <div class="four columns">
        <h2>Ainda precisando de Ajuda?</h2>
		<h3>Entre em contato com nossa equipe</h3>
        <p> Esta é uma versão beta do Arquigrafia e ainda pode conter erros. Caso tenha alguma dificuldade ou perceba problemas na navegação escreva para: <a href="mailto:arquigrafiabrasil@gmail.com " target="_blank">arquigrafiabrasil@gmail.com</a>.</p>
      </div>
      <!--   FIM - COLUNA DIREITA   -->
    </div>
    <!--   FIM - MEIO DO SITE-->

@stop