$(document).ready(async function(){
    $('#loginForm').submit(async function(event){
        event.preventDefault();
        let formData = $(this).serialize();
        $.post('/login',formData,function(res){
            if(!res.result){
                let alerts = alertDivs('account does not exist','danger');
                $('#alerts').html(alerts);

                setTimeout(() => {
                    $('#alerts').html("");
                }, 2000);
            }
            else{
                window.location.href = res.redirect_url;
            }
        })
        
    })
})

