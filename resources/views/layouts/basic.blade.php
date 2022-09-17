<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($jozourSettings) && ($jozourSettings->site_name) ? $jozourSettings->site_name : 'Jozour-IT' }}</title>

    <link rel="shortcut icon" type="image/ico" href="{{ ($jozourSettings) && ($jozourSettings->favicon!='') ?  Storage::disk('public')->url('').e($jozourSettings->favicon) : 'favicon.ico' }} ">
    {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ url(mix('css/dist/all.css')) }}">
    <link rel="shortcut icon" type="image/ico" href="{{ url(asset('favicon.ico')) }}">

    <script nonce="{{ csrf_token() }}">
        window.jozourit = {
            settings: {
                "per_page": 50
            }
        };
    </script>
    @livewireStyles


    @if (($jozourSettings) && ($jozourSettings->header_color))
        <style>
        .main-header .navbar, .main-header .logo {
        background-color: {{ $jozourSettings->header_color }};
        background: -webkit-linear-gradient(top,  {{ $jozourSettings->header_color }} 0%,{{ $jozourSettings->header_color }} 100%);
        background: linear-gradient(to bottom, {{ $jozourSettings->header_color }} 0%,{{ $jozourSettings->header_color }} 100%);
        border-color: {{ $jozourSettings->header_color }};
        }
        .skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {
        border-left-color: {{ $jozourSettings->header_color }};
        }

        .btn-primary {
        background-color: {{ $jozourSettings->header_color }};
        border-color: {{ $jozourSettings->header_color }};
        }


        </style>
    @endif

    @if (($jozourSettings) && ($jozourSettings->custom_css))
        <style>
            {!! $jozourSettings->show_custom_css() !!}
        </style>
    @endif

</head>

<body class="hold-transition login-page">

    @if (($jozourSettings) && ($jozourSettings->logo!=''))
        <center>
            <a href="{{ config('app.url') }}"><img id="login-logo" src="{{ Storage::disk('public')->url('').e($jozourSettings->logo) }}"></a>
        </center>
    @endif
  <!-- Content -->
  @yield('content')



    <div class="text-center" style="padding-top: 100px;">
        @if (($jozourSettings) && ($jozourSettings->privacy_policy_link!=''))
        <a target="_blank" rel="noopener" href="{{  $jozourSettings->privacy_policy_link }}" target="_new">{{ trans('admin/settings/general.privacy_policy') }}</a>
    @endif
    </div>

    {{-- Javascript files --}}
    <script src="{{ url(mix('js/dist/all.js')) }}" nonce="{{ csrf_token() }}"></script>


    @stack('js')
    @livewireScripts
</body>

</html>
