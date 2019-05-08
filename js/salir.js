function salir(){
    // console.log("Saliendo del sistema...")
    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        'Salir', 
        '¿Deseas salir del Sistema?', 
        function(){ alertify.success('Salir') ; 
        console.log('salida')}, 
        function(){ alertify.error('Cancelar') ; 
        console.log('cancelado')}
    );

}