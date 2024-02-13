const formEvent = async(formEvent,response)=>{
    return new Promise((resolve,reject)=>{
        let html ="";
        if(formEvent=="addForm"){
            html=`
                    <b>Account Info/Controll</b>
                    <br>
                    <div class="row">
                        <div class="col-6 col-md-6 col-12">
                            <label>Username</label>
                            <input type="text" class="data-input form-control border-custom" name="username" required>
                        </div>
                        <div class="col-6 col-md-6 col-12">
                            <label>Password</label>
                            <input type="text" class="data-input form-control border-custom" name="password" required>
                        </div>
                        <div class="col-12">
                            <label>Role</label>
                            <select class="data-input form-select border-custom" name="role" required>
                                <option value="" selected disabled>Select Option</option>
                                <option value="service-advisor">Service Advisor</option>
                                <option value="office-staff">Office Staff</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <b>Personal Information</b>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <label>Full Name</label>
                            <input type="text" class="data-input form-control border-custom" name="name">
                        </div>
                        <div class="col-6 col-md-6 col-12">
                            <label>Address</label>
                            <input type="text" class="data-input form-control border-custom" name="address">
                        </div>
                        <div class="col-6 col-md-6 col-12">
                            <label>Phone #</label>
                            <input type="text" class="data-input form-control border-custom" name="phoneNumber">
                        </div>
                    </div>
            `
        }
        else if(formEvent=="editInfoForm"){
            html=`
            <b>Personal Information</b>
            <br>
            <input type="hidden" name="id" value="${response.data[0].id}">
            <div class="row">
                <div class="col-12">
                    <label>Full Name</label>
                    <input type="text" class="data-input form-control border-custom" name="name" value="${response.data[0].name}">
                </div>
                <div class="col-6 col-md-6 col-12">
                    <label>Address</label>
                    <input type="text" class="data-input form-control border-custom" name="address" value="${response.data[0].address}">
                </div>
                <div class="col-6 col-md-6 col-12">
                    <label>Phone #</label>
                    <input type="text" class="data-input form-control border-custom" name="phoneNumber" value="${response.data[0].phoneNumber}">
                </div>
            </div>
    `
        }
        else if(formEvent=="editRoleForm"){
            html=`
            
             <div class="row">
                <div class="col-6">
                    <label>Username</label>
                    <input type="text" class="form-control" value="${response.data[0].username}" disabled>
                </div>
                <div class="col-6">
                    <label>Name</label>
                    <input type="text" class="form-control" value="${response.data[0].name}" disabled>
                </div>
                <div class="col-12">
                    <label>Current Role</label>
                    <input type="hidden" name="id" value="${response.data[0].id}">
                    <input type="text" class="form-control" value="${response.data[0].role}" disabled>
                </div>
                <div class="col-12">
                <label>New Role</label>
                <select class="data-input form-select border-custom" name="role" required>
                    <option value="" selected disabled>Select Option</option>
                    <option value="service-advisor">Service Advisor</option>
                    <option value="office-staff">Office Staff</option>
                </select>
            </div>
            </div>
            `
        }

        resolve(html);
    })
}


const reloadUserAccountsTable = async() => {
    return new Promise(async(resolve,reject)=>{
        const dataList = await userAccounts();
        const arr = createArrayForDataTable(dataList.data, [
            'actions',
            'status',
            'username',
            'role',
            'name',
            'address',
            'phoneNumber'
        ]);
        resolve(loadTable("#users", arr));
    });
}