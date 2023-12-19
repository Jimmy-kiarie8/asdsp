@component('mail::message')
# New message
 
{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent