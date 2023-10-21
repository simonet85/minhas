<x-mail::message>
    # Bonjour, vous avez reçu un nouveau message.

    Email : {{$message}}
    Nom : {{$name}}

    Message : {{$email}}

    Cordialement,
    {{ config('app.name') }}
</x-mail::message>
