<?php
require '../conexao.php';
include_once '../model/class/Livro.class.php';
?>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-2.1.4.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/cadastro.js" charset="utf-8"></script>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
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
                      <?php include('menuadm.html');?>
                    </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Cadastro
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8 ">
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="livro" class="livro" >
   <input type="text" title="titulo." required name="titulo" id="titulo" placeholder="Titulo" ></br>
   <input type="text" title="número de páginas." required name="numpage" id="numpage" placeholder="numpage"/></br>
   <input type="text" title="leitores." required name="leitores" id="leitores" placeholder="leitors"/></br>
   <input type="text" title="ano" required name="ano" id="leitores" placeholder="ano"/></br>
    <input type="text" title="sinopse." required name="sinopse" id="datanascimento" placeholder="sinopse"/></br>
   <?php $ob= new Livro(); $ob ->select_categoria($mysqli);?><br/>
   <input type="file" name="LIVRO" id="foto"/><br /><br />
<input type="submit" value="CadastrarLivro" name="CadastroLivro" id="botaocadastro" class="cad" />
                                <div id="entre">
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
