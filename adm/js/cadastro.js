$(function() {
            $("#livro").submit(function(b){
                b.preventDefault();
                $(':file').change(function(){
                    var file = this.files[0];
                    var name = file.name;
                    var size = file.size;
                       var type = file.type;
    //Your validation
});
                var tal=
                
                $.ajax({
                    type:"POST",
                    async: true,
                    url: "../model/InserirLivro.php",
                    data:$("#livro").serialize(),
                    success: function(data){
                        alert(data);
                    }
                });
            });
        });
            