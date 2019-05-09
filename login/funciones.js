function ingresar(){
    var usuario,contra;
    usuario = $("#username").val();
    contra  = $("#pass").val();
    usuario=usuario.trim();
    // contra=contra.trim();
    if(usuario=='' || contra==''){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Acceso denegado',
            'label':'Aceptar',
            'message': 'Debes de colocar nombre de usuario y contraseña' ,
            'onok': function(){ 
                alertify.message('Gracias !');
                $("#username").val('');
                $("#pass").val('');
                $("#username").focus();
            }
        }).show();
        return false;    
    }else{
        $.ajax({
            url:"verificar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra
                 },
            success:function(respuesta){
              console.log(respuesta);
              if(respuesta==1){
                alertify.success('Ingresando....') ; 
                preCarga(2000,2);
                setInterval(entrando, 2000);
              }else{
                alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

                alertify.alert()
                .setting({
                    'title':'Acceso denegado',
                    'label':'Aceptar',
                    'message': 'Nombre de usuario o contraseña incorrectos' ,
                    'onok': function(){ 
                        alertify.message('Gracias !');
                        $("#username").val('');
                        $("#pass").val('');
                        $("#username").focus();
                    }
                }).show();                 
              }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
    }
}

function entrando(){
    window.location='../inicio/index.php';
}