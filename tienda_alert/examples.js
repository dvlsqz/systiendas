document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('only_show').addEventListener('click', function(e){
        mdalert({title: 'Alerta', type: 'error', msg: '¡Ha ocurrido un error!', msgs: JSON.stringify(['mensaje #1', 'mensaje #2']) });
    });

    document.getElementById('alert_with_actions').addEventListener('click', function(e){
        mdalert({title: 'Alerta con Acciones', type: 'success', msg: '¡Todo un éxito!', actions: JSON.stringify([{ url: base+'/login', name: 'Ingresar', type: 'success'  }]) });
    });

    document.getElementById('alert_confirm').addEventListener('click', function(e){
        mdalert({title: '¿Desea eliminar?', type: 'delete', msg: '¡Si elimina este elemento, ya no lo podra recuperar!', actions: JSON.stringify([{ url: base+'/login', name: 'Sí, eliminar', type: 'danger'  }]) });
    });

    document.getElementById('alert_callback').addEventListener('click', function(e){
        mdalert({title: '¿Desea eliminar?', type: 'delete', msg: '¡Si elimina este elemento, ya no lo podra recuperar!', actions: JSON.stringify([{ callback: 'callback_alert', params: "'param1', 'param2'", name: 'Sí, eliminar', type: 'danger'  }]) });
    });

    document.getElementById('alert_no_close').addEventListener('click', function(e){
        mdalert({title: '¿Desea eliminar?', type: 'delete', msg: '¡Si elimina este elemento, ya no lo podra recuperar!', actions: JSON.stringify([{ callback: 'callback_alert', params: "'param1', 'param2'", name: 'Sí, eliminar', type: 'danger'  }]), additional: JSON.stringify({hideclose: true}) });
    });
});

function callback_alert(param1, param2){
    console.log(param1, param2)

    md_alert_status('hide');
}