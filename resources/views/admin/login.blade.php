@extends('admin.layout.app')
@section('contant')
    {{-- <center> --}}
    <div class="main d-flex justify-content-center">
        <div class="card mt-5" style="width: 35rem;">
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="card-header">
                <h3>LOGIN</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('auth.check') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" required
                            class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="Enter your Email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter your password">
                        @error('password')
                            <p class="text-danger alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary px-5">LOGIN</button>
                </form>
            </div>
        </div>
    </div>

    {{-- </center> --}}
@endsection
