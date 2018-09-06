$(function(){
    //Bloqueando o envio do formulario para ser pelo ajax
    $('#form').on('submit', function(e) {
        e.preventDefault();
        
        //Capturando email e senha
        var email = $('input[name=email]').val();
        var senha = $('input[name=senha]').val();
        
        //Envio do ajax
        $.ajax({
            type:'POST',
            url:'login.php',
            data:{email:email, senha:senha},
            success:function() {
               window.location.href= "pagina.php";//Redireciona o user se ele for cadastrado
            }
        });
        
    });
});


