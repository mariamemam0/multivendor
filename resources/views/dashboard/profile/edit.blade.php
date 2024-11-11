@extends('layouts.dashboard')

@section('title', 'Edit Profile')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')

<x-alert type="success" />

<form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    
    <div class="form-row">
        <div class="col-md-6">
        <x-form.label id="first name">First Name</x-form.label><br>
            <x-form.input name="first_name"  :value="$user->profile->first_name" />
        </div>
        <div class="col-md-6">
        <x-form.label id="last name">Last  Name</x-form.label><br>
            <x-form.input name="last_name" :value="$user->profile->last_name" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
        <x-form.label id="birthday"> Birthday</x-form.label><br>
            <x-form.input name="birthday" type="date" :value="$user->profile->birthday" />
        </div>
        <div class="col-md-6">
        <x-form.label id=" gender">Gender</x-form.label><br>
            <x-form.radio name="gender"  :options="['male'=>'Male', 'female'=>'Female']" :checked="$user->profile->gender" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
        <x-form.label id="street adress">Street Adress</x-form.label><br>
            <x-form.input name="street_address"  :value="$user->profile->street_address" />
        </div>
        <div class="col-md-4">
        <x-form.label id="city">City</x-form.label><br>
            <x-form.input name="city"  :value="$user->profile->city" />
        </div>
        <div class="col-md-4">
        <x-form.label id="state">State</x-form.label><br>
            <x-form.input name="state"  :value="$user->profile->state" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
        <x-form.label id="postal code">Postal Code</x-form.label><br>
            <x-form.input name="postal_code" :value="$user->profile->postal_code" />
        </div>
        <div class="col-md-4">
            <x-form.select name="country" :options="$countries" label="Country" :selected="$user->profile->country" />
        </div>
        <div class="col-md-4">
            <x-form.select name="locale" :options="$locales" label="Locale" :selected="$user->profile->locale" />
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection