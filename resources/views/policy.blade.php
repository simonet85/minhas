@extends("layouts.app")
@section("content")

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Déclarations de politique générale</li>
        </ol>
    </div>
</nav>

<!-- Policy and Position Statements -->
<section class="container mb-5">
    <h2 class="mb-4">Politique générale</h2>
    <div class="accordion" id="accordionExample">
        @if(!$policies->isEmpty())
        @php
        $i=1;
        @endphp
        @foreach ($policies as $policy)

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$policy->id}}" aria-expanded="false" aria-controls="collapseOne-{{$policy->id}}">
                    {{$policy->title}} #{{$i++}}
                </button>
            </h2>
            <div id="collapseOne-{{$policy->id}}" class=" {{ $i == 1 ? 'accordion-collapse collapse open' : 'accordion-collapse collapse'}}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>{!!$policy->description!!}</p>
                </div>
            </div>
        </div>

        @endforeach

        @else
        <p class="text-center">Nous n'avons trouvé aucune politique générale !</p>
        @endif
        {{-- <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Policy Statement #2
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Policy Statement #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div> --}}
    </div>
    <div class="mt-5">
        {{$policies->links()}}
    </div>
</section>
@endsection
