@component('mail::message')
# Bonjour {{ $notifiable['firstname'] }},

La création de votre compte a bien été enregistrée sur GéoRapport.

Voici vos identifiants de connexion :

Login : {{ $notifiable['email'] }}  
Mot de passe : {{ $notifiable['password'] }}

Conservez précieusement ces identifiants. Vous pourrez par la suite modifier votre mot de passe dans la gestion de votre compte une fois votre compte validé.

Veuillez cliquer sur le bouton pour valider votre compte.

@component('mail::button', ['url' => $url])
    Valider mon compte 
@endcomponent

Attention, vous devez valider votre compte avant le "DATE", après cela votre compte sera détruit.

Merci,  
L'équipe de développement de {{ config('app.name') }}

@component('mail::subcopy')
    If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ $url }} 
@endcomponent

@endcomponent

{{-- @component('mail::message')
# Welcome {{ $notifiable->name }}

Before you can use this tutorial system you must verify your email address.

@component('mail::button', ['url' => $url])
Brabeum Verify Email Address Tutorial
@endcomponent

If you did not create an account, no further action is required.
Thanks,

{{ config('app.name') }} Team

@component('mail::subcopy')
If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ $url }} 
@endcomponent --}}

{{-- @endcomponent --}}