
<!-- extends to master blade php (admin/index.blade.php)-->
@extends('admin.index')

@section('title', 'Dashboard')


@section('pageContent')
    <div class="row">
        <div class="col">
        <h1>This is Dashboard</h1>
        </div> 
    </div>
@endsection

@section('common-scripts')
    <script>
        console.log('test');
    </script>
@endsection