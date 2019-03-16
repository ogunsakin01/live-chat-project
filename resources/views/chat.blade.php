@extends('layouts.app')

@section('content')
    <main-component :users="this.$root.users" :user="{{  Auth::user()  }}"></main-component>
@endsection

<style>

</style>
