    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
                        <h2 class="subscribe-title">Stay Informed</h2>
                        <form class="text-center form-inline" id="subscribeForm" action="{{ route('subscribe.store') }}" method="post">
                            @csrf
                            <input class="mb-20 form-control" type="email" name="email" id="subscribeEmail" placeholder="Enter Your Email Here" required>
                            <button type="submit" class="btn btn-common sub-btn" data-style="zoom-in" data-spinner-size="30" name="submit" id="subscribeSubmit">
                  <span class="ladda-label"><i class="lni-check-box"></i> Subscribe</span>
                </button>
                        </form>
                        <small id="subscribeMessage" class="d-block mt-2 text-center" style="min-height: 20px;"></small>
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

    <script>
        (function () {
            const form = document.getElementById('subscribeForm');
            if (!form) {
                return;
            }

            const emailInput = document.getElementById('subscribeEmail');
            const submitButton = document.getElementById('subscribeSubmit');
            const messageBox = document.getElementById('subscribeMessage');

            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                if (!emailInput || !messageBox || !submitButton) {
                    return;
                }

                messageBox.textContent = '';
                messageBox.className = 'd-block mt-2 text-center';
                submitButton.disabled = true;

                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const payload = await response.json();
                    const status = payload.status || 'success';

                    messageBox.textContent = payload.message || 'Subscription request completed.';
                    if (status === 'success') {
                        messageBox.classList.add('text-success');
                        form.reset();
                    } else if (status === 'info') {
                        messageBox.classList.add('text-warning');
                    } else {
                        messageBox.classList.add('text-danger');
                    }
                } catch (error) {
                    messageBox.textContent = 'Unable to subscribe right now. Please try again.';
                    messageBox.classList.add('text-danger');
                } finally {
                    submitButton.disabled = false;
                }
            });
        })();
    </script>
