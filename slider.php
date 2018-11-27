<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
 <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 0,
              $SlideDuration: 5000,
              $SlideEasing: $Jease$.$Linear,
              $SlideWidth: 300,
              $Align: 0
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1110;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>

 
 <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:200px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:200px;overflow:hidden;">
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider1.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider2.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider3.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider4.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider5.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider6.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider7.jpg" />
            </div>
            <div data-p="30.00">
                <img data-u="image" class="img-fluid" src="slide/slider8.jpg" />
            </div>
        </div>
    </div>
    
    <script type="text/javascript">jssor_1_slider_init();</script>