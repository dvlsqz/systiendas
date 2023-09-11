const base = location.protocol+'//'+location.host;
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');

window.onload = function(){
    loader.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function(){
    M.AutoInit();
    var loader = document.getElementById('loader');
    var loader_action = document.getElementById('loader_action');

    var sl = document.getElementsByClassName('sl');
    if(sl){
        for(i = 0; i < sl.length; i++){
            sl[i].addEventListener('click', function(e){
                e.preventDefault();
                var destiny = this.getAttribute('href');
                loader.style.display = 'flex';
                setTimeout(function(){
                    window.location.href = destiny;
                }, 500);
            })
        }
    }
});

function loader_action_status(status){
    if(status == "show"){
        document.getElementsByTagName('body')[0].style.overflow = "hidden";
        document.getElementsByClassName('wrapper')[0].classList.add('blur');
        loader_action.style.display = 'flex';
        loader_action.classList.remove('loader_action_animation_hide');
        loader_action.classList.add('loader_action_animation_show');
    }

    if(status == "hide"){
        document.getElementsByTagName('body')[0].style.removeProperty('overflow');
        document.getElementsByClassName('wrapper')[0].classList.remove('blur');
        loader_action.style.display = 'none';
        loader_action.classList.add('loader_action_animation_hide');
        loader_action.classList.remove('loader_action_animation_show');
    }
}