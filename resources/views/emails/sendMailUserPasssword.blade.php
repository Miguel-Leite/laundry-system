@component('mail::message')
## Ola, {{ $user->name }}! 
<p>
    Seja bem-vindo ao sistema, enviamos este e-mail para informar 
    a sua senha da sua conta de usuario.
</p>

### Senha: <b>{{ $options['password'] }}</b>

<p>
    CLica no botão abaixo para entrar no sistema.
</p>

@component('mail::button', ['url' => route('pages.index')])
Entrar
@endcomponent

### Obrigado,<br>
{{ config('app.name') }}
@endcomponent
