@component('mail::message')
# Bonjour {{ $notifiable['firstname'] }},

La création de votre compte a bien été enregistrée sur GéoRapport.  

Veuillez cliquer sur le bouton pour valider votre compte.

@component('mail::button', ['url' => $url])
    Valider mon compte 
@endcomponent

**<p style="color: #FF0000">Attention, ce lien ne fonctionnera plus 1 heure après la reception de celui-ci.</p>**

**<p style="color: #FF0000">Vos identifiants de connexion vous ont été envoyé dans un autre mail.</p>**

Merci,  
L'équipe de développement de {{ config('app.name') }}

@component('mail::subcopy')
Si vous avez des probèmes pour cliquer sur le bouton "Valider mon compte", copier et coller l'URL suivant dans votre navigateur favori : {{ $url }} 
@endcomponent

@endcomponent