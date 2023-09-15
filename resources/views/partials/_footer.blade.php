{{-- <footer class="bg-light">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-3 mb-4">
          <img src="https://via.placeholder.com/150x50" alt="Logo">
        </div>
        <div class="col-lg-3 mb-4">
          <h5>Nous Contacter</h5>
          <ul class="list-unstyled">
            <li>Téléphone: 223145264</li>
            <li>Email: vinemyne@mailinator.com</li>
          </ul>
        </div>
        <div class="col-lg-3 mb-4">
          <h5>Nous Suivre</h5>
          <ul class="list-unstyled">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
   --}}


<footer class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @if (isset($site_settings->site_logo ))
                <a href="/" width="500" class="site-logo">
                    <img src="{{isset($site_settings->site_logo ) ? asset('/storage/site_logos/'.$site_settings->site_logo) : $site_settings->site_name}}" alt="{{isset($site_settings->site_name) ? $site_settings->site_name : "SYNAH-CI"}}">
                </a>
                @else
                <a href="/" width="500" class="site-logo">
                    {{ isset($site_settings->site_name) ? $site_settings->site_name : "SYNAH-CI"}}
                </a>
                @endif

            </div>
            <div class="col-lg-3">
                <h4>Nous Contacter</h4>
                <ul class="list-unstyled">
                    <li>
                        <span>
                            <i class="bi bi-phone-fill"></i>
                        </span>
                        &nbsp;<a href="#">{{isset($site_settings->contact_mobile) ? 'Téléphone: '.$site_settings->contact_mobile : ''}}</a>
                    </li>
                    <li>
                        <span><i class="bi bi-envelope-fill"></i></span>
                        &nbsp;<a href="#">{{isset($site_settings->contact_email ) ? 'Email: '.$site_settings->contact_email : ''}}</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Liens Rapides</h4>
                <ul class="list-unstyled">
                    <li>
                        <span>
                            <i class="bi bi-phone-fill"></i>
                        </span>
                        &nbsp;<a href="#">Accueil</a>
                    </li>
                    <li>
                        <span><i class="bi bi-envelope-fill"></i></span>
                        &nbsp;<a href="#">Services</a>
                    </li>
                    <li>
                        <span><i class="bi bi-envelope-fill"></i></span>
                        &nbsp;<a href="#">A propos de nous</a>
                    </li>
                    <li>
                        <span><i class="bi bi-envelope-fill"></i></span>
                        &nbsp;<a href="#">Contacts</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Nous Suivre</h4>
                <ul class="list-unstyled">
                    <li>
                        <span style="color:#0000ff;">
                            <i class="bi bi-facebook"></i>
                        </span>
                        &nbsp;<a href="{{isset($site_settings->social_facebook ) ? $site_settings->social_facebook : '#'}}">Facebook</a>
                    </li>
                    <li>
                        <span style="color:#76b7f7;">
                            <i class="bi bi-twitter"></i>
                        </span>
                        &nbsp;<a href="{{isset($site_settings->social_twitter ) ? $site_settings->social_twitter : '#'}}">Twitter</a>
                    </li>
                    <li>
                        <span style="color:#0d73b2;">
                            <i class="bi bi-linkedin"></i>
                        </span>
                        &nbsp;<a href="{{isset($site_settings->social_linkedin ) ? $site_settings->social_linkedin : '#'}}">LinkedIn</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</footer>
