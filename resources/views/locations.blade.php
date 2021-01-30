@extends('layouts.master')

@section('content')
    <style>
        .map #map-canvas {
            position: relative;
            width: 100%;
            height: 700px;
        }

        #map {
            position: relative;
        }
        .map #map #search-box {
            position: relative;
            width: 330px;
            top: -700px;
            background-color: #fff;
            background-color: #1e2ad966;
            padding: 35px;
            z-index: 99999;

        .map #map #search-box select {
            width: 100%;
            padding: 9px 10px 16px;
            -webkit-appearance: none;
            -moz-appearance: groupbox;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            background: url(images/select-icon.png) left no-repeat;
            margin-bottom: 10px;
            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            -ms-border-radius: 0px;
            -o-border-radius: 0px;
        }
        #search-box {
            border: 3px solid #eef1f5;

            top: 0;
            left: 0;
            height: 100%;
            width: 90%;
            margin: auto;
            padding: 15px;
            box-sizing: border-box;
            overflow: hidden;

        }
        .map .title {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #fff;
            z-index: 9999;
            width: 330px;
            padding: 20px 40px;
        }
        :root {
            --scroll-bar-size: 10px;
            --scroll-bar-thumb-background-color: rgba(0, 0, 0, 0.2);
            --scroll-bar-thumb-background-color-active: rgba(0, 0, 0, 0.5);
        }

        div::-webkit-scrollbar {
            width: var(--scroll-bar-size);
            height: var(--scroll-bar-size);
            background: transparent;
            cursor: pointer;
        }

        div::-webkit-scrollbar-thumb {
            background-color: var(--scroll-bar-thumb-background-color);
            border-radius: var(--scroll-bar-size);
            border-color: transparent;
            border-style: solid;
            border-width: calc(var(--scroll-bar-size) / 3);
            background-clip: padding-box;
        }

        div::-webkit-scrollbar-thumb:active {
            background-color: var(--scroll-bar-thumb-background-color-active);
        }

        div::-webkit-scrollbar-thumb:hover,
        div::-webkit-scrollbar-thumb:active {
            border-width: 1px;
            background-color: var(--scroll-bar-thumb-background-color-active);
            cursor: pointer;
        }

        body {
            background-color: #cde;
            font-family: system-ui;
        }

        .scrollbar {
            max-height: calc(100% - 200px);
            width: 100%;
            overflow-y: scroll;
            margin-top: 43px;
            position: relative;
        }

        #results li {
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        #results li h4 {
            padding-right: 29px;
            padding: 21px 0;
            margin: 0;
            font-size: 16px;
            display: block;
            padding-right: 9px;
            color: #909090;
            -webkit-transition: all 0.4s ease-out;
            -moz-transition: all 0.4s ease-out;
            -ms-transition: all 0.4s ease-out;
            -o-transition: all 0.4s ease-out;
            transition: all 0.4s ease-out;
            /*font-family: 'NHaasGroteskBD65';*/
            background-image: url("theme/standard/images/down-arrow.png");
            background-position: left center;
            background-repeat: no-repeat;
            background-size: 10px;
        }

        #results img {
            display: inline-block;
            max-width: 23px;

        }

        #results address {
            display: none;
            width: 100%;
            margin: auto;
            padding-right: 20px;
            padding-bottom: 20px;
        }

        #results address * {
            color: #6d6d6d;
            margin: 0;

        }

        #results li.active h4 {
            font-size: 18px;
            color: #6f1917;

        }

    </style>


    <link href=" public/theme/standard/slick-theme.css" rel="stylesheet" type="text/css"/>




    <section class=" map site-width mt-5 mb-5">
        <h2>منتشرون في جميع أنحاء الجمهورية</h2>
        <br>

        <div class="row">

            <div id="map-canvas"></div>
            <div id="map"   data-align="right">
                <div id="search-box">
                    <div>
                        <form method="post" id="search_map_form">
                            <div>

                                <select name="city" id="city" style="width: 100%;padding: 9px 10px 16px;">
                                    <option value="null">اختر المدينة</option>
                                    <option value="1" lat="15.299129" lng="44.237152" zoom="12">صنعاء</option>
                                    <option value="2" lat="13.575854" lng="44.011870" zoom="12">تعز</option>
                                    <option value="3" lat="14.543625" lng="49.127156" zoom="12">المكلا</option>
                                    <option value="4" lat="12.866499" lng="44.995615" zoom="12">عدن</option>
                                    <option value="5" lat="14.802222" lng="42.951111" zoom="12">الحديدة</option>
                                    <option value="7" lat="14.548195" lng="44.399185" zoom="12">ذمار</option>
                                    <option value="9" lat="13.964805" lng="44.175167" zoom="12">إب</option>
                                    <option value="11" lat="15.949836" lng="48.808982" zoom="12">سيؤن</option>
                                    <option value="17" lat="15.463969" lng="45.327093" zoom="12">مأرب</option>
                                    <option value="18" lat="14.409417" lng="44.839876" zoom="12">البيضاء</option>
                                    <option value="19" lat="15.819240" lng="44.043358" zoom="12">عمران</option>
                                    <option value="20" lat="13.057492" lng="44.882472" zoom="12">لحج</option>
                                    <option value="21" lat="13.130847" lng="45.381002" zoom="12">أبين</option>
                                    <option value="22" lat="13.728232" lng="44.737366" zoom="12">الضالع</option>
                                    <option value="23" lat="15.697337 " lng="43.601300" zoom="12">حجة</option>


                                </select>
                                <select id="type" name="type" style="width: 100%;padding: 9px 10px 16px;"><option value="null"style="width: 100%;padding: 9px 10px 16px;">اختر النوع</option><option value="1">فرع</option><option value="2">صراف الي</option><option value="3">وكيل اتش بي فاست  </option> </select>

                            </div>



                        </form>
                    </div>
                </div>
            </div>

            <div class="site-width">
                <div id="results">
                    <p>عناوين <span> </span>اتش بي فاست <strong>جميع المحافظات</strong></p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>المدينة</th>
                                <th>عناوين الفرع</th>
                                <th>هاتف خاص</th>
                                <th>هاتف عادي</th>
                                <th>لايميل</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($locations as $lin  )--}}
                            {{--</tr><tr class="clearfix" id="infobx"><td>{{$lin->location_name_ar}} </td><td>{{$lin->desc_ar}}</td><td>{{$lin->phone}}</td><td>{{$lin->location_type}}</td><td>{{$lin->email}}</td></tr>--}}
                            {{--@endforeach--}}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8WHGB9JtfpSt9b9BxBojydfVPd80dKxg&region=YE&language=ar&callback=initMap" defer></script>

    <script>


        function initMap() {
            /**
             * @name InfoBox
             * @version 1.1.13 [March 19, 2014]
             * @author Gary Little (inspired by proof-of-concept code from Pamela Fox of Google)
             * @copyright Copyright 2010 Gary Little [gary at luxcentral.com]
             * @fileoverview InfoBox extends the Google Maps JavaScript API V3 <tt>OverlayView</tt> class.
             *  <p>
             *  An InfoBox behaves like a <tt>google.maps.InfoWindow</tt>, but it supports several
             *  additional properties for advanced styling. An InfoBox can also be used as a map label.
             *  <p>
             *  An InfoBox also fires the same events as a <tt>google.maps.InfoWindow</tt>.
             */

            /*!
             *
             * Licensed under the Apache License, Version 2.0 (the "License");
             * you may not use this file except in compliance with the License.
             * You may obtain a copy of the License at
             *
             *       http://www.apache.org/licenses/LICENSE-2.0
             *
             * Unless required by applicable law or agreed to in writing, software
             * distributed under the License is distributed on an "AS IS" BASIS,
             * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
             * See the License for the specific language governing permissions and
             * limitations under the License.
             */

            /*jslint browser:true */
            /*global google */

            /**
             * @name InfoBoxOptions
             * @class This class represents the optional parameter passed to the {@link InfoBox} constructor.
             * @property {string|Node} content The content of the InfoBox (plain text or an HTML DOM node).
             * @property {boolean} [disableAutoPan=false] Disable auto-pan on <tt>open</tt>.
             * @property {number} maxWidth The maximum width (in pixels) of the InfoBox. Set to 0 if no maximum.
             * @property {Size} pixelOffset The offset (in pixels) from the top left corner of the InfoBox
             *  (or the bottom left corner if the <code>alignBottom</code> property is <code>true</code>)
             *  to the map pixel corresponding to <tt>position</tt>.
             * @property {LatLng} position The geographic location at which to display the InfoBox.
             * @property {number} zIndex The CSS z-index style value for the InfoBox.
             *  Note: This value overrides a zIndex setting specified in the <tt>boxStyle</tt> property.
             * @property {string} [boxClass="infoBox"] The name of the CSS class defining the styles for the InfoBox container.
             * @property {Object} [boxStyle] An object literal whose properties define specific CSS
             *  style values to be applied to the InfoBox. Style values defined here override those that may
             *  be defined in the <code>boxClass</code> style sheet. If this property is changed after the
             *  InfoBox has been created, all previously set styles (except those defined in the style sheet)
             *  are removed from the InfoBox before the new style values are applied.
             * @property {string} closeBoxMargin The CSS margin style value for the close box.
             *  The default is "2px" (a 2-pixel margin on all sides).
             * @property {string} closeBoxAlign The CSS margin style value for the close box.
             *  The default is "2px" (a 2-pixel margin on all sides).
             * @property {string} closeBoxURL The URL of the image representing the close box.
             *  Note: The default is the URL for Google's standard close box.
             *  Set this property to "" if no close box is required.
             * @property {Size} infoBoxClearance Minimum offset (in pixels) from the InfoBox to the
             *  map edge after an auto-pan.
             * @property {boolean} [isHidden=false] Hide the InfoBox on <tt>open</tt>.
             *  [Deprecated in favor of the <tt>visible</tt> property.]
             * @property {boolean} [visible=true] Show the InfoBox on <tt>open</tt>.
             * @property {boolean} alignBottom Align the bottom left corner of the InfoBox to the <code>position</code>
             *  location (default is <tt>false</tt> which means that the top left corner of the InfoBox is aligned).
             * @property {string} pane The pane where the InfoBox is to appear (default is "floatPane").
             *  Set the pane to "mapPane" if the InfoBox is being used as a map label.
             *  Valid pane names are the property names for the <tt>google.maps.MapPanes</tt> object.
             * @property {boolean} enableEventPropagation Propagate mousedown, mousemove, mouseover, mouseout,
             *  mouseup, click, dblclick, touchstart, touchend, touchmove, and contextmenu events in the InfoBox
             *  (default is <tt>false</tt> to mimic the behavior of a <tt>google.maps.InfoWindow</tt>). Set
             *  this property to <tt>true</tt> if the InfoBox is being used as a map label.
             */

            /**
             * Creates an InfoBox with the options specified in {@link InfoBoxOptions}.
             *  Call <tt>InfoBox.open</tt> to add the box to the map.
             * @constructor
            * @param {InfoBoxOptions} [opt_opts]
             */
            function InfoBox(opt_opts) {

                opt_opts = opt_opts || {};

                google.maps.OverlayView.apply(this, arguments);

                // Standard options (in common with google.maps.InfoWindow):
                //
                this.content_ = opt_opts.content || "";
                this.disableAutoPan_ = opt_opts.disableAutoPan || false;
                this.maxWidth_ = opt_opts.maxWidth || 0;
                this.pixelOffset_ = opt_opts.pixelOffset || new google.maps.Size(0, 0);
                this.position_ = opt_opts.position || new google.maps.LatLng(0, 0);
                this.zIndex_ = opt_opts.zIndex || null;

                // Additional options (unique to InfoBox):
                //
                this.boxClass_ = opt_opts.boxClass || "infoBox";
                this.boxStyle_ = opt_opts.boxStyle || {};
                this.closeBoxMargin_ = opt_opts.closeBoxMargin || "2px";
                this.closeBoxAlign_ = opt_opts.closeBoxAlign || "right";
                this.closeBoxURL_ = opt_opts.closeBoxURL || "http://www.google.com/intl/en_us/mapfiles/close.gif";
                if (opt_opts.closeBoxURL === "") {
                    this.closeBoxURL_ = "";
                }
                this.infoBoxClearance_ = opt_opts.infoBoxClearance || new google.maps.Size(1, 1);

                if (typeof opt_opts.visible === "undefined") {
                    if (typeof opt_opts.isHidden === "undefined") {
                        opt_opts.visible = true;
                    } else {
                        opt_opts.visible = !opt_opts.isHidden;
                    }
                }
                this.isHidden_ = !opt_opts.visible;

                this.alignBottom_ = opt_opts.alignBottom || false;
                this.pane_ = opt_opts.pane || "floatPane";
                this.enableEventPropagation_ = opt_opts.enableEventPropagation || false;

                this.div_ = null;
                this.closeListener_ = null;
                this.moveListener_ = null;
                this.contextListener_ = null;
                this.eventListeners_ = null;
                this.fixedWidthSet_ = null;
            }

            /* InfoBox extends OverlayView in the Google Maps API v3.
             */
            InfoBox.prototype = new google.maps.OverlayView();

            /**
             * Creates the DIV representing the InfoBox.
             * @private
            */
            InfoBox.prototype.createInfoBoxDiv_ = function () {

                var i;
                var events;
                var bw;
                var me = this;

                // This handler prevents an event in the InfoBox from being passed on to the map.
                //
                var cancelHandler = function (e) {
                    e.cancelBubble = true;
                    if (e.stopPropagation) {
                        e.stopPropagation();
                    }
                };

                // This handler ignores the current event in the InfoBox and conditionally prevents
                // the event from being passed on to the map. It is used for the contextmenu event.
                //
                var ignoreHandler = function (e) {

                    e.returnValue = false;

                    if (e.preventDefault) {

                        e.preventDefault();
                    }

                    if (!me.enableEventPropagation_) {

                        cancelHandler(e);
                    }
                };

                if (!this.div_) {

                    this.div_ = document.createElement("div");

                    this.setBoxStyle_();

                    if (typeof this.content_.nodeType === "undefined") {
                        this.div_.innerHTML = this.getCloseBoxImg_() + this.content_;
                    } else {
                        this.div_.innerHTML = this.getCloseBoxImg_();
                        this.div_.appendChild(this.content_);
                    }

                    // Add the InfoBox DIV to the DOM
                    this.getPanes()[this.pane_].appendChild(this.div_);

                    this.addClickHandler_();

                    if (this.div_.style.width) {

                        this.fixedWidthSet_ = true;

                    } else {

                        if (this.maxWidth_ !== 0 && this.div_.offsetWidth > this.maxWidth_) {

                            this.div_.style.width = this.maxWidth_;
                            this.div_.style.overflow = "auto";
                            this.fixedWidthSet_ = true;

                        } else { // The following code is needed to overcome problems with MSIE

                            bw = this.getBoxWidths_();

                            this.div_.style.width = (this.div_.offsetWidth - bw.left - bw.right) + "px";
                            this.fixedWidthSet_ = false;
                        }
                    }

                    this.panBox_(this.disableAutoPan_);

                    if (!this.enableEventPropagation_) {

                        this.eventListeners_ = [];

                        // Cancel event propagation.
                        //
                        // Note: mousemove not included (to resolve Issue 152)
                        events = ["mousedown", "mouseover", "mouseout", "mouseup",
                            "click", "dblclick", "touchstart", "touchend", "touchmove"];

                        for (i = 0; i < events.length; i++) {

                            this.eventListeners_.push(google.maps.event.addDomListener(this.div_, events[i], cancelHandler));
                        }

                        // Workaround for Google bug that causes the cursor to change to a pointer
                        // when the mouse moves over a marker underneath InfoBox.
                        this.eventListeners_.push(google.maps.event.addDomListener(this.div_, "mouseover", function (e) {
                            this.style.cursor = "default";
                        }));
                    }

                    this.contextListener_ = google.maps.event.addDomListener(this.div_, "contextmenu", ignoreHandler);

                    /**
                     * This event is fired when the DIV containing the InfoBox's content is attached to the DOM.
                     * @name InfoBox#domready
                     * @event
                    */
                    google.maps.event.trigger(this, "domready");
                }
            };

            /**
             * Returns the HTML <IMG> tag for the close box.
             * @private
            */
            InfoBox.prototype.getCloseBoxImg_ = function () {

                var img = "";

                if (this.closeBoxURL_ !== "") {

                    img = "<img";
                    img += " src='" + this.closeBoxURL_ + "'";
                    img += " align='" + this.closeBoxAlign_ + "'"; // Do this because Opera chokes on style='float: right;'
                    img += " style='";
                    img += " position: relative;"; // Required by MSIE
                    img += " cursor: pointer;";
                    img += " margin: " + this.closeBoxMargin_ + ";";
                    img += "'>";
                }

                return img;
            };

            /**
             * Adds the click handler to the InfoBox close box.
             * @private
            */
            InfoBox.prototype.addClickHandler_ = function () {

                var closeBox;

                if (this.closeBoxURL_ !== "") {

                    closeBox = this.div_.firstChild;
                    this.closeListener_ = google.maps.event.addDomListener(closeBox, "click", this.getCloseClickHandler_());

                } else {

                    this.closeListener_ = null;
                }
            };

            /**
             * Returns the function to call when the user clicks the close box of an InfoBox.
             * @private
            */
            InfoBox.prototype.getCloseClickHandler_ = function () {

                var me = this;

                return function (e) {

                    // 1.0.3 fix: Always prevent propagation of a close box click to the map:
                    e.cancelBubble = true;

                    if (e.stopPropagation) {

                        e.stopPropagation();
                    }

                    /**
                     * This event is fired when the InfoBox's close box is clicked.
                     * @name InfoBox#closeclick
                     * @event
                    */
                    google.maps.event.trigger(me, "closeclick");

                    me.close();
                };
            };

            /**
             * Pans the map so that the InfoBox appears entirely within the map's visible area.
             * @private
            */
            InfoBox.prototype.panBox_ = function (disablePan) {

                var map;
                var bounds;
                var xOffset = 0, yOffset = 0;

                if (!disablePan) {

                    map = this.getMap();

                    if (map instanceof google.maps.Map) { // Only pan if attached to map, not panorama

                        if (!map.getBounds().contains(this.position_)) {
                            // Marker not in visible area of map, so set center
                            // of map to the marker position first.
                            map.setCenter(this.position_);
                        }

                        bounds = map.getBounds();

                        var mapDiv = map.getDiv();
                        var mapWidth = mapDiv.offsetWidth;
                        var mapHeight = mapDiv.offsetHeight;
                        var iwOffsetX = this.pixelOffset_.width;
                        var iwOffsetY = this.pixelOffset_.height;
                        var iwWidth = this.div_.offsetWidth;
                        var iwHeight = this.div_.offsetHeight;
                        var padX = this.infoBoxClearance_.width;
                        var padY = this.infoBoxClearance_.height;
                        var pixPosition = this.getProjection().fromLatLngToContainerPixel(this.position_);

                        if (pixPosition.x < (-iwOffsetX + padX)) {
                            xOffset = pixPosition.x + iwOffsetX - padX;
                        } else if ((pixPosition.x + iwWidth + iwOffsetX + padX) > mapWidth) {
                            xOffset = pixPosition.x + iwWidth + iwOffsetX + padX - mapWidth;
                        }
                        if (this.alignBottom_) {
                            if (pixPosition.y < (-iwOffsetY + padY + iwHeight)) {
                                yOffset = pixPosition.y + iwOffsetY - padY - iwHeight;
                            } else if ((pixPosition.y + iwOffsetY + padY) > mapHeight) {
                                yOffset = pixPosition.y + iwOffsetY + padY - mapHeight;
                            }
                        } else {
                            if (pixPosition.y < (-iwOffsetY + padY)) {
                                yOffset = pixPosition.y + iwOffsetY - padY;
                            } else if ((pixPosition.y + iwHeight + iwOffsetY + padY) > mapHeight) {
                                yOffset = pixPosition.y + iwHeight + iwOffsetY + padY - mapHeight;
                            }
                        }

                        if (!(xOffset === 0 && yOffset === 0)) {

                            // Move the map to the shifted center.
                            //
                            var c = map.getCenter();
                            map.panBy(xOffset, yOffset);
                        }
                    }
                }
            };

            /**
             * Sets the style of the InfoBox by setting the style sheet and applying
             * other specific styles requested.
             * @private
            */
            InfoBox.prototype.setBoxStyle_ = function () {

                var i, boxStyle;

                if (this.div_) {

                    // Apply style values from the style sheet defined in the boxClass parameter:
                    this.div_.className = this.boxClass_;

                    // Clear existing inline style values:
                    this.div_.style.cssText = "";

                    // Apply style values defined in the boxStyle parameter:
                    boxStyle = this.boxStyle_;
                    for (i in boxStyle) {

                        if (boxStyle.hasOwnProperty(i)) {

                            this.div_.style[i] = boxStyle[i];
                        }
                    }

                    // Fix for iOS disappearing InfoBox problem.
                    // See http://stackoverflow.com/questions/9229535/google-maps-markers-disappear-at-certain-zoom-level-only-on-iphone-ipad
                    this.div_.style.WebkitTransform = "translateZ(0)";

                    // Fix up opacity style for benefit of MSIE:
                    //
                    if (typeof this.div_.style.opacity !== "undefined" && this.div_.style.opacity !== "") {
                        // See http://www.quirksmode.org/css/opacity.html
                        this.div_.style.MsFilter = "\"progid:DXImageTransform.Microsoft.Alpha(Opacity=" + (this.div_.style.opacity * 100) + ")\"";
                        this.div_.style.filter = "alpha(opacity=" + (this.div_.style.opacity * 100) + ")";
                    }

                    // Apply required styles:
                    //
                    this.div_.style.position = "absolute";
                    this.div_.style.visibility = 'hidden';
                    if (this.zIndex_ !== null) {

                        this.div_.style.zIndex = this.zIndex_;
                    }
                }
            };

            /**
             * Get the widths of the borders of the InfoBox.
             * @private
            * @return {Object} widths object (top, bottom left, right)
             */
            InfoBox.prototype.getBoxWidths_ = function () {

                var computedStyle;
                var bw = {top: 0, bottom: 0, left: 0, right: 0};
                var box = this.div_;

                if (document.defaultView && document.defaultView.getComputedStyle) {

                    computedStyle = box.ownerDocument.defaultView.getComputedStyle(box, "");

                    if (computedStyle) {

                        // The computed styles are always in pixel units (good!)
                        bw.top = parseInt(computedStyle.borderTopWidth, 10) || 0;
                        bw.bottom = parseInt(computedStyle.borderBottomWidth, 10) || 0;
                        bw.left = parseInt(computedStyle.borderLeftWidth, 10) || 0;
                        bw.right = parseInt(computedStyle.borderRightWidth, 10) || 0;
                    }

                } else if (document.documentElement.currentStyle) { // MSIE

                    if (box.currentStyle) {

                        // The current styles may not be in pixel units, but assume they are (bad!)
                        bw.top = parseInt(box.currentStyle.borderTopWidth, 10) || 0;
                        bw.bottom = parseInt(box.currentStyle.borderBottomWidth, 10) || 0;
                        bw.left = parseInt(box.currentStyle.borderLeftWidth, 10) || 0;
                        bw.right = parseInt(box.currentStyle.borderRightWidth, 10) || 0;
                    }
                }

                return bw;
            };

            /**
             * Invoked when <tt>close</tt> is called. Do not call it directly.
             */
            InfoBox.prototype.onRemove = function () {

                if (this.div_) {

                    this.div_.parentNode.removeChild(this.div_);
                    this.div_ = null;
                }
            };

            /**
             * Draws the InfoBox based on the current map projection and zoom level.
             */
            InfoBox.prototype.draw = function () {

                this.createInfoBoxDiv_();

                var pixPosition = this.getProjection().fromLatLngToDivPixel(this.position_);

                this.div_.style.left = (pixPosition.x + this.pixelOffset_.width) + "px";

                if (this.alignBottom_) {
                    this.div_.style.bottom = -(pixPosition.y + this.pixelOffset_.height) + "px";
                } else {
                    this.div_.style.top = (pixPosition.y + this.pixelOffset_.height) + "px";
                }

                if (this.isHidden_) {

                    this.div_.style.visibility = "hidden";

                } else {

                    this.div_.style.visibility = "visible";
                }
            };

            /**
             * Sets the options for the InfoBox. Note that changes to the <tt>maxWidth</tt>,
             *  <tt>closeBoxMargin</tt>, <tt>closeBoxURL</tt>, and <tt>enableEventPropagation</tt>
             *  properties have no affect until the current InfoBox is <tt>close</tt>d and a new one
             *  is <tt>open</tt>ed.
             * @param {InfoBoxOptions} opt_opts
             */
            InfoBox.prototype.setOptions = function (opt_opts) {
                if (typeof opt_opts.boxClass !== "undefined") { // Must be first

                    this.boxClass_ = opt_opts.boxClass;
                    this.setBoxStyle_();
                }
                if (typeof opt_opts.boxStyle !== "undefined") { // Must be second

                    this.boxStyle_ = opt_opts.boxStyle;
                    this.setBoxStyle_();
                }
                if (typeof opt_opts.content !== "undefined") {

                    this.setContent(opt_opts.content);
                }
                if (typeof opt_opts.disableAutoPan !== "undefined") {

                    this.disableAutoPan_ = opt_opts.disableAutoPan;
                }
                if (typeof opt_opts.maxWidth !== "undefined") {

                    this.maxWidth_ = opt_opts.maxWidth;
                }
                if (typeof opt_opts.pixelOffset !== "undefined") {

                    this.pixelOffset_ = opt_opts.pixelOffset;
                }
                if (typeof opt_opts.alignBottom !== "undefined") {

                    this.alignBottom_ = opt_opts.alignBottom;
                }
                if (typeof opt_opts.position !== "undefined") {

                    this.setPosition(opt_opts.position);
                }
                if (typeof opt_opts.zIndex !== "undefined") {

                    this.setZIndex(opt_opts.zIndex);
                }
                if (typeof opt_opts.closeBoxMargin !== "undefined") {

                    this.closeBoxMargin_ = opt_opts.closeBoxMargin;
                }
                if (typeof opt_opts.closeBoxURL !== "undefined") {

                    this.closeBoxURL_ = opt_opts.closeBoxURL;
                }
                if (typeof opt_opts.infoBoxClearance !== "undefined") {

                    this.infoBoxClearance_ = opt_opts.infoBoxClearance;
                }
                if (typeof opt_opts.isHidden !== "undefined") {

                    this.isHidden_ = opt_opts.isHidden;
                }
                if (typeof opt_opts.visible !== "undefined") {

                    this.isHidden_ = !opt_opts.visible;
                }
                if (typeof opt_opts.enableEventPropagation !== "undefined") {

                    this.enableEventPropagation_ = opt_opts.enableEventPropagation;
                }

                if (this.div_) {

                    this.draw();
                }
            };

            /**
             * Sets the content of the InfoBox.
             *  The content can be plain text or an HTML DOM node.
             * @param {string|Node} content
             */
            InfoBox.prototype.setContent = function (content) {
                this.content_ = content;

                if (this.div_) {

                    if (this.closeListener_) {

                        google.maps.event.removeListener(this.closeListener_);
                        this.closeListener_ = null;
                    }

                    // Odd code required to make things work with MSIE.
                    //
                    if (!this.fixedWidthSet_) {

                        this.div_.style.width = "";
                    }

                    if (typeof content.nodeType === "undefined") {
                        this.div_.innerHTML = this.getCloseBoxImg_() + content;
                    } else {
                        this.div_.innerHTML = this.getCloseBoxImg_();
                        this.div_.appendChild(content);
                    }

                    // Perverse code required to make things work with MSIE.
                    // (Ensures the close box does, in fact, float to the right.)
                    //
                    if (!this.fixedWidthSet_) {
                        this.div_.style.width = this.div_.offsetWidth + "px";
                        if (typeof content.nodeType === "undefined") {
                            this.div_.innerHTML = this.getCloseBoxImg_() + content;
                        } else {
                            this.div_.innerHTML = this.getCloseBoxImg_();
                            this.div_.appendChild(content);
                        }
                    }

                    this.addClickHandler_();
                }

                /**
                 * This event is fired when the content of the InfoBox changes.
                 * @name InfoBox#content_changed
                 * @event
                */
                google.maps.event.trigger(this, "content_changed");
            };

            /**
             * Sets the geographic location of the InfoBox.
             * @param {LatLng} latlng
             */
            InfoBox.prototype.setPosition = function (latlng) {

                this.position_ = latlng;

                if (this.div_) {

                    this.draw();
                }

                /**
                 * This event is fired when the position of the InfoBox changes.
                 * @name InfoBox#position_changed
                 * @event
                */
                google.maps.event.trigger(this, "position_changed");
            };

            /**
             * Sets the zIndex style for the InfoBox.
             * @param {number} index
             */
            InfoBox.prototype.setZIndex = function (index) {

                this.zIndex_ = index;

                if (this.div_) {

                    this.div_.style.zIndex = index;
                }

                /**
                 * This event is fired when the zIndex of the InfoBox changes.
                 * @name InfoBox#zindex_changed
                 * @event
                */
                google.maps.event.trigger(this, "zindex_changed");
            };

            /**
             * Sets the visibility of the InfoBox.
             * @param {boolean} isVisible
             */
            InfoBox.prototype.setVisible = function (isVisible) {

                this.isHidden_ = !isVisible;
                if (this.div_) {
                    this.div_.style.visibility = (this.isHidden_ ? "hidden" : "visible");
                }
            };

            /**
             * Returns the content of the InfoBox.
             * @returns {string}
             */
            InfoBox.prototype.getContent = function () {

                return this.content_;
            };

            /**
             * Returns the geographic location of the InfoBox.
             * @returns {LatLng}
             */
            InfoBox.prototype.getPosition = function () {

                return this.position_;
            };

            /**
             * Returns the zIndex for the InfoBox.
             * @returns {number}
             */
            InfoBox.prototype.getZIndex = function () {

                return this.zIndex_;
            };

            /**
             * Returns a flag indicating whether the InfoBox is visible.
             * @returns {boolean}
             */
            InfoBox.prototype.getVisible = function () {

                var isVisible;

                if ((typeof this.getMap() === "undefined") || (this.getMap() === null)) {
                    isVisible = false;
                } else {
                    isVisible = !this.isHidden_;
                }
                return isVisible;
            };

            /**
             * Shows the InfoBox. [Deprecated; use <tt>setVisible</tt> instead.]
             */
            InfoBox.prototype.show = function () {

                this.isHidden_ = false;
                if (this.div_) {
                    this.div_.style.visibility = "visible";
                }
            };

            /**
             * Hides the InfoBox. [Deprecated; use <tt>setVisible</tt> instead.]
             */
            InfoBox.prototype.hide = function () {

                this.isHidden_ = true;
                if (this.div_) {
                    this.div_.style.visibility = "hidden";
                }
            };

            /**
             * Adds the InfoBox to the specified map or Street View panorama. If <tt>anchor</tt>
             *  (usually a <tt>google.maps.Marker</tt>) is specified, the position
             *  of the InfoBox is set to the position of the <tt>anchor</tt>. If the
             *  anchor is dragged to a new location, the InfoBox moves as well.
             * @param {Map|StreetViewPanorama} map
             * @param {MVCObject} [anchor]
             */
            InfoBox.prototype.open = function (map, anchor) {

                var me = this;

                if (anchor) {

                    this.position_ = anchor.getPosition();
                    this.moveListener_ = google.maps.event.addListener(anchor, "position_changed", function () {
                        me.setPosition(this.getPosition());
                    });
                }

                this.setMap(map);

                if (this.div_) {

                    this.panBox_();
                }
            };

            /**
             * Removes the InfoBox from the map.
             */
            InfoBox.prototype.close = function () {

                var i;

                if (this.closeListener_) {

                    google.maps.event.removeListener(this.closeListener_);
                    this.closeListener_ = null;
                }

                if (this.eventListeners_) {

                    for (i = 0; i < this.eventListeners_.length; i++) {

                        google.maps.event.removeListener(this.eventListeners_[i]);
                    }
                    this.eventListeners_ = null;
                }

                if (this.moveListener_) {

                    google.maps.event.removeListener(this.moveListener_);
                    this.moveListener_ = null;
                }

                if (this.contextListener_) {

                    google.maps.event.removeListener(this.contextListener_);
                    this.contextListener_ = null;
                }

                this.setMap(null);
            };

            var map;
            var markersArray = [];
            var locations = [];
            var geo_pos;



            var pos;

            $('#city').change(change_city)
            $('#type').change(change_type)
            $('#search_map_form .btn').click(function () {
                change_type();
            })


            function initialize_map(geo) {
                //geo = $('.content.map').hasClass('geo')
                var styles = [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.country",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#6991fd"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ];
                // Create a new StyledMapType object, passing it the array of styles,
                // as well as the name to be displayed on the map type control.
                var styledMap = new google.maps.StyledMapType(styles,
                        {name: "Styled Map"});
                if (geo) {

                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition, showError);
                        } else {
                            console.log("Geolocation is not supported by this browser.");
                        }
                    }
                    getLocation();

                    function showPosition(position) {
                        geo_pos = position;
                        function init_geo_map(position) {
                            pos = new google.maps.LatLng(position.coords.latitude,
                                    position.coords.longitude);
                            //console.log(pos);
                            geo_pos = position;
                            var mapOptions = {
                                zoom: 14,
                                center: pos,
                                streetViewControl: true,
                                scrollwheel: false,
//                        panControl: true,
                                zoomControl: true,
                                zoomControlOptions: {
                                    style: google.maps.ZoomControlStyle.LARGE
                                },
//                        disableDoubleClickZoom: true,
                                mapTypeControlOptions: {
                                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                                }
                            };
                            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                            //Associate the styled map with the MapTypeId and set it to display.
                            map.mapTypes.set('map_style', styledMap);
                            map.setMapTypeId('map_style');

                            marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                //icon: '/uploads/locations_types/'+locations[i][9],
                                draggable: false,
                                animation: google.maps.Animation.DROP,
                            });

                            get_results(map, '/null',position)
                        }
                        init_geo_map(position)
                    }

                    function showError(error) {
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                x.innerHTML = "User denied the request for Geolocation."
                                break;
                            case error.POSITION_UNAVAILABLE:
                                x.innerHTML = "Location information is unavailable."
                                break;
                            case error.TIMEOUT:
                                x.innerHTML = "The request to get user location timed out."
                                break;
                            case error.UNKNOWN_ERROR:
                                x.innerHTML = "An unknown error occurred."
                                break;
                        }
                    }

                } else {
                    //alert('no geoLocation')
                    var mapOptions = {
                        zoom: 8,
                        center: new google.maps.LatLng(15.281396,
                                44.192741),
                        streetViewControl: true,
                        scrollwheel: false,
//                        panControl: true,
                        zoomControl: true,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.LARGE
                        },
//                        disableDoubleClickZoom: true,
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                        }
                    };
                    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                    //Associate the styled map with the MapTypeId and set it to display.
                    map.mapTypes.set('map_style', styledMap);
                    map.setMapTypeId('map_style');
                }


            }

            function get_results(map, link) {
                if ($('.content.map').hasClass('geo')) {
                    link = 'near' + '/' + geo_pos.coords.latitude + '/' + geo_pos.coords.longitude + '/' + 2 + '/0' + link;
                }
                let msg = JSON.parse('{!! json_encode($locations) !!}');



                   if ( msg) {


                        for (i = 0; i < msg.length; i++) {
                            var obj = [];
                           console.log(msg[i]);
                            obj[0] = '<img src="theme/img/branch-img1.jpg" style="max-width: none;float: left;" />';
                            obj[1] = msg[i]['location_name_ar'];
                            obj[2] = msg[i]['desc_ar'];
                            obj[3] = msg[i]['phone'];
                            obj[4] = msg[i]['email'];
                            obj[5] = msg[i]['location_type'];
                            obj[6] = msg[i]['lat'];
                            obj[7] = msg[i]['lng'];
                            obj[8] = msg[i]['zoom'];
                            obj[9] = msg[i]['icon'];
                            locations.push(obj);
                        }
                        //console.log(locations);
                        $(this).addClass("done");

                        var table_content = "";
                        for (i = 0; i < locations.length; i++) {
                            table_content += '<tr class="clearfix" >';
                            table_content += "<td>";
                            table_content += locations[i][1];
                            table_content += "</td>";
                            table_content += "<td>";
                            table_content += locations[i][2];
                            table_content += "</td>";
                            table_content += "<td>";
                            table_content += locations[i][3];
                            table_content += "</td>";
                            table_content += "<td>";
                            table_content += locations[i][4];
                            table_content += "</td>";
                            table_content += "<td>";
                            table_content += locations[i][5];
                            table_content += "</td>";
                            table_content += "</tr>";
                        }
                        $('#results table tbody').html(table_content);

                        var marker, i, current_marker;
                        for (i = 0; i < locations.length; i++) {
                            //console.log(locations[i]);
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][6], locations[i][7]),
                                //map: map,
                                icon: "js/map/d.png",
                                draggable: false,
                                animation: google.maps.Animation.DROP,
                            });
                            markersArray.push(marker);
                            if ($(window).width() >400) {
                                var window_align = $('#map').attr('data-align');
                                box_marginLeft = "-370px";

                                if (window_align == "left") {
                                    box_marginLeft = "-70px";
                                }

                                infobox = new InfoBox({
                                    content: document.getElementById("infobox"),
                                    disableAutoPan: false,
                                    //                            maxWidth: 150,
                                  //    pixelOffset: new google.maps.Size('0', '0', 'px', 'px'),
                                    zIndex: null,
                                    boxStyle: {
                                        //background: "url('/theme/img/tipbox.png') no-repeat",
                                        opacity: 1,
                                        width: "420px",
                                        height: "185px",
                                        marginLeft: box_marginLeft,
                                        marginTop: "-215px"
                                    },
                                    closeBoxMargin: "8px",
                                    closeBoxURL: "theme/standard/images/map-close-btn.png",
                                    closeBoxAlign: window_align,
                                    infoBoxClearance: new google.maps.Size(1, 1)
                                });
                            }
                            else {
                                infobox = new InfoBox({
                                    content: document.getElementById("infobox"),
                                   pixelOffset: new google.maps.Size(-220, -150),
                                    disableAutoPan: true,
                                    //                            maxWidth: 150,
                                    //pixelOffset: new google.maps.Size('0', '0','px','px'),
                                    zIndex: null,
                                    boxStyle: {
                                        //background: "url('/theme/img/tipbox.png') no-repeat",
                                        opacity: 1,
                                        width: "90%",
                                        height: "90%",
                                        marginLeft: "0px",
                                        marginTop: "20px"
                                    },
                                    closeBoxMargin: "8px",
                                    closeBoxURL:"theme/standard/images/map-close-btn.png",
                                    closeBoxAlign: window_align,
                                    infoBoxClearance: new google.maps.Size(1, 1)
                                });
                            }

                            //google.maps.event.addListener(map, 'center_changed', function() {
                            //    // 3 seconds after the center of the map has changed, pan back to the
                            //    // marker.
                            //    window.setTimeout(function() {
                            //        map.panTo(markersArray[current_marker].getPosition());
                            //    }, 3000);
                            //});

                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    var box_contnet;
                                    box_contnet = '<div class="clearfix" id="infobox" style="border: 2px solid black ;background-color: #fff;width: 500px;;position: relative;">';
                                    box_contnet += locations[i][0];
                                    box_contnet += '<h2>';
                                    box_contnet += locations[i][1];
                                    box_contnet += '</h2>';
                                    box_contnet += '<p>';
                                    box_contnet += locations[i][2];
                                    box_contnet += '</p>';

                                    box_contnet += '<p><span>هاتف : </span><a href="#">';
                                    box_contnet += locations[i][3];
                                    box_contnet += '</a></p>';

                                    box_contnet += '<p><span>الايميل : </span><a href="#">';
                                    box_contnet += locations[i][4];
                                    box_contnet += '</a></p>';

                                    box_contnet += '</div>';
                                    if ($(window).width() >600) {
                                        $("html, body").animate({'scroll-top': $('#map-canvas').offset().top - 100}, 300);
                                    } else {
                                        $("html, body").animate({'scroll-top': $('#map-canvas').offset().top - 100}, 300);
                                    }
                                    infobox.setContent(box_contnet);
                       //      infobox.setContent('<div class="clearfix" id="infobox">'+ locations[i][0] + '</div>');
                                    infobox.open(map, this);
                                 //   console.log(parseInt(locations[i][8]));
                                    map.setZoom(parseInt(14));
                                    latlng = this.getPosition();
                                    //map.setCenter(this.getPosition());
                                    map.panTo(this.getPosition());
                                    current_marker = i;

                                }
                                toggleBounce();
                            })(marker, i));

                            function toggleBounce() {
                                if (marker.getAnimation() != null) {
                                    marker.setAnimation(null);
                                } else {
                                    marker.setAnimation(google.maps.Animation.BOUNCE);
                                }
                            }
                        }
                        $('#results tbody tr').click(function () {
                            i = $(this).index();
                            google.maps.event.trigger(markersArray[i], 'click')
                        });
                        i = 0
                        function addPin() {
                            if (i < markersArray.length) {
                                markersArray[i].setMap(map);
                                i++
                                setTimeout(addPin, 300)
                            }
                        }

                        setTimeout(addPin, 300)

                    }

            }



            function get_nearest_locations() {
                get_results(map, 'near' + '/' + pos.b + '/' + pos.d + '/' + 0)
            }

            function clearOverlays() {
                for (var i = 0; i < markersArray.length; i++) {
                    markersArray[i].setMap(null);
                }
                $('#results table tbody').empty();
                markersArray.length = 0;
                locations.length = 0;
            }

            function change_city() {
                clearOverlays();
                $('#results p strong').text('جميع المحافظات');
                link = "";

                link += $('#city option:selected').val() + '/' + $('#type option:selected').val();

                console.log(link);
                if ($(this).val()) {

                    $('#results p strong').text($('option:selected', this).text())
                    map.setZoom(parseInt($('option:selected', this).attr('zoom')));
                    map.setCenter(new google.maps.LatLng(parseFloat($('option:selected', this).attr('lat')), parseFloat($('option:selected', this).attr('lng'))));
                    get_results(map, link);
                }
            }

            function change_type() {
                clearOverlays();
                $('#results p span').text('');
                link = "";
                link += $('#city option:selected').val() + '/' + $('#type option:selected').val();
                console.log(link);
                $('#results p span').text($('option:selected', this).text())
                get_results(map, link);
                //if($(this).val()) {
                //}
            }

            initialize_map($('.content.map').hasClass('geo'));
        }
    </script>

    {{--<script type="text/javascript" src="js/map/map.js"></script>--}}


    <script src="public/js/map/gmaps.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="public/js/form.js"></script>
    <script src="public/js/script.js"></script>

@endsection
