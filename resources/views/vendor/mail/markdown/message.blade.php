@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
@if (($jozourSettings->show_images_in_email=='1' ) && ($jozourSettings::setupCompleted()))

@if ($jozourSettings->brand == '3')
@if ($jozourSettings->logo!='')
<img class="navbar-brand-img logo" src="{{ url('/') }}/uploads/{{ $jozourSettings->logo }}">
@endif
{{ $jozourSettings->site_name }}

@elseif ($jozourSettings->brand == '2')
@if ($jozourSettings->logo!='')
<img class="navbar-brand-img logo" src="{{ url('/') }}/uploads/{{ $jozourSettings->logo }}">
@endif
@else
{{ $jozourSettings->site_name }}
@endif
@else
Jozour-IT
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
© {{ date('Y') }} Jozour-it. All rights reserved.
@endif

@if ($jozourSettings->privacy_policy_link!='')
<a href="{{ $jozourSettings->privacy_policy_link }}">{{ trans('admin/settings/general.privacy_policy') }}</a>
@endif

@endcomponent
@endslot
@endcomponent
