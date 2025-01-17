@extends("layout.app")

@section('title' , "Login")

@section('content')
<div class="login-box">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
      <div class="user-box">
        <input type="text" name="email" value="{{ old('email') }}">
        <label>Email</label>
        @error('email')
            <p style="color: red; font-weight: bolder">{{ $message }}</p>
        @enderror
        @if (session('invalid_email'))
            <p>{{ session('invalid_email') }}</p>
        @endif
      </div>
      <div class="user-box">
        <input type="password" name="password" value="{{ old('password') }}" >
        <label>Password</label>
        @error('password')
        <p style="color: red; font-weight: bolder">{{ $message }}</p>
    @enderror

    @if (session('invalid_password'))
            <p>{{ session('invalid_password') }}</p>
        @endif
      </div>
      <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>

        Submit
      </button>
    </form>
  </div>
  @push('styles')
  @vite('resources/css/login.css')
  @endpush
@endsection
