<x-mail::message>
    # Bonjour, vous avez reçu un nouveau message.

    Email : {{$email}}
    Nom : {{$name}}

    Message : {{$message}}

    Cordialement,
    {{ config('app.name') }}
</x-mail::message>
