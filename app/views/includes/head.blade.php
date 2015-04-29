<!--   FAVICON   -->
<link rel="icon" href="{{ URL::to("/") }}/img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="{{ URL::to("/") }}/img/favicon.ico" type="image/x-icon" />
<!--   ESTILO GERAL   -->
<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/style.css" />
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/ie7.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="print" href="{{ URL::to("/") }}/css/print.css" />

<!--[if lt IE 9]>
<script src="{{ URL::to("/") }}/js/html5shiv.js"></script>
<![endif]-->

<!-- FACEBOOK -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '344371539091709',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>