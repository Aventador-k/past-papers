@extends('layout.app')
@section('title', 'Upload Paper')
@section('content')
<livewire:upload-papers/>
@push('styles')
@vite('resources/css/tailwind.css')
@endpush
@endsection
