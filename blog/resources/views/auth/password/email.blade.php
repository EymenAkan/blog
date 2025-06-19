@component('mail::message')
    # Reset Your Password

    Hello,

    We received a request to reset the password for your **Your Blog** account. Click the button below to set a new password:

    @component('mail::button', ['url' => $url, 'color' => 'primary'])
        Reset Password
    @endcomponent

    If you did not request a password reset, please ignore this email or contact support if you have concerns.

    Thanks,
    The Your Blog Team

    @component('mail::subcopy')
        If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
        [{{ $url }}]({{ $url }})
    @endcomponent
@endcomponent
