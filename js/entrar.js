$(function() {
    $('#login').toggle(display="false");
    $('#mostra-login').click(function(){
                  $('#login').toggle(display="true");
            });
            $("#verifica").submit(function(b){
                b.preventDefault();
                $.ajax({
                    type:"POST",
                    async: true,
                    url: "verifica.php",
                    data:$("#verifica").serialize(),
                    success: function(data) {
                        if(data==="usuario"){
                           // document.location.href = 'entrar.php';
                        }else if(data==="adm"){
                             document.location.href = 'adm/entrar.php';
                         }else{
                            $("#result").html(data);
                        }
                    }
                });
            });
        });