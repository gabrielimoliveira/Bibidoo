<li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li><div class="botao" id="mostra-login"><p>Entrar</p><a></a></div>
                      <div id="login">
                        <div class="triangulo"></div>
                        <form id="verifica" method="post">
                         <input type="text"name="login" placeholder="e-mail/nome de usuario">
                          <input type="password" name="pswd" placeholder="senha">
                          <input type="submit" name= "Entrar" value="Entrar">
                          <p id="esqueceu-senha"><a href="#">Esqueceu a senha?</a></p>
                        </form>
                      </div>
                    </li>
                    <li>
                        <a href="cadastro.php">Cadastrar</a>
                    </li>
                    <li>
                        <a href="contact.html">Explorar</a>

                    </li>
                    <li>
                        <a href="sobre.php">Sobre</a>
                    </li>
                </ul>
                <div id="topodois">
      <!-- BUSCA DO TOPO -->
      <div id="buscar">
        <div id="div_busca">
          <form name="snet_busca" target="_top" method="post" action="index.php?pg=pedido1&amp;cdg=9576&amp;xxx=rb53dfiogmqq2o81u3csmu3ii3-1393360917" style="margin:0px; display:block;">
            <div id="form-wrap">
              <input name="pesquisa" type="text" class="form-text" onfocus="if(this.value=='Buscar'){this.value=''}" value="Buscar">
              <div style="float:right; margin: 0px 0px 0px 0px;"> <a href="javascript:js_busca_padrao('digite o que você procura');">
                <input type="image" src="https://ssl267.websiteseguro.com/asterplas/loja-de-embalagens/site/image/buscar.png" value="Submit" onclick="javascript:if (formpesquisa.pesquisa.value == '') { alert('Informe o que deseja procurar !'); } else { formpesquisa.submit(); }">
                </a> </div>
              <div style="float:right;"> <a href="javascript:js_busca_padrao('digite o que você procura');"></a> </div>
              <div id="ajax">-->
<script type="text/javascript">
function MostraLivro(str) {
if (str=="")   {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)   {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)     {
    document.getElementById("DadosUsuarios").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getLivro.php?idLivro="+str,true);
 
        //if (xmlreq.status == 200) {
                 //result.innerHTML = xmlreq.responseText;
             //}else{
                // result.innerHTML = "Erro: " + xmlreq.statusText;
             //}
         
xmlhttp.send();
}
</script>
<?php
  include_once 'conexao.php';
  $query="SELECT * FROM Livros";
  $resultado = $mysqli->query($query);
?>

              </div>
            </div>
            </div>
          </form>
       </div>
      </div>
<div id="DadosLivros"><b>Os dados do Livro aparecerão aqui!</b></div>
<!sdf !>
     
