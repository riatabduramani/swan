@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $settings->company_name }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @if (isset($subcopy))
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endif

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} {{ $settings->company_name }}. @lang('front.allrights')
        @endcomponent
    @endslot
@endcomponent
