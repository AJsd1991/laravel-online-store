@component('mail::message')
# Wellcome Dear {{ $name }}!

Thanks for your registration :)

@component('mail::button', ['url' => 'http://store.test'])
Visit Store
@endcomponent

Thanks,<br>
{{ config('app.name') }} Admin
@endcomponent
