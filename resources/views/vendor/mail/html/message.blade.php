@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])

{{-- Check that the $jozourSettings variable is set, images are set to be shown, and setup is complete --}}


@if (isset($jozourSettings) && ($jozourSettings::setupCompleted()))

    {{-- Show images in email!  --}}
    @if (($jozourSettings->show_images_in_email=='1' ) && (($jozourSettings->brand == '3') || ($jozourSettings->brand == '2')))

        {{-- $jozourSettings->brand = 1 = Text  --}}
        {{-- $jozourSettings->brand = 2 = Logo  --}}
        {{-- $jozourSettings->brand = 3 = Logo + Text  --}}
        @if ($jozourSettings->brand == '3')

            @if ($jozourSettings->email_logo!='')
            <img style="max-height: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($jozourSettings->email_logo)) }}">
            @elseif ($jozourSettings->logo!='')
            <img style="max-height: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($jozourSettings->logo)) }}">
            @endif

            <br><br>
            {{ $jozourSettings->site_name }}
            <br><br>
        {{-- else if branding type is just logo --}}
        @elseif ($jozourSettings->brand == '2')
            @if ($jozourSettings->email_logo!='')

            <img style="max-width: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($jozourSettings->email_logo)) }}">
            @elseif ($jozourSettings->logo!='')
            <img style="max-width: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($jozourSettings->logo)) }}">
            @endif
        @endif
    @else
        {{ $jozourSettings->site_name }}
    @endif

{{-- Either the $jozourSettings variable isn't set or setup is not complete --}}
@else
{{ config('app.name') }}
@endif

@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
@if($jozourSettings::setupCompleted())
© {{ date('Y') }} {{ $jozourSettings->site_name }}. All rights reserved.
@else
© {{ date('Y') }} Jozour-IT. All rights reserved.
@endif

@if ($jozourSettings->privacy_policy_link!='')
<a href="{{ $jozourSettings->privacy_policy_link }}">{{ trans('admin/settings/general.privacy_policy') }}</a>
@endif

@endcomponent
@endslot
@endcomponent
