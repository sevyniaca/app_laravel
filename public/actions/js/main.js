const generateReferenceCode=(length)=>{
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      result += characters.charAt(randomIndex);
    }
    return result;
}


const showNotification = (type, description, result) => {
    Swal.fire({
        title: type,
        text: description,
        icon: result, // success, error, warning, info, question
        timer: 2000, // Set the timer to 2000 milliseconds (2 seconds)
        showConfirmButton: false // Hide the "OK" button
        });
    }
    
const showNotificationRedirectTime = async(type, description, icon) => {
    return new Promise((resolve,reject)=>{
        Swal.fire({
            title: type,
            text: description,
            icon: icon, // success, error, warning, info, question
            timer: 2000, // Set the timer to 2000 milliseconds (2 seconds)
            showConfirmButton: false // Hide the "OK" button
            }).then((result)=>{
                resolve('success');
            })
    })
}

const showNotificationConfirmation=async(icon,title,text) => {
    return new Promise((resolve,reject)=>{
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            showConfirmButton: true,
            showCancelButton: true,
            allowOutsideClick: false,
            }).then((result) => {
            if (result.isConfirmed) {
                resolve(true)
            }else{
                resolve(false)
            }
        });
    })
}
   


const alertDivs =(message,color)=>{
    var html="";
    return html=`<div class="text-center alert ${color}" role="alert">${message}</div>`
}
const initializeTable = (table, config) => {
    return($(table).DataTable(config));
}
const createArrayForDataTable = (data, fields) => {
    const arr = new Array;
    data.map(function(item) {
        const entry = new Array();
        fields.forEach((field)=>{
            entry.push(item[field]);
        });
        arr.push(entry);
    });
    return arr;
}

const selectTable = (table) => $(table).DataTable();

const loadTable = async (table, data) =>{
    return new Promise((resolve,reject)=>{
        const tbl = $(table).DataTable();
        tbl.clear();
        tbl.rows.add(data);
        tbl.draw();
        resolve(true);
    });
}
const appendTable = async (table, data) =>{
    return new Promise((resolve,reject)=>{
        const tbl = $(table).DataTable();
        tbl.rows.add(data);
        tbl.draw();
        resolve(true);
    });
}

const clearTable = async (table) =>{
    return new Promise((resolve,reject)=>{
        const tbl = $(table).DataTable();
        tbl.clear();
        tbl.draw();
        resolve(true);
    });
}


function selectOption(data,elementTag) {
    $.each(data, function(index, option) {
        $(elementTag).append('<option value="' + option.id + '">' + option.desc + '</option>');
    });
}
