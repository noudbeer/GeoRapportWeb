@component('mail::message')
# Bonjour {{ $data['firstname'] }},

La création de votre compte a bien été enregistrée sur GéoRapport.

Voici vos identifiants de connexion :


Login : {{ $data['email'] }}  
Mot de passe : {{ $password }}


Conservez précieusement ces identifiants. Vous pourrez par la suite modifier votre mot de passe dans la gestion de votre compte une fois votre compte validé.

Veuillez cliquer sur le bouton pour valider votre compte.

@component('mail::button', ['url' => ''])
Valider mon compte
@endcomponent

Attention, vous devez valider votre compte avant le "DATE", après cela votre compte sera détruit.

Merci,<br>
L'équipe de développement de {{ config('app.name') }}
@endcomponent
