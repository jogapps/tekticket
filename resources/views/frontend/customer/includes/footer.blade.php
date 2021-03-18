<footer class="footer py-4">
    <section class="large-footer-padding">
        <div class="row py-4 expand-at-large text-left">
            <div class="col-lg-3">
                <header>Helpful Links</header>
                <div class="row helpful-links">
                    <div class="col-12">
                        <a href="{{ route('contact.us') }}">Contact Us</a>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('blog.index') }}">Blog</a>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('faq') }}">FAQ</a>
                    </div>
                    @foreach($generalPages as $page)
                        <div class="col-12">
                            <a href="{{ route('page', ['keyword' => $page->slug]) }}">{{ $page->title }}</a>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3">
                <header>Top Categories</header>
                <div class="row helpful-links">
                    @foreach($categories as $category)
                        <div class="col-12">
                            <a href="{{ route('events.listing', ['keyword' => $category->slug]) }}">{{ $category->name }}</a>
                        </div>
                       @break($loop->iteration === 5)
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <header>My Account</header>
                <div class="row helpful-links">
                    @auth
                        <div class="col-12">
                            <a href="{{ route('profile.index') }}">My Profile</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('ticket.index') }}">My Tickets</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('page', ['keyword' => 'about-us']) }}">Help</a>
                        </div>
                        <div class="col-12">
                            <a href="#newsletterModal" data-toggle="modal">Newsletter</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('login') }}">Sign Out</a>
                        </div>
                    @else
                        <div class="col-12">
                            <a href="{{ route('organizer.login') }}">Sell Ticket</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('register') }}">Register</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('profile.index') }}">My Profile</a>
                        </div>
                        <div class="col-12">
                            <a href="#">Newsletter</a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="col-lg-3">
                <header>Follow Us:</header>
                <div class="row helpful-links">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ $information->facebook }}">
                                <svg viewBox="0 0 7 14" width="25" height="25" fill="rgba(255, 255, 255, 1)"><path d="M6.418 4.38H4.232V2.978c0-.528.357-.65.608-.65h1.543V.007L4.258 0C1.9 0 1.364 1.73 1.364 2.836V4.38H0V6.77h1.364v6.76h2.868V6.77h1.936l.25-2.39z"></path></svg>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ $information->instagram }}">
                                <svg viewBox="0 0 16 16" width="25" height="25" fill="rgba(255, 255, 255, 1)"><path d="M8 1c1.901 0 2.14.008 2.886.042.745.034 1.254.152 1.7.326.46.178.85.418 1.24.807.388.389.628.78.807 1.24.173.445.29.954.325 1.699.034.747.042.985.042 2.886 0 1.901-.008 2.14-.042 2.886-.034.745-.152 1.254-.325 1.7-.18.46-.419.85-.808 1.24-.389.388-.78.628-1.24.807-.445.173-.954.29-1.699.325C10.14 14.992 9.901 15 8 15c-1.901 0-2.14-.008-2.886-.042-.745-.034-1.254-.152-1.7-.325a3.432 3.432 0 0 1-1.24-.808c-.388-.389-.628-.78-.806-1.24-.174-.445-.292-.954-.326-1.699C1.008 10.14 1 9.901 1 8c0-1.901.008-2.14.042-2.886.034-.745.152-1.254.326-1.7.178-.46.418-.85.807-1.24.389-.388.78-.628 1.24-.806.445-.174.954-.292 1.699-.326C5.86 1.008 6.099 1 8 1zm-.043 9.389a2.346 2.346 0 1 1 0-4.692 2.346 2.346 0 0 1 0 4.692zm0-5.96a3.614 3.614 0 1 0 0 7.228 3.614 3.614 0 0 0 0-7.228zm4.608-.136a.858.858 0 1 0-1.717 0 .858.858 0 0 0 1.717 0z"></path></svg>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ $information->twitter }}">
                                <svg viewBox="0 0 14 12" width="25" height="25" fill="rgba(255, 255, 255, 1)"><path d="M14 1.353a5.704 5.704 0 0 1-1.65.454A2.89 2.89 0 0 0 13.613.211c-.555.33-1.17.57-1.824.7A2.862 2.862 0 0 0 9.693 0 2.879 2.879 0 0 0 6.82 2.885c0 .226.025.446.074.657A8.141 8.141 0 0 1 .975.528a2.881 2.881 0 0 0-.39 1.45c0 1.001.508 1.884 1.279 2.402a2.852 2.852 0 0 1-1.301-.361v.037c0 1.397.99 2.563 2.304 2.828a2.87 2.87 0 0 1-1.298.05 2.877 2.877 0 0 0 2.683 2.003A5.746 5.746 0 0 1 0 10.132a8.103 8.103 0 0 0 4.403 1.297c5.283 0 8.172-4.397 8.172-8.21 0-.124-.002-.249-.008-.373A5.846 5.846 0 0 0 14 1.353z"></path></svg>
                            </a>
                        </div>
                    </div>
                    <h5>Download our app:</h5>
                    <a href="javascript:void(0);">
                        <img alt="Apple App Store" title="Apple App Store" src="//uk.tmconst.com/production-9-109-0-2579028/images/logo/apple-store/de.svg" class="jy2lbt-4 cYNocT">
                    </a> &nbsp;&nbsp;
                    <a href="javascript:void(0);">
                        <img alt="Google Play Store" title="Google Play Store" src="//uk.tmconst.com/production-9-109-0-2579028/images/logo/google-store/de.svg" class="jy2lbt-4 cYNocT">
                    </a>
                </div>
            </div>
        </div>

        <hr class="expand-at-large">

        <div class="row center-at-lg">
            <div class="col-12 ">
                TekTickets | &copy; Copyrights. All right reserved. {{ now()->format('Y') }}
            </div>
        </div>
    </section>
</footer>
