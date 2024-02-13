$(document).ready(async function(){
    
    //initialize table (datatables)
    initializeTable('#users',{})
    
    //reloadTable Content
    await reloadUserAccountsTable();
   
    //action button (select)
    $('#users tbody').on('change','.userAccountActionBtn',async function(){
        let action = $(this).val();
        let id = $(this).data('id');
        let confirm = null;
        let response = null;
        if(action=="editInfo"){
            $('#form-event').html(await formEvent('editInfoForm',await selectAccount(id)));
            $('#formType').val('editInfoForm');
            $('#modalTitle').text('Edit Information');
            $('#modalBox').modal('show');
        }
        else if(action=="editRole"){
            $('#form-event').html(await formEvent('editRoleForm',await selectAccount(id)));
            $('#formType').val('editRoleForm');
            $('#modalTitle').text('Change Role');
            $('#modalBox').modal('show');
        }
        else if(action=="activate"){
            confirm =await showNotificationConfirmation('warning','Change Account Status',`Do you want to activate this account ID:${id}`);
            if(confirm){
                response = await changeStatus(id,'active');
                if(response.res){
                    showNotification(response.type,response.description,response.result);
                    await reloadUserAccountsTable();
                }else{
                    showNotification(response.type,response.description,response.result);
                    await reloadUserAccountsTable();
                }
            }
        }
        else if(action=="deactivate"){
            confirm =await showNotificationConfirmation('warning','Change Account Status',`Do you want to deactivate this account ID:${id}`);
            if(confirm){
                response = await changeStatus(id,'inactive');
                if(response.res){
                    showNotification(response.type,response.description,response.result);
                    await reloadUserAccountsTable();
                }else{
                    showNotification(response.type,response.description,response.result);
                    await reloadUserAccountsTable();
                }
            }
        }
        setTimeout(()=>{
            $(this).val('');
        },300)
    })

    //add account modal event
    $('.addEmployeeBtn').click(async function(){
        $('#form-event').html(await formEvent('addForm',null));
        $('#modalTitle').text('Add Account');
        $('#formType').val('addForm');
        $('#modalBox').modal('show');
    })

    //submit form add account / edit info / change role 
    $('#formFields').submit(async function(e){
        e.preventDefault();
        let formType = $('#formType').val();
        let response=null;
        if(formType == "addForm"){
             response = await createAccount($(this).serialize());
            if(response.res){
                showNotification(response.type,response.description,response.result);
                $('.data-input').val('');
                await reloadUserAccountsTable();
            }else{
                showNotification(response.type,response.description,response.result);
                await reloadUserAccountsTable();
            }
        }else if(formType=="editInfoForm"){
            response = await editInfo($(this).serialize());
            if(response.res){
                showNotification(response.type,response.description,response.result);
                $('#modalBox').modal('hide');
                $('.data-input').val('');
                await reloadUserAccountsTable();
            }else{
                showNotification(response.type,response.description,response.result);
                await reloadUserAccountsTable();
            }
        }
        else if(formType=="editRoleForm"){
            response = await editRole($(this).serialize());
            if(response.res){
                showNotification(response.type,response.description,response.result);
                $('#modalBox').modal('hide');
                $('.data-input').val('');
                await reloadUserAccountsTable();
            }else{
                showNotification(response.type,response.description,response.result);
                await reloadUserAccountsTable();
            }
        }
    })
   
})



