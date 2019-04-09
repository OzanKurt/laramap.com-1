@extends('layouts.default')

@section('page_title')
    Sponsors
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="page-header">
                    <h1 class="page-title">
                        Sponsors
                    </h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <section id="sponsors">
                                <h3 class="text-center">
                                    Our lovely sponsors
                                </h3>

                                <p class="text-center">Laramap could not be without our sponsors! That´s why we want to say thank you to all of our sponsors!</p>

                                <br>

                                <div class="row">
                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/DO_Logo_Horizontal_Blue.png') }}" alt="DigitalOcean" style="max-height: 40px;">
                                    </div>

                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/logo-algolia-nebula-blue-whitespaces-1b393e11.png') }}" alt="Algolia" style="max-height: 40px;">
                                    </div>

                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/pusher.png') }}" alt="Pusher" style="max-height: 40px;">
                                    </div>

                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/vultr.png') }}" alt="Vultr" style="max-height: 40px;">
                                    </div>
                                </div>
                            </section>

                            <hr width="50%">

                            <h4 class="text-center">
                                Want to sponsor Laramap?
                            </h4>

                            <p class="text-center">
                                Drop us a line on <a href="https://twitter.com/laramapcom">Twitter</a> and we´ll get in contact with you asap.
                            </p>

                            <div class="row justify-content-center">
                                <div class="col-md-2 ml-md-auto">
                                    <a href="https://www.buymeacoffee.com/fwartner" target="_blank">
                                        <img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" >
                                    </a>
                                </div>

                                <div class="col-md-2 mr-md-auto">
                                    <a href="https://www.patreon.com/bePatron?u=3200756" data-patreon-widget-type="become-patron-button">Become a Patron!</a><script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>
                                </div>
                            </div>

                            <br>

                            <div class="text-center" >

                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="text-wrap p-lg-6">--}}
                            {{--<section id="become-a-sponsor">--}}
                                {{--<h3 class="text-center">--}}
                                    {{--Want to become a sponsor?--}}
                                {{--</h3>--}}

                                {{--<br>--}}

                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-6 col-lg-4">--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-body text-center">--}}
                                                {{--<div class="card-category">Artisan 💌</div>--}}
                                                {{--<div class="display-3 my-4">$5 <small>/ month</small></div>--}}
                                                {{--<ul class="list-unstyled leading-loose">--}}
                                                    {{--<li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> Sponsor-Badge on your profile</li>--}}
                                                    {{--<li><i class="fe fe-x text-danger mr-2" aria-hidden="true"></i> Listed on the backers section on GitHub</li>--}}
                                                    {{--<li><i class="fe fe-x text-danger mr-2" aria-hidden="true"></i> Access to the private slack channel</li>--}}
                                                {{--</ul>--}}

                                                {{--<div class="text-center mt-6">--}}
                                                    {{--<form action="/payments/subscription" method="POST">--}}
                                                        {{--@csrf--}}
                                                        {{--<script--}}
                                                            {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
                                                            {{--data-key="#"--}}
                                                            {{--data-name="Laramap.com"--}}
                                                            {{--data-description="Artisan Monthl"--}}
                                                            {{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
                                                            {{--data-locale="auto">--}}
                                                        {{--</script>--}}
                                                    {{--</form>--}}
                                                    {{--<button class="btn btn-secondary btn-block" id="artisan">Choose plan</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-sm-6 col-lg-4">--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-body text-center">--}}
                                                {{--<div class="card-category">Supporter 😍</div>--}}
                                                {{--<div class="display-3 my-4">$10 <small>/ month</small></div>--}}
                                                {{--<ul class="list-unstyled leading-loose">--}}
                                                    {{--<li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> Sponsor-Badge on your profile</li>--}}
                                                    {{--<li><i class="fe fe-x text-success mr-2" aria-hidden="true"></i> Listed on the backers section on GitHub</li>--}}
                                                    {{--<li><i class="fe fe-x text-danger mr-2" aria-hidden="true"></i> Access to the private slack channel</li>--}}
                                                {{--</ul>--}}

                                                {{--<div class="text-center mt-6">--}}
                                                    {{--<button class="btn btn-secondary btn-block" id="supporter">Choose plan</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-sm-6 col-lg-4">--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-body text-center">--}}
                                                {{--<div class="card-category">Lover ❤️</div>--}}
                                                {{--<div class="display-3 my-4">$15 <small>/ month</small></div>--}}
                                                {{--<ul class="list-unstyled leading-loose">--}}
                                                    {{--<li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> Sponsor-Badge on your profile</li>--}}
                                                    {{--<li><i class="fe fe-x text-success mr-2" aria-hidden="true"></i> Listed on the backers section on GitHub</li>--}}
                                                    {{--<li><i class="fe fe-x text-success mr-2" aria-hidden="true"></i> Access to the private slack channel</li>--}}
                                                {{--</ul>--}}

                                                {{--<div class="text-center mt-6">--}}
                                                    {{--<button class="btn btn-secondary btn-block" id="lover">Choose plan</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</section>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
