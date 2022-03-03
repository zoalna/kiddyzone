<footer id="footer">
<div class="cms_searvice">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
        <div class="text-center"><img class="ftr-logo" src="{{ asset('/themes/kiddyzone/assets/images/footer-logo.png') }}"></div>
          <div>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">Information</h5><hr>
        <ul class="list-unstyled ul-wrapper footer-list">
          <li><a href="@php echo route('shop.cms.page', 'about-us') @endphp">About Us</a></li>
          <li><a href="@php echo route('shop.cms.page', 'contact-us') @endphp">Contact us</a></li>
          <li><a href="@php echo route('shop.cms.page', 'mystery-box') @endphp">Mystery Box </a></li>
          <li><a href="@php echo route('shop.cms.page', 'gift-cards') @endphp">Gift Cards </a></li>
          <li><a href="@php echo route('shop.cms.page', 'loyalty-program-terms') @endphp"> Loyalty Program Terms </a></li>
          <li><a href="@php echo route('shop.cms.page', 'subscription-and-card') @endphp"> Subscription and Card </a></li>
          <li><a href="@php echo route('shop.cms.page', 'subscription-card-form') @endphp"> Subscription Card Form </a></li>
          <li><a href="#">Store Locations</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Advertise with us</a></li>
          <li><a href="#">Join us</a></li>
        </ul> 
      </div>
      <div class="col-sm-3 footer-block footer-list">
         <h5 class="footer-title">Policies</h5><hr>
        <ul class="list-unstyled ul-wrapper">
          <li><a href="@php echo route('shop.cms.page', 'store-locator') @endphp"> Store Locator </a></li>
          <li><a href="@php echo route('shop.cms.page', 'help-center') @endphp"> Help Center </a></li>
          <li><a href="@php echo route('shop.cms.page', 'uae-stores') @endphp"> UAE Stores </a></li>
          <li><a href="@php echo route('shop.cms.page', 'videos') @endphp"> Videos </a></li>
          <li><a href="#">Return Policy</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Security Policy</a></li>
          <li><a href="#">Delivery Policy</a></li>
          <li><a href="#">Terms of Sale</a></li>
          <li><a href="#">Terms and Conditions</a></li>
        </ul>
      </div>
     <div class="col-sm-3 footer-block footer-list">
        <h5 class="footer-title">Account</h5><hr>
        <ul class="list-unstyled ul-wrapper">
          <li><a href="#">My Account</a></li>
          <li><a href="#">Wishlist</a></li>
        </ul>
      </div>
      <div class="col-sm-3 footer-block">
        <div class="content_footercms_right">
          <div class="footer-contact footer-list">
            <h5 class="contact-title footer-title">Contact</h5><hr>
            
            <ul class="ul-wrapper">
            	<li><img src="{{ asset('/themes/kiddyzone/assets/images/CALL.svg') }}"/><span class="phone2"><a href="tel:+97-345-345678">+٥٤١٤ ٦٦٥٣ ٩٧٤</a></span></li>
                <li><img src="{{ asset('/themes/kiddyzone/assets/images/envelope.svg') }}"/><span class="mail2"><a href="#">online@qntgc.com</a></span></li>
                <li><img src="{{ asset('/themes/kiddyzone/assets/images/location.svg') }}"/><span class="mail2"><a href="#">Kiddy Zone at Landmark Mall Basement Floor Qatar Ar Rayyan</a></span></li>
            </ul>
            <div class="social-media">
              <ul class="footer-link">
                <li><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/FACEBOOK (1).svg') }}"/></a></li>
                <li><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/INSTA.svg') }}"/></a></li>
                <li><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/twitter.svg') }}"/></a></li>
                <li><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/youtube.svg') }}"/></a></li>
              </ul>
            </div>
              <div class="QR-code"><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/ftr-QR-code.jpg') }}"/></a></div>
              <div class="rights-reserved">©٢٠٢٢ - All Rights Reserved</div>
            @if ($velocityMetaData && $velocityMetaData->subscription_bar_content)
              {!! $velocityMetaData->subscription_bar_content !!}
            @endif
            <div class="whatsapp"><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/whatsapp-icon.svg') }}"/></a></div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
        <div class="rows">
            <div id="bottom-footers">
                <div class="col-md-6 copyright left">
                    <div class="qatar-logo"><img src="{{ asset('/themes/kiddyzone/assets/images/Qatat-logo.svg') }}"/></div>
                    Copyright © Kiddy Zone
                </div>
                <div class="col-md-6 copyright right"></div>
            </div>
        </div>
    </div>
  </div>
  <a id="scrollup" style="display: block;">Scroll</a> </footer>