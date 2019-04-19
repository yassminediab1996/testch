 

    
    <div class="footercontainer w-clearfix">
      <div class="social-icons"><a target="_blank" id="faacebook" href="https://www.facebook.com/GetChefaa" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/fb.svg')}}" alt=""></a><a target="_blank" id="twitter" href="https://www.twitter.com/getchefaa" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/twitter.svg')}}" alt=""></a><a target="_blank" id="instagram" href="https://www.instagram.com/getchefaa/" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/instagram.svg')}}" alt=""></a><a target="_blank" id="linkedin" href="https://www.linkedin.com/company/getchefaa" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/linkedin.svg')}}" alt=""></a></div>
      <ol class="list w-list-unstyled">
        <li class="list-item"><a href="{{url('contact')}}" class="footer-link">تواصل معنا</a></li>
        <li class="list-item"><a href="#" class="footer-link">خدمات</a></li>
        <li class="list-item"><a href="#" class="footer-link">سياسة الخصوصية</a></li>
        <li><a href="#" class="footer-link">استفسارات</a></li>
      </ol>
    </div>
  </footer>
  <script>
  $( document ).ready(function() {
   <!-- /footer--->
   <!-- Hotjar Tracking Code for www.chefaa.com -->

    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1093439,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');

<!-- Hotjar Tracking Code for www.chefaa.com -->

    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1093439,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  });
</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'vUqJL7ruiX';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
  <script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="{{asset('chefaa_design/js/webflow.js')}}" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    @yield('js')
</body>
</html>