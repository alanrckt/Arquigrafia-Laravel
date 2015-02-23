@extends('layouts.default')

@section('head')

<title>Arquigrafia - Fotos - Upload</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- <script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-ui-1.8.17.custom.min.js"></script> -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/upload.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.js"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/textext.css" />

@stop

@section('content')

  <script>
    $( window ).load(function() {
      $("#preview_photo").hide();
    });
  </script>

  <div class="container">
    
      {{ Form::open(array('url'=>'photos', 'files'=> true)) }}    
      <!-- Formulário inicial -->
      
      <!-- STEP 1 -->
      <div class="twelve columns row step-1">
      	<h1><!-- <span class="step">1</span>  --><span class="step-text">Upload</span></h1>
        
        <div class="four columns alpha">
          <img src="" id="preview_photo">

          <p>{{ Form::label('photo','Imagem:') }} {{ Form::file('photo', array('id'=>'imageUpload', 'onchange' => 'readURL(this);')) }}</p>
          <br>
        </div>
      </div>

      <script type="text/javascript">
        function readURL(input) {
          $("#preview_photo").hide();
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#preview_photo')
                .attr('src', e.target.result)
                .width(600);
                $("#preview_photo").show();
            };
            reader.readAsDataURL(input.files[0]);
          }
        }
      </script>

      <!-- STEP 2 -->
      <div id="registration" class="twelve columns row step-2">
      	<h1><span class="step-text">Descrição</span></h1>
          
          <p>(*) Campos obrigatórios.</p>
          <br />
          
          <div class="five columns alpha row">
        	<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="120"><label>Título*:</label></td>
              <td><input name="photo_name" type="text" class="text" placeholder="Residência Sylvio Bresser Pereira"></td>
            </tr>
            <tr>
              <td><label>Autor da imagem*:</label></td>
              <td><input name="photo_imageAuthor" type="text" class="text" value="{{ ucfirst(Auth::user()->name) }}"></td>
            </tr>
            <tr>
              <td><label>Tags*:</label></td>
              <td>
              	<textarea class="input_content" id="tags" name="tags"></textarea>
              	<script type="text/javascript">
                  $('#tags').textext({ plugins: 'tags' });
									/*
                  $('#tags').textext({
											// plugins : 'tags prompt autocomplete ajax',
                      plugins : 'tags prompt autocomplete ajax',
											prompt : 'tags',
                      ajax : {
													url : 'http://localhost/arquigrafia/public/tags/json',
													dataType : 'json',
													cacheResults : true
											}
                      
									});
                  */
								</script>
                <p class="reminder"><small>* Separe as tags com um ENTER.</small></p>
              </td>
            </tr>
          </table>
          </div>
          
          <br class="clear">
          
          <div class="five columns alpha row">
          	<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><label>País*:</label></td>
                <td><select name="photo_country" class="input_content" id="countries"><option value="Afeganistão">Afeganistão</option><option value="África do Sul">África do Sul</option><option value="Albânia">Albânia</option><option value="Alemanha">Alemanha</option><option value="América Samoa">América Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antartida">Antartida</option><option value="Antigua">Antigua</option><option value="Antigua e Barbuda">Antigua e Barbuda</option><option value="Arábia Saudita">Arábia Saudita</option><option value="Argentina">Argentina</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Barbados">Barbados</option><option value="Bélgica">Bélgica</option><option value="Belize">Belize</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolívia">Bolívia</option><option value="Botswana">Botswana</option><option value="Brasil" selected="selected">Brasil</option><option value="Brunei">Brunei</option><option value="Bulgária">Bulgária</option><option value="Burundi">Burundi</option><option value="Cabo Verde">Cabo Verde</option><option value="Camboja">Camboja</option><option value="Canadá">Canadá</option><option value="Chade">Chade</option><option value="Chile">Chile</option><option value="China">China</option><option value="Cingapura">Cingapura</option><option value="Colômbia">Colômbia</option><option value="Djibouti">Djibouti</option><option value="Dominicana">Dominicana</option><option value="Emirados Árabes">Emirados Árabes</option><option value="Equador">Equador</option><option value="Espanha">Espanha</option><option value="Estados Unidos">Estados Unidos</option><option value="Fiji">Fiji</option><option value="Filipinas">Filipinas</option><option value="Finlândia">Finlândia</option><option value="França">França</option><option value="Gabão">Gabão</option><option value="Gaza Strip">Gaza Strip</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Granada">Granada</option><option value="Grécia">Grécia</option><option value="Guadalupe">Guadalupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guiana">Guiana</option><option value="Guiana Francesa">Guiana Francesa</option><option value="Haiti">Haiti</option><option value="Holanda">Holanda</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungria">Hungria</option><option value="Ilha Cocos (Keeling)">Ilha Cocos (Keeling)</option><option value="Ilha Cook">Ilha Cook</option><option value="Ilha Marshall">Ilha Marshall</option><option value="Ilha Norfolk">Ilha Norfolk</option><option value="Ilhas Turcas e Caicos">Ilhas Turcas e Caicos</option><option value="Ilhas Virgens">Ilhas Virgens</option><option value="Índia">Índia</option><option value="Indonésia">Indonésia</option><option value="Inglaterra">Inglaterra</option><option value="Irã">Irã</option><option value="Iraque">Iraque</option><option value="Irlanda">Irlanda</option><option value="Irlanda do Norte">Irlanda do Norte</option><option value="Islândia">Islândia</option><option value="Israel">Israel</option><option value="Itália">Itália</option><option value="Iugoslávia">Iugoslávia</option><option value="Jamaica">Jamaica</option><option value="Japão">Japão</option><option value="Jersey">Jersey</option><option value="Kirgizstão">Kirgizstão</option><option value="Kiribati">Kiribati</option><option value="Kittsnev">Kittsnev</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Lesotho">Lesotho</option><option value="Líbano">Líbano</option><option value="Líbia">Líbia</option><option value="Liechtenstein">Liechtenstein</option><option value="Luxemburgo">Luxemburgo</option><option value="Maldivas">Maldivas</option><option value="Malta">Malta</option><option value="Marrocos">Marrocos</option><option value="Mauritânia">Mauritânia</option><option value="Mauritius">Mauritius</option><option value="México">México</option><option value="Moçambique">Moçambique</option><option value="Mônaco">Mônaco</option><option value="Mongólia">Mongólia</option><option value="Namíbia">Namíbia</option><option value="Nepal">Nepal</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="Nicarágua">Nicarágua</option><option value="Nigéria">Nigéria</option><option value="Noruega">Noruega</option><option value="Nova Zelândia">Nova Zelândia</option><option value="Omã">Omã</option><option value="Panamá">Panamá</option><option value="Paquistão">Paquistão</option><option value="Paraguai">Paraguai</option><option value="Peru">Peru</option><option value="Polinésia Francesa">Polinésia Francesa</option><option value="Polônia">Polônia</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Quênia">Quênia</option><option value="República Dominicana">República Dominicana</option><option value="Romênia">Romênia</option><option value="Rússia">Rússia</option><option value="Santa Helena">Santa Helena</option><option value="Santa Kitts e Nevis">Santa Kitts e Nevis</option><option value="Santa Lúcia">Santa Lúcia</option><option value="São Vicente">São Vicente</option><option value="Singapura">Singapura</option><option value="Síria">Síria</option><option value="Spiemich">Spiemich</option><option value="Sudão">Sudão</option><option value="Suécia">Suécia</option><option value="Suiça">Suiça</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Tailândia">Tailândia</option><option value="Taiwan">Taiwan</option><option value="Tchecoslováquia">Tchecoslováquia</option><option value="Tonga">Tonga</option><option value="Trinidad e Tobago">Trinidad e Tobago</option><option value="Turksccai">Turksccai</option><option value="Turquia">Turquia</option><option value="Tuvalu">Tuvalu</option><option value="Uruguai">Uruguai</option><option value="Vanuatu">Vanuatu</option><option value="Wallis e Fortuna">Wallis e Fortuna</option><option value="West Bank">West Bank</option><option value="Yémen">Yémen</option><option value="Zaire">Zaire</option><option value="Zimbabwe">Zimbabwe</option></select></td>
              </tr>
              <tr>
                <td><label>Estado*:</label></td>
                <td><select name="photo_state" id="state" class="input_content"><option selected="" value="">Escolha o Estado</option><option value="AC">Acre</option><option value="AL">Alagoas</option><option value="AM">Amazonas</option><option value="AP">Amapá</option><option value="BA">Bahia</option><option value="CE">Ceará</option><option value="DF">Distrito Federal</option><option value="ES">Espirito Santo</option><option value="GO">Goiás</option><option value="MA">Maranhão</option><option value="MG">Minas Gerais</option><option value="MS">Mato Grosso do Sul</option><option value="MT">Mato Grosso</option><option value="PA">Pará</option><option value="PB">Paraíba</option><option value="PE">Pernambuco</option><option value="PI">Piauí</option><option value="PR">Paraná</option><option value="RJ">Rio de Janeiro</option><option value="RN">Rio Grande do Norte</option><option value="RO">Rondônia</option><option value="RR">Roraima</option><option value="RS">Rio Grande do Sul</option><option value="SC">Santa Catarina</option><option value="SE">Sergipe</option><option value="SP">São Paulo</option><option value="TO">Tocantins</option></select></td>
              </tr>
              <tr>
                <td><label>Cidade*:</label></td>
                <!--
                <td><select name="photo_city" id="city" class="input_content" disabled="disabled">
              <option selected="" value="">Escolha uma cidade</option>
          	</select></td>
                -->
                <td>{{ Form::text('photo_city') }}</td>
              </tr>
              <tr>
                <td><label>Bairro:</label></td>
                <td><input name="photo_district" type="text" class="text" placeholder="Morumbi"></td>
              </tr>
              <tr>
                <td><label>Logradouro:</label></td>
                <td><input name="photo_street" type="text" class="text" placeholder="Rua São Bráulio, 427"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

            </table>
          	
          </div>
          
          <div class="five columns omega row">
          	<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><label>Data da imagem:</label></td>
                <td><input name="photo_imageDate" type="text" class="text" id="imageDate" placeholder="01/01/01"></td>
              </tr>
              <tr>
                <td><label>Autor da obra:</label></td>
                <td><input name="photo_workAuthor" type="text" class="text" id="workAuthor"></td>
              </tr>	
              <tr>
                <td><label>Data da obra:</label></td>
                <td><input name="photo_workDate" type="text" class="text" id="workDate" placeholder="01/01/01"></td>
              </tr>
              <tr>
                <td><label>Descrição:</label></td>
                <td><textarea name="photo_description" class="input_content"></textarea>
                </td>
              </tr>
            </table>
          </div>
        	
          <div class="twelve columns omega row">
            <p> 
               <input name="terms" type="checkbox" value="read" id="creative_commons_text_checkbox"> Sou o autor da imagem ou possuo permissão expressa do autor para disponibilizá-la no Arquigrafia. 
               <br>
               <label for="terms" generated="true" class="error" style="display: inline-block; "></label>
               <br>
               Escolho a licença <a href="http://creativecommons.org/licenses/?lang=pt_BR" id="creative_commons" target="_blank" style="text-decoration:underline; line-height:16px;">Creative Commons</a>, para publicar minha obra, com as seguintes permissões:
            </p>          
					</div>
           
          <div class="four columns" id="creative_commons_left_form">
            Permitir o uso comercial da sua obra?
            <br>
             <div class="form-row">
              <input type="radio" name="photo_allowCommercialUses" value="YES" id="photo_allowCommercialUses" checked="checked">
              <label for="photo_allowCommercialUses">Sim</label><br class="clear">
             </div>
             <div class="form-row">
              <input type="radio" name="photo_allowCommercialUses" value="NO" id="photo_allowCommercialUses">
              <label for="photo_allowCommercialUses">Não</label><br class="clear">
             </div>
            
          </div>
          <div class="four columns" id="creative_commons_right_form">
            Permitir modificações em sua obra?
            <br>
            <div class="form-row">
              <input type="radio" name="photo_allowModifications" value="YES" id="photo_allowModifications" checked="checked">
              <label for="question_3-5">Sim</label><br class="clear">
            </div>
           	<div class="form-row">
              <input type="radio" name="photo_allowModifications" value="YES_SA" id="photo_allowModifications">
              <label for="question_3-5">Sim, contanto que os outros compartilhem de forma semelhante</label><br class="clear">
             </div>
           	<div class="form-row">
              <input type="radio" name="photo_allowModifications" value="NO" id="photo_allowModifications">
              <label for="question_3-5">Não</label><br class="clear">
            </div>
            
          </div>
        
          <div class="twelve columns">
            <input name="enviar" type="submit" class="btn" value="ENVIAR">
          </div>
        
      </div>
      
      {{ Form::close() }}

    </div>
    
@stop