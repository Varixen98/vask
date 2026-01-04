@extends('layout.dashboard-layout')

@section('title', "Edit Profile")

@section('content')
    <div class="w-full flex flex-col gap-2 p-2 mx-auto">
        <div>
            <h4 class="font-roboto font-bold text-xl">Edit Profile</h4>
        </div>
        <hr class="border border-gray-300">
        @include("profile.edit.form.profile-edit-form")
       
    </div>

    @vite("resources/js/editForm.js")
@endsection