@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @guest
                {{ __("dashboard.home_need_login") }}
            @else
                {{ __("dashboard.home_logged_in") }}
            <div>
                >>>
                <span>
                    <a class="btn-link" href="{{ route('dashboard', app()->getLocale()) }}">
                    {{ __("dashboard.dashboard_link") }}
                </a>
                </span>
                <<<
            </div>

            @endguest
        </div>
    </div>
</div>
@endsection
