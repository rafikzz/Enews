<footer>
    <img src="{{ asset('images/footer-pattern.png') }}" class="img-fluid footer-pattern" alt="#">
    <div class="footer-topbar">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 pr-lg-5">
                <div class="widget">
                    <img src="{{ $setting->logo() }}" class="footer-logo" alt="#">
                    <p class=" mt-4 mr-lg-4">It is a long established fact that a reader will be distracted by the
                        readable content of a page when looking at its layout.</p>
                    <p class="mt-5 mb-0">Copyrights 2020 ©<span class="main-color">iqonic.design</span></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="widget">
                    <h4 class="footer-title">Useful links</h4>
                    <div class="menu-link">
                        <ul id="menu-link-menu" class="menu">
                            @foreach ($menuList as $menu)
                                <li> <a href="{{ url($menu->link) }}">{{ $menu->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="widget">
                    <h4 class="footer-title ">Contact Us</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="iq-contact">
                                <li>
                                    <a><i class="fa fa-home" aria-hidden="true"></i><span>{{ $setting->office_location}}</span></a>
                                </li>
                                {{-- <li>
                                    <a href="mailto:support@themes.com"><i class="fa fa-envelope"
                                            aria-hidden="true"></i><span>support@themes.com</span></a>
                                </li> --}}
                                <li>
                                    <a href="tel:+0123456789"><i class="fa fa-phone"
                                            aria-hidden="true"></i><span>{{ $setting->contact_information}}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
