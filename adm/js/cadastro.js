$(function() {
            $("#botaocadastro").submit(function(b){
                b.preventDefault();
                alert("emtrou no js");
                
                /*$.ajax({
                    type:"POST",
                    async: true,
                    url: "../model/InserirCategoria.php",
                    data:$("#cadastrar").serialize(),
                    success: function(data) {
                    }
                });*/
            });
        });
            