@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Réglage</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">Réglage</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    {{-- @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>

    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif --}}
    <section class="section profile">

        <div class="container">
            {{-- <div class="row "> justify-content-center --}}
            <div class="row ">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Site Settings') }}</div>

                        <div class="card-body">
                            @if(session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                            @endif

                            <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data" class="row g-3">
                                @csrf

                                <div class="form-group">
                                    <label for="site_name">{{ __('Site Name') }}</label>
                                    <input id="site_name" type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name" value="{{ old('site_name', isset($site_settings->site_name) ? $site_settings->site_name : null ) }}" autocomplete="site_name" autofocus>

                                    @error('site_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contact_mobile">{{ __('Contact Mobile') }}</label>
                                    <input id="contact_mobile" type="text" class="form-control @error('contact_mobile') is-invalid @enderror" name="contact_mobile" value="{{ old('contact_mobile', isset($site_settings->contact_mobile) ? $site_settings->contact_mobile : null )  }}" autocomplete="contact_mobile">

                                    @error('contact_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">{{ __('Contact Email') }}</label>
                                    <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email', isset($site_settings->contact_email) ? $site_settings->contact_email : null)  }}" autocomplete="contact_email">

                                    @error('contact_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Social Links') }}</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Facebook') }}</span>
                                        </div>
                                        <input type="url" class="form-control @error('social_facebook') is-invalid @enderror" name="social_facebook" value="{{ old('social_facebook', isset($site_settings->social_facebook) ? $site_settings->social_facebook  : null) }}" autocomplete="social_facebook">

                                        @error('social_facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Twitter') }}</span>
                                        </div>
                                        <input type="url" class="form-control @error('social_twitter') is-invalid @enderror" name="social_twitter" value="{{ old('social_twitter', isset($site_settings->social_twitter) ? $site_settings->social_twitter : null) }}" autocomplete="social_twitter">

                                        @error('social_twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('LinkedIn') }}</span>
                                        </div>
                                        <input type="url" class="form-control @error('social_linkedin') is-invalid @enderror" name="social_linkedin" value="{{ old('social_linkedin', isset($site_settings->social_linkedin) ? $site_settings->social_linkedin  : null)  }}" autocomplete="social_linkedin">

                                        @error('social_linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <label for="site_logo">{{ __('Site Logo') }}</label>

                                    <div class="custom-file">
                                        <input type="file" name="site_logo" class="custom-file-input @error('site_logo') is-invalid @enderror" id="site_logo">
                                        {{-- <label class="custom-file-label" for="site_logo">{{ __('Choose file') }}</label> --}}

                                        @error('site_logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    @if(isset($site_settings->site_logo))
                                    <img src="{{ asset('storage/site_logos/'.$site_settings->site_logo) }}" class="mt-3" width="200">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">{{ __('Save Settings') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>
</main><!-- End #main -->
@endsection
