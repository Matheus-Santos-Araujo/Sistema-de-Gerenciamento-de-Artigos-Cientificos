<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <style>
            .nav-side-menu li .active {
                border-left: 3px solid #d19b3d;
                background-color: #4f5b69;
              }
              .nav-side-menu ul .sub-menu li.active,
              .nav-side-menu li .sub-menu li.active {
                color: #d19b3d;
              }
              .nav-side-menu ul .sub-menu l.nav-side-menu {
                overflow: auto;
                font-family: verdana;
                font-size: 12px;
                font-weight: 200;
                background-color: #2e353d;
                position: fixed;
                top: 0px;
                width: 300px;
                height: 100%;
                color: #e1ffff;
              }
              .nav-side-menu .brand {
                background-color: #2d9402;
                line-height: 50px;
                display: block;
                text-align: center;
                font-size: 14px;
              }
              .nav-side-menu .toggle-btn {
                display: none;
              }
              .nav-side-menu ul,
              .nav-side-menu li {
                list-style: none;
                padding: 0px;
                margin: 0px;
                line-height: 35px;
                cursor: pointer;
                /*    
                  .collapsed{
                     .arrow:before{
                               font-family: FontAwesome;
                               content: "\f053";
                               display: inline-block;
                               padding-left:10px;
                               padding-right: 10px;
                               vertical-align: middle;
                               float:right;
                          }
                   }
              */
              }
              .nav-side-menu ul :not(collapsed) .arrow:before,
              .nav-side-menu li :not(collapsed) .arrow:before {
                font-family: FontAwesome;
                content: "\f078";
                display: inline-block;
                padding-left: 10px;
                padding-right: 10px;
                vertical-align: middle;
                float: right;
              }
              .nav-side-menu ul .active,i.active a,
              .nav-side-menu li .sub-menu li.active a {
                color: #d19b3d;
              }
              .nav-side-menu ul .sub-menu li,
              .nav-side-menu li .sub-menu li {
                background-color: #181c20;
                border: none;
                line-height: 28px;
                border-bottom: 1px solid #23282e;
                margin-left: 0px;
              }
              .nav-side-menu ul .sub-menu li:hover,
              .nav-side-menu li .sub-menu li:hover {
                background-color: #020203;
              }
              .nav-side-menu ul .sub-menu li:before,
              .nav-side-menu li .sub-menu li:before {
                font-family: FontAwesome;
                content: "\f105";
                display: inline-block;
                padding-left: 10px;
                padding-right: 10px;
                vertical-align: middle;
              }
              .nav-side-menu li {
                padding-left: 0px;
                border-left: 3px solid #2e353d;
                border-bottom: 1px solid #23282e;
              }
              .nav-side-menu li a {
                text-decoration: none;
                color: #e1ffff;
              }
              .nav-side-menu li a i {
                padding-left: 10px;
                width: 20px;
                padding-right: 20px;
              }
              .nav-side-menu li:hover {
                border-left: 3px solid #d19b3d;
                background-color: #4f5b69;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                -ms-transition: all 1s ease;
                transition: all 1s ease;
              }
              @media (max-width: 910px) {
                .nav-side-menu {
                  position: relative;
                  width: 100%;
                  margin-bottom: 10px;
                }
                .nav-side-menu .toggle-btn {
                  display: block;
                  cursor: pointer;
                  position: absolute;
                  right: 10px;
                  top: 10px;
                  z-index: 10 !important;
                  padding: 3px;
                  background-color: #ffffff;
                  color: #000;
                  width: 40px;
                  text-align: center;
                }
                .brand {
                  text-align: left !important;
                  font-size: 28px;
                  padding-left: 20px;
                  line-height: 50px !important;
                }
              }
              @media (min-width: 910px) {
                .nav-side-menu .menu-list .menu-content {
                  display: block;
                }
              }
              body {
                margin: 0px;
                padding: 0px;
              }
              h1,h2{
                font-family: helvetica;
                margin-left: auto;
                margin-right: auto;
                font-size: 13pt;
                color: #216721;
                display: inline;

            }
            h3{
                font-family: helvetica;
                margin-left: auto;
                margin-right: auto;
                font-size: 13pt;
                color: #0d3a0d;
                font-weight: bold;
                display: inline;

            }
                          a {
                          font-style: italic;   
                          }
                          body {
                              background-color: #6c757d47;
                          }
                          
                          .botao {
                              margin-left: 10px;
                              margin-right: 10px;
                              margin-bottom: 15px;
                          }
                                 .btn-sq-lg {
                width: 250px !important;
                height: 150px !important;
              }
              
              .btn-sq {
                width: 200px !important;
                height: 100px !important;
                font-size: 10px;
              }
              
              .btn-sq-sm {
                width: 100px !important;
                height: 50px !important;
                font-size: 10px;
              }
              
              .btn-sq-xs {
                width: 50px !important;
                height: 25px !important;
                padding:2px;
                }
                .botaoinscricoes { 
                    margin-bottom: 10px; 
                }
                
                /* The sidebar menu */
              .sidenav {
                  height: 100%; /* Full-height: remove this if you want "auto" height */
                  width: 170px; /* Set the width of the sidebar */
                  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
                  z-index: 1; /* Stay on top */
                  top: 0; /* Stay at the top */
                  left: 0;
                  background-color: #008000; /* Black */
                  overflow-x: hidden; /* Disable horizontal scroll */
                  padding-top: 20px;
              }
              
              /* The navigation menu links */
              .sidenav a {
                  padding: 6px 8px 6px 16px;
                  text-decoration: none;
                  font-size: 25px;
                  color: #818181;
                  display: block;
              }
              
              /* When you mouse over the navigation links, change their color */
              .sidenav a:hover {
                  color: #f1f1f1;
              }
              
              /* Style page content */
              .main {
                  margin-left: 160px; /* Same as the width of the sidebar */
                  padding: 0px 10px;
              }
              
              /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
              @media screen and (max-height: 450px) {
                  .sidenav {padding-top: 15px;}
                  .sidenav a {font-size: 18px;}
              }
                
              .nav-side-menu {
                overflow: auto;
                font-family: verdana;
                font-size: 12px;
                font-weight: 200;
                background-color: #2d9402!important;
                position: fixed;
                top: 0px;
                width: 250px;
                height: 100%;
                color: #e1ffff;
              }
              .nav-side-menu .brand {
                background-color: #277307!important; 
                color: #ffffff!important;
                line-height: 50px;
                display: block;
                text-align: center;
                font-size: 20px;
              }
              .nav-side-menu .toggle-btn {
                display: none;
              }
              .nav-side-menu ul,
              .nav-side-menu li {
                list-style: none;
                padding: 0px;
                margin: 0px;
                line-height: 35px;
                cursor: pointer;
                /*    
                  .collapsed{
                     .arrow:before{
                               font-family: FontAwesome;
                               content: "\f053";
                               display: inline-block;
                               padding-left:10px;
                               padding-right: 10px;
                               vertical-align: middle;
                               float:right;
                          }
                   }
              */
              }
              .nav-side-menu ul :not(collapsed) .arrow:before,
              .nav-side-menu li :not(collapsed) .arrow:before {
                font-family: FontAwesome;
                content: "\f078";
                display: inline-block;
                padding-left: 10px;
                padding-right: 10px;
                vertical-align: middle;
                float: right;
              }
              .nav-side-menu ul .active,
              .nav-side-menu li .active {
                border-left: 3px solid #d19b3d;
                background-color: #4f5b69;
              }
              .nav-side-menu ul .sub-menu li.active,
              .nav-side-menu li .sub-menu li.active {
                color: #d19b3d;
              }
              .nav-side-menu ul .sub-menu li.active a,
              .nav-side-menu li .sub-menu li.active a {
                color: #d19b3d;
              }
              .nav-side-menu ul .sub-menu li,
              .nav-side-menu li .sub-menu li {
                background-color: #008000;
                border: none;
                line-height: 28px;
                border-bottom: 1px solid #008000;
                margin-left: 0px;
              }
              .nav-side-menu ul .sub-menu li:hover,
              .nav-side-menu li .sub-menu li:hover {
                background-color: #020203;
              }
              .nav-side-menu ul .sub-menu li:before,
              .nav-side-menu li .sub-menu li:before {
                font-family: FontAwesome;
                content: "\f105";
                display: inline-block;
                padding-left: 10px;
                padding-right: 10px;
                vertical-align: middle;
              }
              .nav-side-menu li {
                padding-left: 0px;
                border-left: 3px solid #28a745;
                border-bottom: 1px solid #008000;
              }
              .nav-side-menu li a {
                text-decoration: none;
                color: #e1ffff;
              }
              .nav-side-menu li a i {
                padding-left: 10px;
                width: 20px;
                padding-right: 20px;
              }
              .nav-side-menu li:hover {
                border-left: 3px solid #d19b3d;
                background-color: #006000;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                -ms-transition: all 1s ease;
                transition: all 1s ease;
              }
              @media (max-width: 910px) {
                .nav-side-menu {
                  position: relative;
                  width: 100%;
                  margin-bottom: 10px;
                }
                .nav-side-menu .toggle-btn {
                  display: block;
                  cursor: pointer;
                  position: absolute;
                  right: 10px;
                  top: 10px;
                  z-index: 10 !important;
                  padding: 3px;
                  background-color: #ffffff;
                  color: #000;
                  width: 40px;
                  text-align: center;
                }
                .brand {
                  text-align: left !important;
                  font-size: 40px;
                  padding-left: 20px;
                  line-height: 50px !important;
                }
              }
              @media (min-width: 910px) {
                .nav-side-menu .menu-list .menu-content {
                  display: block;
                }
              }
              body {
                margin: 0px;
                padding: 0px;
              }
              @media (min-width: 910px) {
                .minhamain {
              margin-left: 250px;  }
              }
              
              .sair {
                  margin-top: 10%;
                  margin-left: 4%;
                  margin-bottom: 3%;
              }
              li a {
                 display: block;
              }
      </style>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de submissões</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<title>Dashboard Show dos Alimentos</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="assets/sass/style.css">
<link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/metro-uinvert-dock/256/Journal.png">
<style>
  body {
    background-color: #6c757d47;
}
</style>
      </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand text-success" href="/welcome">Sistema de Submissões - SEUNI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/welcome">Home <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/artigos">Artigos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Seus Artigos</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="/inserirartigo">Submeter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/eventos">Visualizar Eventos</a>
                  </li>
                  <?php if(auth()->user()->tipo == "professor"){ ?>  
                  <li class="nav-item">
                    <a class="nav-link" href="/cadastroprof">Editar cadastro</a>
                  </li>
                  <?php } ?>
                  <?php if(auth()->user()->tipo == "aluno"){ ?>  
                    <li class="nav-item">
                      <a class="nav-link" href="/cadastroaluno">Editar cadastro</a>
                    </li>
                    <?php } ?>
              </ul>
              <form class="form-inline my-2 my-lg-0" method="POST" action="/deslogar">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">SAIR</button>
              </form>
            </div>
          </nav>
          <div class="container-fluid">
            @yield('conteudo')
          </div>
        </body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </html>