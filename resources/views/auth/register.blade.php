@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-8 col-md-10">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Buat Sebuah Akun!</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
                                placeholder="Nama Lengkap"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                placeholder="Alamat Email"  name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="password" placeholder="Kata Sandi" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="password-confirm" placeholder="Ulangi Kata Sandi"  name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input type="hidden" name="role" value="{{ \App\Role\UserRole::ROLE_STUDENT }}" />

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftarkan Akun
                        </button>
                    </form>
                    
                    <hr width="10% ">
                    
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Sudah memiliki akun? Masuk!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
