@component('mail::message')
# Bonjour {{ $data['firstname'] }},

La création de votre compte a bien été enregistrée sur GéoRapport.

Voici vos identifiants de connexion :

Login : {{ $data['email'] }}  
Mot de passe : {{ $password }}

<b style="color: #FF0000">Conservez précieusement ces identifiants. Vous pourrez par la suite modifier votre mot de passe dans la gestion de votre compte.</b>

<b style="color: #FF0000">Assurez-vous d'avoir valider votre compte aupréalable grâce à un autre mail qui vous a été envoyé par GéoRapport. Si vous ne validez pas votre compte, il sera impossible pour vous de vous connecter.</b>

Merci,  
L'équipe de développement de {{ config('app.name') }}

@endcomponent