<x-mail::message>

    # Vous avez reçu une nouvelle notification

    **Name:** {{ $name }}

    **Email:** {{ $email }}

    **Message:** {{ $message }}

    Cordialement,<br>
    {{ config('app.name') }}

</x-mail::message>
