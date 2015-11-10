$(function() {
            $("#cadastralivro").submit(function(b){
                b.preventDefault();
                $.ajax({
                    type:"POST",
                    async: true,
                    url: "../model/InserirLivro.php",
                    data:$("#cadastralivro").serialize(),
                    success: function(data) {
                    }
                });
            });
        });
            