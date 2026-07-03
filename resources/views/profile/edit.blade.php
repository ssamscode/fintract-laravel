@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    @include('profile.partials.profile-photo-form')

    @include('profile.partials.update-profile-information-form')

    @include('profile.partials.update-password-form')

    @include('profile.partials.delete-user-form')

</div>

@endsection