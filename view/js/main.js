
let app = {
    helper : {
        confirmLink : function (e){
            let link = e.target;
            if(link.hasAttribute('data-confirm')){
                e.preventDefault();
                let msg = 'Are you shure ?';
                if(link.hasAttribute('data-confirm-text')){
                    msg = link.getAttribute('data-confirm-text');
                }

                if(window.confirm(msg)){
                    document.location = link.getAttribute('href');
                }
            }
        }
    },
    initListeners : function (){
        document.addEventListener('click', app.helper.confirmLink)
    }

}


document.addEventListener('DOMContentLoaded', app.initListeners)



