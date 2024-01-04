const userAccounts = async()=>{
    return new Promise ((resolve,reject)=>{
        $.get('/userAccount',function(res){
            resolve(res);
        })
    })
}

const reloadUserAccountsTable = async() => {
    return new Promise(async(resolve,reject)=>{
        const dataList = await userAccounts();
        const arr = createArrayForDataTable(dataList.data, [
            'actions',
            'username',
            'role',
            'name',
            'address',
            'phoneNumber'
        ]);
        resolve(loadTable("#users", arr));
    });
}