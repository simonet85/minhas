@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Evénements</li>
        </ol>
    </div>
</nav>

<!-- News and Events  -->
<section class="container mb-5">
    <h2 class="mb-4">Calendrier des événements</h2>
    <div class="row">
        <div class="col-md-6">
            <h3>Événements à venir</h3>
            @foreach ($invalid_events as $event)
            <div class="accordion" id="membershipBenefitsAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="exclusiveContentHeader">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#event-{{$event->id}}" aria-expanded="false" aria-controls="exclusiveContentCollapse">
                            {{$event->title}}
                        </button>
                    </h2>
                    <div id="event-{{$event->id}}" class="accordion-collapse collapse p-2 " aria-labelledby="exclusiveContentHeader" data-bs-parent="#membershipBenefitsAccordion" style="">
                        <div style="text-align: justify;"> {!!$event->description!!}</div>
                        {{-- <span>{{$event->title}}</span> --}}
                        <div> <strong> Date/Heure de début:</strong> {{ Carbon\Carbon::parse($event->start_time)->format('d-m-Y à H:i') }}</div>
                        <div> <strong>Date/Heure de fin:</strong> {{ Carbon\Carbon::parse($event->end_time)->format('d-m-Y à H:i') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h3>Événements passés</h3>
            @if (!$events->isEmpty())
            {{-- {{dd($valid_events)}} --}}
            @foreach ($valid_events as $event)

            <div class="accordion" id="membershipBenefitsAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="exclusiveContentHeader">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#event-{{$event->id}}" aria-expanded="false" aria-controls="exclusiveContentCollapse">
                            {{$event->title}}
                        </button>
                    </h2>
                    <div id="event-{{$event->id}}" class="accordion-collapse collapse p-2 " aria-labelledby="exclusiveContentHeader" data-bs-parent="#membershipBenefitsAccordion" style="">
                        <div style="text-align: justify;"> {!!$event->description!!}</div>
                        {{-- <span>{{$event->title}}</span> --}}
                        <div> <strong> Date/Heure de début:</strong> {{ Carbon\Carbon::parse($event->start_time)->format('d-m-Y à H:i') }}</div>
                        <div> <strong>Date/Heure de fin:</strong> {{ Carbon\Carbon::parse($event->end_time)->format('d-m-Y à H:i') }}</div>
                    </div>
                </div>
            </div>

            {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{$event->title}}</span>
            <span>Date: {{ Carbon\Carbon::parse($event->created_at)->format('d-m-Y à H:i') }}</span>
            </li> --}}

            @endforeach
            @else
            <div class="d-flex justify-content-between align-items-center">
                <p>Nous n'avons pas d'événements programmés</p>
            </div>
            @endif

        </div>

        {{-- <div class="pt-2">
            {{$events->links()}}
    </div> --}}
    </div>
</section>
@endsection
