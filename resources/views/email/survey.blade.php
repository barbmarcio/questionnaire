@component('mail::message')

Thank you for responding the survey


@component('mail::button', ['url' => ''])
See more surveys
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
