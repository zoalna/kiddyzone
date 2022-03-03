
@if (core()->getConfigData('customer.settings.newsletter.subscription'))
  <div id="subs-newsletter" class="footer-top-cms">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('/themes/kiddyzone/assets/images/footer-newsletter.png') }}">
        </div>

        
        <div class="col-md-6">
          <div class="newslatter">
            <form action="{{ route('shop.subscribe') }}">
              <h5>Subscribe To Our Newsletter</h5>
              <div class="input-group">
                  <input
                      type="email"
                      name="subscriber_email"
                      class="control form-control"
                      placeholder="{{ __('velocity::app.customer.login-form.your-email-address') }}"
                      aria-label="Newsletter"
                      required />
                  <button class="btn btn-large btn-primary">
                                    {{ __('shop::app.subscription.subscribe') }}
                                </button>                    
              </div>
            </form>
          </div>
        </div>
        
        
        <div class="footer-social" style="display:none;">
          <ul>
            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endif