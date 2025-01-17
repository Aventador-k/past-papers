@extends('layout.app')


@section('title' , 'Pay')

@section('content')
<livewire:Counter/>
<form action="/pay" method="POST">
    @csrf
    <input type="text" placeholder="amount">
    <button type="submit">Pay</button>
</form>

@endsection
