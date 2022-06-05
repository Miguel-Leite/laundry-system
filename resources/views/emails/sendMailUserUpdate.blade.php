@component('mail::message')
## Ola, {{ $user->name }}! 
<p>
    Enviamos este e-mail para informar 
    houve uma actualização nos seus dados pessoas da
    conta do sistema de lavandaria.
</p>

<p>
    Clica no botão abaixo para entrar no sistema.
</p>

@component('mail::button', ['url' => route('pages.index'),'color'=>'success'])
    Entrar
@endcomponent

### Obrigado,<br>
{{ config('app.name') }}
@endcomponent
