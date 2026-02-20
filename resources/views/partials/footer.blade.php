    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
                        <h2 class="subscribe-title">Stay Informed</h2>
                        <form class="text-center form-inline">
                            <input class="mb-20 form-control" name="email" placeholder="Enter Your Email Here">
                            <button type="submit" class="btn btn-common sub-btn" data-style="zoom-in" data-spinner-size="30" name="submit" id="submit">
                  <span class="ladda-label"><i class="lni-check-box"></i> Subscribe</span>
                </button>
                        </form>
                    </div>
                    <div class="footer-logo" style="padding: 12px 0;">
                        <img src="{{ asset("logo.png") }}" alt="" style="max-height: 44px; width: auto; object-fit: contain; padding: 8px 0;">
                    </div>
                    {{-- Footer content is provided by controller as $footer; ensure variable exists --}}
                    @php $footer = $footer ?? null; @endphp
                    <div class="footer-contact text-light" style="margin-top:8px;margin-bottom:8px;">
                        @if($footer && ($footer->address || $footer->phone || $footer->email))
                            <p style="margin:0;">@if($footer->address){{ $footer->address }}@endif</p>
                            <p style="margin:0;">@if($footer->phone) Phone: {{ $footer->phone }} @endif @if($footer->email) | Email: <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>@endif</p>
                        @endif
                    </div>
                    <div class="social-icons-footer">
                        <ul>
                            @if($footer && $footer->facebook)
                                <li class="facebook"><a target="_blank" href="{{ $footer->facebook }}"><i class="lni-facebook-filled"></i></a></li>
                            @endif
                            @if($footer && $footer->x)
                                <li class="twitter"><a target="_blank" href="{{ $footer->x }}"><i class="lni-twitter-filled"></i></a></li>
                            @endif
                            @if($footer && $footer->pinterest)
                                <li class="pinterest"><a target="_blank" href="{{ $footer->pinterest }}"><i class="lni-pinterest"></i></a></li>
                            @endif
                            @if($footer && $footer->instagram)
                                <li class="instagram"><a target="_blank" href="{{ $footer->instagram }}"><i class="lni-instagram-filled"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
