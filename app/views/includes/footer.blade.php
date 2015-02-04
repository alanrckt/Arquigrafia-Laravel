	
  <!-- ANALYTICS -->
  <script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-20571872-1']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
  
  <!--   RODAPE DO SITE   -->
  <div id="footer" class="container">
    
		<div class="twelve columns">
	
      <!--   CRÉDITOS - LOGOS   -->
      <div id="credits">
        <ul class="footer-links">
          <li><a href="#">Login</a></li>
          <li><a href="#">Cadastrar-se</a></li>
          <li><a href="{{ URL::to("/") }}/project">O projeto</a></li>
          <li><a href="{{ URL::to("/") }}/faq">FAQ</a></li>
          <li><a href="#">Contato</a></li>
        </ul>
        <ul>
          <li><a href="http://www.usp.br/" title="USP" id="usp" target="_blank"></a></li>
          <li><a href="http://www.fapesp.br/" title="FAPESP" id="fapesp" target="_blank"></a></li>
          <li><a href="http://www.rnp.br/" title="RNP" id="rnp" target="_blank"></a></li>
        </ul>
        <ul>
          <li><a href="http://www.cnpq.br/" title="CNPQ" id="cnpq" target="_blank"></a></li>
          <li><a href="http://ccsl.ime.usp.br/" title="CCSL" id="ccsl" target="_blank"></a></li>
          <li><a href="/18/chancela" title="Chancela do Ministério da Cultura" id="chancela" ></a></li>
        </ul>
        <ul>
          <li><a href="http://www.usp.br/fau/" title="FAU" id="fau" target="_blank"></a></li>
          <li><a href="http://www.ime.usp.br/" title="IME" id="ime" target="_blank"></a></li>
          <li><a href="http://www.eca.usp.br/" title="ECA" id="eca" target="_blank"></a></li>
        </ul>
        <ul>
          <li><a href="http://winweb.redealuno.usp.br/quapa/" title="QUAPÁ" id="quapa" target="_blank"></a></li>
          <li><a href="http://www.vitruvius.com.br/" title="Vitruvius" id="vitruvius" target="_blank"></a></li>
        </ul>
        <ul class="last">
          <li><a href="http://www.bench.com.br/" title="Benchmark" id="benchmark" target="_blank"></a></li>
          <li><a href="http://www.brzcomunicacao.com.br/" title="BRZ" id="brz" target="_blank"></a></li>	
        </ul>
      </div>
      <!--   FIM - CRÉDITOS - LOGOS   -->
    
      <div class="footer-last">
        <div class="footer-msg left">
          <div class="footer-logo"></div>
          <p>O Arquigrafia conta com um total de 2825 fotos.<br />
          <?php if (!Auth::check()) { ?>
            <a href="{{ URL::to("/users/login") }}">Faça o login</a> e compartilhe também suas imagens.
          <?php } else { ?>
            Compartilhe também suas imagens.
          <?php } ?>
          </p>
        </div>
          
        <p id="copyright">Arquigrafia - 2013 - Este site é licenciado sob uma licença <a href="http://creativecommons.org/licenses/by/3.0/deed.pt_BR" target="_blank">Creative Commons Attribution 3.0</a></p>
      
      </div>
    
    </div>
    
	</div>
  <!--   FIM - FUNDO DO SITE   -->