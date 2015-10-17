<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact - Business Casual - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.1.4.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/entrar.js" charset="utf-8"></script>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(function() {
        $("#formulario").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                async: true,
                url: "model/InserirUsuario.php",
                data:$("#formulario").serialize(),
                success: function(data) {
                    $(":text, :email, :password, :date, :file").each(function () {
                        $(this).val("");
                    });
                    $("#saida").html(data);
                   
                }
            });
	});
    });
    </script>
</head>

<body>

    <div class="brand">Business Casual</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php include('menu.html');?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>Cadastro</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                    <!--<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                mapa-->
                    <form method="post" action="" id="formulario" enctype="multipart/form-data">
                        <input type="text" title="Preencha o campo nome." required name="nome" id="nome" class="nome" placeholder="Nome Completo" />
                        <input type="text" title="Preencha o campo usuário" required name="usuario" id="usuario" placeholder="Usuário" >
                         <input type="email" title="Preencha o campo email." required name="email" id="email" placeholder="Email"/>
                         <input type="password" title="Preencha o campo senha."required name="senha" id="senha" placeholder="Senha"/>
                        Data de nascimento:<input type="date" title="Preencha o campo data nascimento." required name="datanascimento" id="datanascimento" placeholder="data nascimento"/><br>
                        Foto:<input type="file" required name="foto" id="foto" placeholder="foto"/><br><br>
                        <div id="saida"></div><br>
                        <input type="submit" value="Cadastrar" name="cadastro" id="botaocadastro" class="cad" />
                                <div id="entre">
                                    <p>Ja possui cadastro?<a href="#entrar" class="link">Login</a></p>
                                </div>
                        </form>
                </div>
                <div class="col-md-4">
                    <p>
                    </p>
                    <p>
                    </p>
                    <p>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; BibiDoo 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
