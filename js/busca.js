$("#busca").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    async: true,
                    url: "busca.php",
                    data:$("#busca").serialize(),
                    success: function(data) {
                            $("#lista_usuario").html(data);
                    }
                });
            });