
@extends('admin.index')

@section('title', 'Users')

@section('pageContent')

    <div class="row">
        <div class="col">
            <h5><i class='bx bx-user'></i> Employee Account</h5>
        </div>
    </div>
    <div class="row card p-5 bubble-box"> 
        <div class="col">
            <div class="row">
                <div class="col text-end">
                    <button type="button" class="addEmployeeBtn btn btn-secondary btn-sm">Create Employee Account</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table" id="users">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Acc Status</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Phone #</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
 
@endsection

@section('modals')
    @include('admin.modals.modal')
@endsection
@section('common-scripts')
    <script src="{{ asset('actions/js/main.js')}}"></script>
    <script src="{{ asset('actions/js/admin/model.js')}}"></script>
    <script src="{{ asset('actions/js/admin/render.js')}}"></script>
    <script src="{{ asset('actions/js/admin/users.js')}}"></script>
@endsection