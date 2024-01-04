
@extends('admin.index')

@section('title', 'Users')


@section('pageContent')
    <div class="container">
    <div class="row">
        <div class="col">
            <h3>User List</h3>
        </div>
    </div>
    <div class="row"> 
        <div class="col">
            <div class="table-responsive">
                <table class="table" id="users">
                    <thead>
                        <tr>
                            <th>Action</th>
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
    </div>
   
   
@endsection



@section('common-scripts')
    <script src="{{ asset('actions/js/main.js')}}"></script>
    <script src="{{ asset('actions/js/admin/model.js')}}"></script>
    <script src="{{ asset('actions/js/admin/users.js')}}"></script>
@endsection