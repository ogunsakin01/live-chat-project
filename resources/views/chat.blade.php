@extends('layouts.app')

@section('content')
    <main-component :user="{{  Auth::user()  }}"></main-component>
@endsection

<style>

</style>
