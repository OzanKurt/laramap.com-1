@extends('layouts.default')

@section('page_title')
    Privacy Policy
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
                        Privacy Policy
                    </h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <article>

                                <h1>Business Privacy Policy - Laramap.com</h1>

                                <p>This privacy policy sets out how Florian Wartner uses and protects any information that you give Florian Wartner when you visit Laramap.com</p>

                                <p>Florian Wartner is committed to ensuring that your privacy is protected. Should we ask you to provide
                                    certain information by which you can be identified when using Laramap.com, then you can be assured that it will
                                    only be used in accordance with this privacy statement.

                                </p><p>Florian Wartner may change this policy from time to time by updating this page. You should check this page
                                    from time to time to ensure that you are happy with any changes. This policy is effective from 25.05.2018.</p>

                                <h2>What We Collect</h2>

                                <p>We may collect the following information:</p>
                                <ul>
                                    <li>Your name</li>
                                    <li>Your username</li>
                                    <li>Your city (optional)</li>
                                    <li>Your country (optional)</li>
                                    <li>Your postal code (optional)</li>
                                    <li>Your company name (optional)</li>
                                    <li>Your email address</li>
                                </ul>

                                <h2>What We Do with the Information We Gather</h2>

                                <p>We do need this information in order to:</p>
                                <ul>
                                    <li>Place you on the map</li>
                                    <li>Enrich the community content</li>
                                    <li>Send you blog newsletters</li>
                                </ul>

                                <p>Who the data is shared with:</p>
                                <ul>
                                    <li>The application uses Algolia for searching. You can find Algolia's <a
                                            href="https://www.algolia.com/doc/faq/security-privacy/gdpr/">privacy policy here</a></li>
                                    <li>The application is deployed on servers from <a href="https://www.digitalocean.com/security/gdpr/">DigitalOcean</a></li>
                                    <li>The email is sent to MailChimp. It gets added to the newsletter list there. You can find MailChimp's <a href="https://mailchimp.com/legal/privacy/">privacy policy here</a>. </li>
                                </ul>

                                <h2>How Long the Information Is Stored</h2>
                                <p>The information is stored as long as you are subscribed to one of the newsletters or signed up to the application. When you end the subscription or delete your account, it will automatically be deleted.</p>

                                <h2>Security</h2>
                                <p>We are committed to ensuring that your information is secure. In order to prevent unauthorised access or
                                    disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and
                                    secure the information we collect online.</p>

                                <h2>Controlling Your Personal Information</h2>
                                <p>You may choose to restrict the collection or use of your personal information in the following ways:</p>
                                <ul>
                                    <li>Don't sign up to the application.</li>
                                    <li>Don't subscribe to one of the newsletters.</li>
                                    <li>Unsubscribe from one of the newsletters. (Unsubscribe link in the newsletter)</li>
                                    <li>Delete your account on the application. (Delete link in the <a
                                            href="{{ url('/account') }}">settings</a> section)</li>
                                </ul>

                                <p>We will not sell, distribute or lease your personal information to third parties unless we have your
                                    permission or are required by law to do so.</p>

                                <h2>Website analytics</h2>
                                <p>To improve your experience on our site, we may use 'cookies'. Cookies are an industry standard and most major web sites use them. A cookie is a small text file that our site may place on your computer as a tool to remember your preferences. You may refuse the use of cookies by selecting the appropriate settings on your browser, however please note that if you do this you may not be able to use the full functionality of this website.</p>
                                <p>Our website may contain links to other websites. Please be aware that we are not responsible for the privacy practices of such other sites. When you go to other websites from here, we advise you to be aware and read their privacy policy.</p>
                                <p>Our website uses Google Analytics, a service which transmits website traffic data to Google servers in the United States. Google Analytics does not identify individual users or associate your IP address with any other data held by Google. We use reports provided by Google Analytics to help us understand website traffic and webpage usage.</p>
                                <p>By using this website, you consent to the processing of data about you by Google in the manner described in <a href="https://policies.google.com/privacy">Google's Privacy Policy</a> - external site and for the purposes set out above. You can opt out of Google Analytics if you disable or refuse the cookie, disable JavaScript, or use the opt-out service provided by Google - external site.</p>

                                <h2>Our Details</h2>
                                <p>This blog is owned and operated by Florian Wartner.
                                </p><p>You can contact us at: florian@mapawa.de
                                    <br>
                                </p><p>Our business is located at:
                                    <br><br>
                                    Florian Wartner<br>
                                    Marliring 74<br>
                                    23566 Lübeck<br>
                                    Germany</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
