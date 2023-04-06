<x-mail::message>
    # Réponde de l'administrateur

    De: {{$from}}
    Pour: {{$to}}


    Réponse: {{$reply}}



    Cordialement,<br>
    {{ config('app.name') }}
</x-mail::message>
