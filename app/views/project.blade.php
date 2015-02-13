@extends('layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<!--   JQUERY   -->
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
        
      <div class="eight columns justify">
        <!--   CONTEÚDO SOBRE O PROJETO   -->
        <h1>O Projeto</h1>
        
        <p>O ARQUIGRAFIA é um ambiente colaborativo digital público, sem fins lucrativos, dedicado à difusão de imagens de arquitetura, com especial atenção à arquitetura brasileira. Este projeto é desenvolvido na Faculdade de Arquitetura e Urbanismo da Universidade de São Paulo (FAUUSP), em parceria com o Instituto de Matemática e Estatística (IMEUSP) e a Escola de Comunicação e Artes (ECAUSP). Abrigado desde 2012 no Núcleo de Apoio à Pesquisa em Ambientes Colaborativos na Web (NaWEB), o ARQUIGRAFIA recebeu ao longo de sua história apoio da RNP, da FAPESP, do CNPq e das Pró-Reitorias de Pesquisa e de Cultura e Extensão da USP. O objetivo principal deste projeto é contribuir para o estudo, a docência, a pesquisa e a difusão da cultura arquitetônica e urbanística, ao promover interações colaborativas entre pessoas e instituições na Internet.</p>
        <div class="project-photos clearfix">
        <img class="left" src="img/project_photos/equipe1.jpg" alt="Texto alternativo da foto" title="Título da foto" />
        <img class="left" src="img/project_photos/equipe2.jpg" alt="Texto alternativo da foto" title="Título da foto" />
        <img class="left" src="img/project_photos/equipe3.jpg" alt="Texto alternativo da foto" title="Título da foto" />
        </div>
        <p>Desde 2011 a equipe do projeto ARQUIGRAFIA realiza também um trabalho de conservação e digitalização do acervo original de imagens fotográficas do Setor Audiovisual da Biblioteca da FAU e solicita aos autores de imagens uma autorização específica para difusão de tais fotografias na Internet para fins acadêmicos e de difusão, voltados ao ensino e à pesquisa.</p>
        
        <p>O ARQUIGRAFIA recebeu o primeiro prêmio da Agência de Inovação USP na categoria de Tecnologias Sociais Aplicadas e Humanas em 2011. Em 2012 o projeto recebeu chancela do Ministério da Cultura por sua relevante contribuição à cultura brasileira. Em 2014 o ARQUIGRAFIA foi o projeto selecionado pelo Ministério da Cultura para representar o país na área de Arquitetura no Edital Cultura na Copa.</p>
        
        <p>A equipe do projeto trabalha neste momento para deixar disponível para download um aplicativo Android para acesso ao sistema via smartphones e tablets. Espera-se, assim, estimular os usuários – estudantes de arquitetura, professores, arquitetos, fotógrafos e demais interessados no assunto –, a navegar no acervo georeferenciado do ARQUIGRAFIA enquanto circulam pelas cidades, visualizando as imagens disponíveis, interagindo com outros usuários, e também colaborando para o crescimento contínuo do acervo sempre que enviarem suas próprias imagens para o sistema, com os direitos autorais preservados por licenças Creative Commons.</p>
        <p>Saiba mais: <a href="http://nap.usp.br/naweb/?projetos=arquigrafia" target="_blank">nap.usp.br/naweb/?projetos=arquigrafia</a></p>
        
      </div>
      
      <!--   COLUNA DIREITA   -->
      <div class="four columns">
        <h2>Equipe</h2>
        
        <h3>Coordenador</h3>
        <ul>
          <li><small><a href="http://lattes.cnpq.br/9297674836039953" target="_blank">Prof. Dr. Artur Simões Rozestraten - FAUUSP</a></small></li>
        </ul>
        <br>
        
        <h3>Pesquisadores colaboradores</h3>
        <ul>
          <li><small><a href="http://lattes.cnpq.br/4507073071352893" target="_blank">Prof. Dr. Marco Aurélio Gerosa - IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/5382764179565796" target="_blank">Profa. Dra. Maria Laura Martinez - ECAUSP </a></small></li>
          <li><small><a href="http://lattes.cnpq.br/2342739419247924" target="_blank">Prof. Dr. Fábio Kon - IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/4574831233204082" target="_blank">Prof. Dr. Julio Roberto Katinsky - FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/3841951853755817" target="_blank">Prof. Dr. Luiz Américo de Souza Munari - FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/5218253515771817" target="_blank">Prof. Dr. Abílio Guerra e equipe VITRUVIUS</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/6695382764766281" target="_blank">Profa. Dra. Roberta Lima Gomes - Informática UFES</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/7471111924336519" target="_blank">Prof. Dr. Magnos Martinello - Informática UFES</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/3498148304153540" target="_blank">Prof. Dr. Juliano Maranhão - FDUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/4531433505351729" target="_blank">Profa. Dra. Vania Mara Alves Lima - ECAUSP</a></small></li>
          <li><small>Profa. Dra. Renata Wassermann - IMEUSP</small></li>
          <li><small><a href="http://www.usp.br/fau/fau/secoes/biblio/index.htm" target="_blank">Dina Uliana - Diretora biblioteca FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/4131992141506749" target="_blank">Eliana de Azevedo Marques - Biblioteca FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/7542993440465891" target="_blank">Elizabete da Cruz Neves - Biblioteca FAUUSP</a></small></li>
          <li><small><a href="http://www.usp.br/fau/fau/secoes/biblio/index.html" target="_blank">Rejane Alves - Biblioteca FAUUSP</a></small></li>
          <li><small><a href="http://www.cristianomascaro.com.br/" target="_blank">Prof. Dr. Cristiano Mascaro - Consultor de fotografia</a></small></li>
          <li><small><a href="http://www2.nelsonkon.com.br/" target="_blank">Arq. Nelson Kon - Consultor de fotografia</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/9781300883115022" target="_blank">Arq. Rodrigo Luiz Minot Gutierrez - SENAC / UNIUBE</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/6686522394728149" target="_blank">Arq. Leandro Lopes - ECAUSP</a></small></li>
        </ul>
        <br>
        
        <h3>Alunos participantes</h3>
        <ul>
          <li><small><a href="http://lattes.cnpq.br/0999376629124379" target="_blank">Ana Paula Oliveira dos Santos - Mestre IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/3098839514190572" target="_blank">Aurelio Akira M. Matsui - Doutorando Universidade de Tokyo</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/8776038016041917" target="_blank">Straus Michalsky - Doutorando IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/2605934447999302" target="_blank">José Teodoro - Mestrando IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/3693915918069542" target="_blank">André Luís de Lima - Mestrando FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/3965923523593288">Lucas Santos de Oliveira - Mestre IMEUSP</a> </small></li>
          <li><small>Victor Williams Stafusa da Silva – Mestre IMEUSP</small> </li>
          <li><small><a href="http://lattes.cnpq.br/2350572278366806">Carlos Leonardo Herrera Muñoz - Mestrando IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/2452505576333369">Edith Zaida Sonco Mamani - Mestranda IMEUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/2605934447999302">José Teodoro - Mestrando IMEUSP</a> </small></li>
          <li><small>Laécio Freitas – Mestrando IMEUSP </small></li>
          <li><small>André Jin Teh Chou – Graduando FAUUSP</small></li>
          <li><small><a href="#" target="_blank">Amanda Stenghel - Graduanda FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Ana Clara Souza Santana - Graduanda FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/3715644973427707" target="_blank">Bhakta Krpa das Santos - Graduando FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Bruna Sellin Trevelin - Graduanda Direito USP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/0523942267027344" target="_blank">Diogo Augusto - Graduando em IC FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/1387924249101546" target="_blank">Enzo Toshio S. L. de Mello - FITO</a></small></li>
          <li><small><a href="#" target="_blank">Fernanda Adams Domingos - Graduanda FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Gabriela Previdello Ferreira Orth - Graduanda ECAUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/5529848738416350" target="_blank">Guilherme A. Nogueira Cesar - Graduando FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Giuliano Magnelli - Graduando FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/7968062612895669" target="_blank">Ilka Apocalypse Jóia Paulini - Graduanda FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Isabella Mendonça - Graduanda IMEUSP</a></small></li>
          <li><small><a href="#" target="_blank">Jéssica Maria Neves Lúcio - Graduanda FAUUSP</a></small></li>
          <li><small>Joel Marques – Graduando FAUUSP </small></li>
          <li><small><a href="#" target="_blank">Karina Silva de Souza - Graduanda FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Kevin Ritschel - Graduando FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/7328149928743537" target="_blank">Lucas Caracik - Graduando em IC FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/0908900989509491" target="_blank">Luciana Molinari Monteforte - Graduanda FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Marina de Souza Barbosa Ferreira - Graduanda ECAUSP</a></small></li>
          <li><small><a href="#" target="_blank">Martim Passos - Graduando FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Nita Napoleão Encola - Graduanda ECAUSP</a></small></li>
          <li><small><a href="#" target="_blank">Renato Veras de Paiva - Graduando ECAUSP</a></small></li>
          <li><small><a href="#" target="_blank">Rodrigo Ciorciari Salandim - Graduando EACHUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/8004254725476493" target="_blank">Ruth Cuiá Troncarelli - Graduanda FAUUSP</a></small></li>
          <li><small><a href="http://lattes.cnpq.br/9088835359158147" target="_blank">Samuel Carvalho G. Fukumoto - Graduando FAUUSP</a></small></li>
          <li><small><a href="">Tatiana Kuchar – Graduanda FAUUSP</a></small></li>
          <li><small><a href="">Thaísa Miyahara – Graduanda FAUUSP</a></small></li>
          <li><small><a href="#" target="_blank">Valdeci Antônio dos Santos - Graduando ECAUSP</a></small></li>
        </ul>
        <br>
        
        <h3>Parceiros de desenvolvimento</h3>
        <ul>
          <li><small><a href="http://www.bench.com.br/" target="_blank">Jean Pierre Chamouton - Benchmark Design Total</a></small></li>
          <li><small><a href="http://www.rckt.com.br/" target="_blank">Pedro Emilio Guglielmo - RCKT</a></small></li>
          <li><small><a href="http://www.brzcomunicacao.com.br/" target="_blank">Tiago Ortlieb - BRZ Comunicação</a></small></li>
          <li><small><a href="http://www.wikimedia.org/" target="_blank">Alexandre Hannud Abdo - Wikimedia</a></small></li>						
        </ul>
      </div>
      <!--   FIM - COLUNA DIREITA   -->
      
    </div>
    <!--   FIM - MEIO DO SITE-->

@stop
