@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col col-sm-10 col-md-9 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('header.Register') }}
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register' , app()->getLocale())  }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email"
                                       class="form-control-label">
                                    {{ __('account.name') }}
                                </label>
                                <input id="name"
                                       type="text"
                                       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       autofocus>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email"
                                       class="form-control-label">
                                    {{ __('account.e-mail') }}
                                </label>
                                <input id="email"
                                       type="email"
                                       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autofocus>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password"
                                       class="form-control-label">
                                    {{ __('account.password') }}
                                </label>
                                <input id="password"
                                       type="password"
                                       class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">
                                    {{ __('account.confirm_password') }}
                                </label>
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('header.Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
