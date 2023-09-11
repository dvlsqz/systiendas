document.addEventListener('DOMContentLoaded', function(){
    var form_register = document.getElementById('form_register');

    if(form_register){
        form_register.addEventListener('submit', function(e){
            e.preventDefault();
            user_register();
        })
    }
});

function user_register(){
    loader_action_status('show');
    var url = base+'/api/connect/register';
    var http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            data = this.responseText;
            loader_action_status('hide');
        }
    }
    http.send(new FormData(document.getElementById('form_register')))
}