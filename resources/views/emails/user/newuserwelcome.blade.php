@component('mail::message')
# Hello

Welcome to our site

@component('mail::button', ['url' => 'http://test1.a2-lab.com/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
