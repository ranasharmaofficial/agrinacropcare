@extends('master')

@section('title')About Us - Agrina Crop Care @endsection

@section('description')Agrina Crop Care Description @endsection


@section('content')
<div id="page-header" class="content-contrast">
  <div class="page-title-container">
      <div class="background-overlay"></div>
      <div class="container centered-container">
          <div class="centered-inner-container">
              <h1 class="page-title">About Us</h1>
              <hr class="separator small-separator">
              <div class="heading-caption">Meet the Team Behind Agrina Crop Care</div>
          </div>
      </div>
  </div>
  <div class="breadcrumb-container">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <nav class="breadcrumb">
                      <a class="breadcrumb-item" href="{{url('')}}">Home</a>
                      <span class="breadcrumb-item active">About Us</span>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>

<section class="section">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading-title">
                  <h3>About <strong class="text-color">Agrina Crop Care</strong></h3>
              </div>
          </div>

          <div class="col-lg-6 col-md-12">
              <img class="img-radius img-border img-shadow img-margin no-margin-lg" src="{{url('front_assets/img/about-us.jpg')}}" alt="image alt">
          </div>

          <div class="col-lg-6 col-md-12">
              <p>
                  We are Agrina Crop Care, We have many experience in garden services and landscape design, We offer professional services from planting, maintenance and design of your garden. We also provide regular garden maintenance,
                  decoration and landscaping, stone hardscaping, design and planting, garden clearance, watering plants or complete design of your garden.
              </p>
              <p>Whatever your needs we will be able to satisfy your exact needs. We Also help you to improve your graden wheather you need regular garden maintenance, grass cutting or complete design your garden.</p>
              <a href="{{url('contact-us')}}" class="btn btn-default btn-outline">Get in Touch</a>
          </div>
          <div class="col-md-12">
              <hr class="separator">
          </div>
          <div class="col-md-12 col-lg-4">
              <div class="feature mb-3 text-center">
                  <i class="craftico-sustainability"></i>
                  <h4>Full Guarantees for All Works</h4>
              </div>
          </div>
          <div class="col-md-12 col-lg-4">
              <div class="feature mb-3 text-center">
                  <i class="craftico-atmosphere-on-earth"></i>
                  <h4>Eco Friendly &amp; Naturally Sourced Materials</h4>
              </div>
          </div>
          <div class="col-md-12 col-lg-4">
              <div class="feature mb-3 text-center">
                  <i class="craftico-agriculture"></i>
                  <h4>Full Design &amp; Planning Service</h4>
              </div>
          </div>
      </div>
  </div>
</section>
<?php if(false) { ?>
<section class="section gray-bg border-section">
  <div class="container">
      <div class="row">
          <div class="offset-md-1 col-md-10">
              <div class="heading-title text-center gap" data-gap-bottom="40">
                  <h3>Meet the Team behind <strong class="text-color">Zengarden</strong></h3>
              </div>
          </div>

          <div class="col-md-6 col-lg-4">
              <div class="team-item">
                  <img src="img/teams/team-1.jpg" alt="image team">
                  <div class="team-item-container">
                      <h5 class="no-margin">James Tompson</h5>
                      <strong class="text-color">CEO &amp; Owner</strong>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="team-item">
                  <img src="img/teams/team-2.jpg" alt="image team">
                  <div class="team-item-container">
                      <h5 class="no-margin">Celina Kelley</h5>
                      <strong class="text-color">Landscape Designer</strong>
                   </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="team-item">
                  <img src="img/teams/team-3.jpg" alt="image team">
                  <div class="team-item-container">
                      <h5 class="no-margin">William Anderson</h5>
                      <strong class="text-color">Senior Landscaper</strong>
                      <p>Sed nec felis pellentesque, lacinia dui sed, ultricies sapien. Pellentesque orci lectus, consectetur vel cosuere rosuere.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="team-item">
                  <img src="img/teams/team-4.jpg" alt="image team">
                  <div class="team-item-container">
                      <h5 class="no-margin">Jenifer Lawrance</h5>
                      <strong class="text-color">Maintenance Manager</strong>
                      <p>Sed nec felis pellentesque, lacinia dui sed, ultricies sapien. Pellentesque orci lectus, consectetur vel posuere posuere.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="team-item">
                  <img src="img/teams/team-5.jpg" alt="image team">
                  <div class="team-item-container">
                      <h5 class="no-margin">Smith Howard</h5>
                      <strong class="text-color">Senior Gardener</strong>
                      <p>Sed nec felis pellentesque, lacinia dui sed, ultricies sapien. Pellentesque orci lectus, consectetur vel posuere posuere.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="team-item">
                  <img src="img/teams/team-6.jpg" alt="image team">
                  <div class="team-item-container">
                      <h5 class="no-margin">Anna Angeline</h5>
                      <strong class="text-color">Decoration Manager</strong>
                      <p>Sed nec felis pellentesque, lacinia dui sed, ultricies sapien. Pellentesque orci lectus, consectetur vel posuere posuere.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="section">
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="counter-box">
                  <i class="craftico-humans_01"></i>
                  <div class="counter-content">
                      <span class="count-me number" data-to="245" data-speed="2500">245</span>
                      <h6 class="counter-title">Happy Customers</h6>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="counter-box">
                  <i class="craftico-flower"></i>
                  <div class="counter-content">
                      <span class="count-me number" data-to="358" data-speed="2500">358</span>
                      <h6 class="counter-title">Project Clear</h6>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="counter-box no-margin-sm">
                  <i class="craftico-ecology-award"></i>
                  <div class="counter-content">
                      <span class="count-me number" data-to="78" data-speed="2500">93</span>
                      <h6 class="counter-title">Winning Awards</h6>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="counter-box no-margin">
                  <i class="craftico-urban-planning"></i>
                  <div class="counter-content">
                      <span class="count-me number" data-to="128" data-speed="2500">286</span>
                      <h6 class="counter-title">Company Member</h6>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<?php } ?>
<section class="section cta-bottom-container content-contrast">
  <div class="container">
      <div class="row">
          <div class="col-md-8 text-center">
              <h2>Ready to <strong>Get Started?</strong></h2>
          </div>
          <div class="col-lg-3 col-md-4">
              <a href="#" class="btn btn-default btn-block">Get Free Quote</a>
          </div>
      </div>
  </div>
</section>


  @endsection