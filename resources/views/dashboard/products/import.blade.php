@extends('layouts.dashboard')

@section('title', ' Import Products')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active"> Import Products</li>
@endsection

@section('content')

<form action="{{ route('dashboard.product.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <x-form.label id="product-count"> Import Product </x-form.label>
    <x-form.input class="form-control-lg" role="input" name="count"  />
</div>
<button type="submit" class="btn btn-primary">Start Import....</button>

</form>

@endsection