@extends('layouts.default')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/textext.js"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/textext.css" />




@section('content')

  <div class="container">     
    {{ Form::open(array('url'=>'users/' . $user->id, 'method' => 'put', 'files'=> true)) }}
    
    <div id="registration">
    
      <div class="twelve columns">
        <h1>Perfil</h1>
        <p>   
        <div>            
            <?php if ($user->photo != "") { ?>
              <img class="avatar" src="{{ asset($user->photo) }}" class="user_photo_thumbnail"/>
            </a>
            <?php } else { ?>
              <img class="avatar" src="{{ asset("img/avatar-60.png") }}" width="60" height="60" class="user_photo_thumbnail"/>
            <?php } ?>
          </div>     
        </p>
      </div>
      <p>
      </p>
      
      <div class="four columns">       

        <div class="twelve columns row step-1">
        
                
        <div class="four columns alpha">
          <img src="" id="preview_photo">
          <p>{{ Form::label('photo','Alterar foto:') }} {{ Form::file('photo', array('id'=>'imageUpload', 'onchange' => 'readURL(this);')) }}</p>
          <br>
        </div>
      </div>

     <!--<img src="" id="preview_photo">
          <p>{{ Form::label('photo','Alterar foto:') }} {{ Form::file('photo', array('id'=>'imageUpload', 'onchange' => 'readURL(this);')) }}</p>
          <br> -->

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


      
        {{ Form::open(array('url' => 'users')) }}
          <div class="two columns alpha"><p>{{ Form::label('name', 'Nome completo:') }}</p></div>
          <div class="two columns omega">            
            <p>{{Form::text('name', $user->name)}} <br>
            {{ $errors->first('name') }}</p>
          </div>
          
          <!-- Alterar tabela users no bd: trocar campo lastName para nickname -->
          <div class="two columns alpha"><p>{{ Form::label('lastName', 'Apelido:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('lastName', $user->lastName) }} <br>
            {{ $errors->first('lastName') }}</p>
          </div>


         <div class="two columns alpha"><p>{{ Form::label('birthday', 'Data de nascimento:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('birthday', $user->birthday) }} 
            <input name="visibleBirthday" type="checkbox" value="yes" {{$user->visibleBirthday == 'yes' ? "checked" : ""}}>Visível no perfil público <br>
            {{ $errors->first('birthday') }}</p>
            
          </div>

          <div class="two columns alpha" >
            <p>Sexo: </p>
          </div>
          <div class="two columns omega">
             <!--<div class="form-row"> -->
              <input type="radio" name="gender" value="female" id="gender" {{$user->gender == 'female' ? "checked" : ""}}>
              <label for="gender">Feminino</label><br class="clear">
             <!--</div>
             <div class="form-row">-->
              <input type="radio" name="gender" value="male" id="gender" {{$user->gender == 'male' ? "checked" : ""}}>
              <label for="gender">Masculino</label><br class="clear">
          </div>

          <div class="two columns alpha"><p>{{ Form::label('login', 'Login:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('login', $user->login) }}<br>
            {{ $errors->first('login') }}</p>
          </div>
          
          <div class="two columns alpha"><p>{{ Form::label('email', 'E-mail:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('email', $user->email) }} 
            <input name="visibleEmail" type="checkbox" value="yes" {{$user->visibleEmail == 'yes' ? "checked" : ""}}>Visível no perfil público<br>
            {{ $errors->first('email') }}</p>            
          </div>

        <div class="two columns alpha"><p>{{ Form::label('country', 'País:') }}</p></div>
        <div class="two columns omega">        
          <p>{{ Form::select('country', [ "Afeganistão"=>"Afeganistão", "África do Sul"=>"África do Sul", "Albânia"=>"Albânia", "Alemanha"=>"Alemanha", "América Samoa"=>"América Samoa", "Andorra"=>"Andorra", "Angola"=>"Angola", "Anguilla"=>"Anguilla", "Antartida"=>"Antartida", "Antigua"=>"Antigua", "Antigua e Barbuda"=>"Antigua e Barbuda", "Arábia Saudita"=>"Arábia Saudita", "Argentina"=>"Argentina", "Aruba"=>"Aruba", "Australia"=>"Australia", "Austria"=>"Austria", "Bahamas"=>"Bahamas", "Bahrain"=>"Bahrain", "Barbados"=>"Barbados", "Bélgica"=>"Bélgica", "Belize"=>"Belize", "Bermuda"=>"Bermuda", "Bhutan"=>"Bhutan", "Bolívia"=>"Bolívia", "Botswana"=>"Botswana", "Brasil"=>"Brasil", "Brunei"=>"Brunei", "Bulgária"=>"Bulgária", "Burundi"=>"Burundi", "Cabo Verde"=>"Cabo Verde", "Camboja"=>"Camboja", "Canadá"=>"Canadá", "Chade"=>"Chade", "Chile"=>"Chile", "China"=>"China", "Cingapura"=>"Cingapura", "Colômbia"=>"Colômbia", "Djibouti"=>"Djibouti", "Dominicana"=>"Dominicana", "Emirados Árabes"=>"Emirados Árabes", "Equador"=>"Equador", "Espanha"=>"Espanha", "Estados Unidos"=>"Estados Unidos", "Fiji"=>"Fiji", "Filipinas"=>"Filipinas", "Finlândia"=>"Finlândia", "França"=>"França", "Gabão"=>"Gabão", "Gaza Strip"=>"Gaza Strip", "Ghana"=>"Ghana", "Gibraltar"=>"Gibraltar", "Granada"=>"Granada", "Grécia"=>"Grécia", "Guadalupe"=>"Guadalupe", "Guam"=>"Guam", "Guatemala"=>"Guatemala", "Guernsey"=>"Guernsey", "Guiana"=>"Guiana", "Guiana Francesa"=>"Guiana Francesa", "Haiti"=>"Haiti", "Holanda"=>"Holanda", "Honduras"=>"Honduras", "Hong Kong"=>"Hong Kong", "Hungria"=>"Hungria", "Ilha Cocos (Keeling)"=>"Ilha Cocos (Keeling)", "Ilha Cook"=>"Ilha Cook", "Ilha Marshall"=>"Ilha Marshall", "Ilha Norfolk"=>"Ilha Norfolk", "Ilhas Turcas e Caicos"=>"Ilhas Turcas e Caicos", "Ilhas Virgens"=>"Ilhas Virgens", "Índia"=>"Índia", "Indonésia"=>"Indonésia", "Inglaterra"=>"Inglaterra", "Irã"=>"Irã", "Iraque"=>"Iraque", "Irlanda"=>"Irlanda", "Irlanda do Norte"=>"Irlanda do Norte", "Islândia"=>"Islândia", "Israel"=>"Israel", "Itália"=>"Itália", "Iugoslávia"=>"Iugoslávia", "Jamaica"=>"Jamaica", "Japão"=>"Japão", "Jersey"=>"Jersey", "Kirgizstão"=>"Kirgizstão", "Kiribati"=>"Kiribati", "Kittsnev"=>"Kittsnev", "Kuwait"=>"Kuwait", "Laos"=>"Laos", "Lesotho"=>"Lesotho", "Líbano"=>"Líbano", "Líbia"=>"Líbia", "Liechtenstein"=>"Liechtenstein", "Luxemburgo"=>"Luxemburgo", "Maldivas"=>"Maldivas", "Malta"=>"Malta", "Marrocos"=>"Marrocos", "Mauritânia"=>"Mauritânia", "Mauritius"=>"Mauritius", "México"=>"México", "Moçambique"=>"Moçambique", "Mônaco"=>"Mônaco", "Mongólia"=>"Mongólia", "Namíbia"=>"Namíbia", "Nepal"=>"Nepal", "Netherlands Antilles"=>"Netherlands Antilles", "Nicarágua"=>"Nicarágua", "Nigéria"=>"Nigéria", "Noruega"=>"Noruega", "Nova Zelândia"=>"Nova Zelândia", "Omã"=>"Omã", "Panamá"=>"Panamá", "Paquistão"=>"Paquistão", "Paraguai"=>"Paraguai", "Peru"=>"Peru", "Polinésia Francesa"=>"Polinésia Francesa", "Polônia"=>"Polônia", "Portugal"=>"Portugal", "Qatar"=>"Qatar", "Quênia"=>"Quênia", "República Dominicana"=>"República Dominicana", "Romênia"=>"Romênia", "Rússia"=>"Rússia", "Santa Helena"=>"Santa Helena", "Santa Kitts e Nevis"=>"Santa Kitts e Nevis", "Santa Lúcia"=>"Santa Lúcia", "São Vicente"=>"São Vicente", "Singapura"=>"Singapura", "Síria"=>"Síria", "Spiemich"=>"Spiemich", "Sudão"=>"Sudão", "Suécia"=>"Suécia", "Suiça"=>"Suiça", "Suriname"=>"Suriname", "Swaziland"=>"Swaziland", "Tailândia"=>"Tailândia", "Taiwan"=>"Taiwan", "Tchecoslováquia"=>"Tchecoslováquia", "Tonga"=>"Tonga", "Trinidad e Tobago"=>"Trinidad e Tobago", "Turksccai"=>"Turksccai", "Turquia"=>"Turquia", "Tuvalu"=>"Tuvalu", "Uruguai"=>"Uruguai", "Vanuatu"=>"Vanuatu", "Wallis e Fortuna"=>"Wallis e Fortuna", "West Bank"=>"West Bank", "Yémen"=>"Yémen", "Zaire"=>"Zaire", "Zimbabwe"=>"Zimbabwe"], $user->country != null ? $user->country : "Brasil") }}<br>
        {{ $errors->first('country') }}</p>
        </div>

        <div class="two columns alpha"><p>{{ Form::label('state', 'Estado:') }}</p></div>
        <div class="two columns omega">
          <p>{{ Form::select('state', [""=>"Escolha o Estado", "AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá", "BA"=>"Bahia", "CE"=>"Ceará", "DF"=>"Distrito Federal", "ES"=>"Espirito Santo", "GO"=>"Goiás", "MA"=>"Maranhão", "MG"=>"Minas Gerais", "MS"=>"Mato Grosso do Sul", "MT"=>"Mato Grosso", "PA"=>"Pará", "PB"=>"Paraíba", "PE"=>"Pernambuco", "PI"=>"Piauí", "PR"=>"Paraná", "RJ"=>"Rio de Janeiro", "RN"=>"Rio Grande do Norte", "RO"=>"Rondônia", "RR"=>"Roraima", "RS"=>"Rio Grande do Sul", "SC"=>"Santa Catarina", "SE"=>"Sergipe", "SP"=>"São Paulo", "TO"=>"Tocantins"], $user->state) }} <br>
        {{ $errors->first('state') }}</p>
        </div>

        <div class="two columns alpha"><p>{{ Form::label('city', 'Cidade:') }}</p></div>
        <div class="two columns omega">
        <p>{{ Form::text('city', $user->city) }}<br>
        {{ $errors->first('city') }}</p>
        </div>

          <div class="two columns alpha"><p>{{ Form::label('scholarity', 'Escolaridade:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('scholarity', $user->scholarity) }} <br>
            {{ $errors->first('scholarity') }}</p>
          </div>

          <div class="two columns alpha"><p>{{ Form::label('institution', 'Instituição:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('institution', $user->occupation != null && $user->occupation->institution != null ? $user->occupation->institution : null) }} <br>
            {{ $errors->first('institution') }}</p>
          </div>

          <div class="two columns alpha"><p>{{ Form::label('occupation', 'Profissão:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('occupation', $user->occupation != null && $user->occupation->occupation != null ? $user->occupation->occupation : null) }} <br>
            {{ $errors->first('occupation') }}</p>
          </div>          

          <div class="two columns alpha"><p>{{ Form::label('site', 'Site pessoal:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::text('site', $user->site) }}<br>
            {{ $errors->first('site') }}</p>
          </div>
          
          <!--<div class="two columns alpha"><p>{{ Form::label('password', 'Senha:') }}</p></div>
          <div class="two columns omega">
            <p>{{ Form::password('password') }}<br>
            {{ $errors->first('password') }}</p>
          </div>
          
          <div class="two columns row alpha"><p>{{ Form::label('password_confirmation', 'Repita a senha:') }}</p></div>
          <div class="two columns row omega"><p>{{ Form::password('password_confirmation') }}</p></div>-->

          
          <div class="four columns alpha omega">  
          
            <br>
            <p>{{ Form::submit("EDITAR", array('class'=>'btn right')) }}</p>
    
            
          
          </div>

          
        {{ Form::close() }}
        
        <p>&nbsp;</p>
        
      </div>
      
    </div>
    
  </div>
    
@stop