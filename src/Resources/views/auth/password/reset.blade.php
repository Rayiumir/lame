@extends('Lame::layouts.app')

@section('content')
    <x-slot name="title">
        - فراموشی رمز عبور
    </x-slot>
    <section class="col-md-6 offset-3 mt-5">
        <div class="card border-0 rounded-4">
            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success rounded-4" role="alert">
                        <i class="fa-duotone fa-check"></i> {{ session()->get('message') }}
                    </div>
                @endif
                <figure class="text-center mt-3">
                    <img src="{{asset('/icon/password.png')}}" width="100" height="100" alt="" srcset="">
                </figure>
                <form action="{{ route('auth.password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">ایمیل</label>
                        <input type="email" name="email" class="form-control rounded-5 @error('email') is-invalid @enderror" id="Input1" value="{{$email}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">رمز عبور</label>
                        <input type="password" name="password" class="form-control rounded-5 @error('password') is-invalid @enderror" id="Input2">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Input3" class="form-label">رمز عبور مجدد</label>
                        <input type="password" name="password_confirmation" class="form-control rounded-5 @error('password_confirmation') is-invalid @enderror" id="Input3">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary rounded-5"><i class="fa-duotone fa-send"></i> به روز رسانی رمز عبور </button>
                </form>
            </div>
        </div>
    </section>
@endsection

