$(function() {
            $('#mostra-login').click(function(){
                $('#login').toggle();
            });
            $("#verifica").submit(function(b){
                b.preventDefault();
                $.ajax({
                    type:"POST",
                    async: true,
                    url: "verifica.php",
                    data:$("#verifica").serialize(),
                    success: function(data) {
                        $(":text, :password").each(function () {
                            $(this).val("");
                        });
                        $("#result").html(data);

                    }
                });
            });
        });