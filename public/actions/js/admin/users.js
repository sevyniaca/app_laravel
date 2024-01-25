$(document).ready(async function(){
    initializeTable('#users',{
        
    })

    await reloadUserAccountsTable();


    $('#registerAccount-form').submit(async function(event){
        let formData = new FormData(this);
        event.preventDefault();

    })
})