@component('mail::message')
# Hello

New video in category!

@component('mail::button', ['url' => 'http://test1.a2-lab.com/'])
Check it here .....
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
