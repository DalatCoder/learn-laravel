@php
    $footer = getConfigValueFromSettingTable('footer_information');
@endphp

<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                @if($footer)
                    {!! $footer !!}
                @else
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                                               href="http://www.themeum.com">Themeum</a></span></p>
                @endif
            </div>
        </div>
    </div>
</footer><!--/Footer-->
