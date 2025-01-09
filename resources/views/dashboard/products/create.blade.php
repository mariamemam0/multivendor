@extends('layouts.dashboard')
@section('title','products')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">product</li>
@endsection
@section('content')
<form action="{{route('dashboard.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('dashboard.products._form', [
        'button_label' => 'Create'
        ])
</form>

@endsection