@component('mail::message')
    # {{ __('auth.reset_password_heading') }}

    {{ __('auth.reset_password_greeting') }}

    {{ __('auth.reset_password_intro') }}

    @component('mail::button', ['url' => $url, 'color' => 'primary'])
        {{ __('auth.reset_password_button') }}
    @endcomponent

    {{ __('auth.reset_password_note') }}

    {{ __('auth.thanks') }},
    {{ __('auth.team_name') }}

    @component('mail::subcopy')
        {{ __('auth.reset_password_subcopy') }}
        [{{ $url }}]({{ $url }})
    @endcomponent
@endcomponent
