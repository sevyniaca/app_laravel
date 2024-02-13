const userAccounts = async()=>{
    return new Promise ((resolve,reject)=>{
        $.get('/userAccount',function(res){
            resolve(res);
        })
    })
}

const createAccount = async(formData)=>{
    return new Promise((resolve,reject)=>{
        $.post('/createAccount',formData,function(res){
            resolve(res);
        })
    })
}

const selectAccount =async(id)=>{
    return new Promise((resolve,reject)=>{
        $.get('/selectAccount',{id},function(res){
            resolve(res)
        })
    })
}

const editInfo =async(formData)=>{
    return new Promise((resolve,reject)=>{
        $.post('/editInfo',formData,function(res){
            resolve(res)
        })
    })
}

const editRole = async(formData)=>{
    return new Promise((resolve,reject)=>{
        $.post('/editRole',formData,function(res){
            resolve(res)
        })
    })
}

const changeStatus = async(id,status)=>{
    return new Promise((resolve,reject)=>{
        $.get('/changeStatus',{id,status},function(res){
            resolve(res)
        })
    })
}
