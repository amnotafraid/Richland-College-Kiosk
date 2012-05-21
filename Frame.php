<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <meta name="Description" content="Richland Community College Admissions Kiosk" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Richland Kiosk</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/progress.js" type="text/javascript"></script>
    <script src="js/positions.js" type="text/javascript"></script>
    <script type="text/javascript">//<![CDATA[
        $(document).ready(function() {
            var contentWidth = getContentWidth();
            var contentHeight = getContentHeight();
            
            $('div#content').css({
               width:contentWidth,
               height:contentHeight,
               'background-color' : '#ffffff'
            });
            
            $('div#frame').css({
                width : contentWidth - 2,
                height : contentHeight - 2
            });
            
            // show progress bar in header
            var bar1 = new ProgressBar("progress",          // div id
                                        5,                  // # of cells
                                        "progressTable",    // CSS of table
                                        "cell",             // CSS of cell
                                        "size");            // CSS of size
            setBarValue(bar1);
            
            bar1.Start();
            
            // show buttons to go back and get to main menu
            var headerButtonLeft = contentWidth - 218 - 105;
            $('div#previousButton').show();
            $('div#previousButton').css({
                'left' : headerButtonLeft,
                'top' : '-14px'
            })

            $('div#mainMenuButton').show();
            $('div#mainMenuButton').css({
                'left' : headerButtonLeft + 218,
                'top' : '-14px'
            })
            
            // initialize print dialog info to off
            setFlagValue(0);
            
            if (getKioskType() == "full") {
                $('div.infobuttonbox').show();
            }
            // start warning message
            // this function varies according to what the warn parameter in the URL is
            animate_warning_message (contentWidth);

            // following is for printer info animation
            $(".infobuttonbox").click (function (){
                var el = $('div#printerAnimate');
                var elFrame = $('div#frame');
                var flag = getFlagValue();

                if (flag == 0) {
                    setFlagValue(1);
                    elFrame.css({
                       width:'0px',
                       height:'0px'
                    });
                    
                    el.css({
                       visibility: 'visible',
                       position:'fixed',
                       left: ($(window).width() - $('div#printerAnimate').outerWidth())/2,
                       top: ($(window).height() - $('div#printerAnimate').outerHeight())/2
                    });

                    // Some help on the following code:
                    // http://net.tutsplus.com/tutorials/javascript-ajax/quick-tip-easy-sequential-animations-in-jquery/
                    var anims = el.children('.animateMe'),
                        i = 0,
                        cnt = anims.length;
                        
                    (function() {
                        if (i == cnt) {
                            i = 0;
                        }
                        $(anims[i]).show();
                        $(anims[i++]).animate({'opacity' : '1.0'}, 3000)
                                     .fadeOut(500, arguments.callee);
                    })();
                } else {
                    close_print_info(el, elFrame);
                }
            });

            $('a.btn_close').click(function() {
                var el = $('div#printerAnimate');
                var elFrame = $('div#frame');
                close_print_info(el, elFrame);
            });
        });

        // finish loading
        //  1.) Remove progress bar
        function finish_loading() {
            hide_loading();
        }

        // to remove loading progress bar
        function hide_loading () {
            var bar1 = getBarValue();
            bar1.Stop();
        }

        // this is to close the pane with the print information.
        // the div has to be set to invisible and the animation must be turned off
        function close_print_info(el, elFrame) {
            setFlagValue(0);

            el.css({
                'visibility' : 'hidden'
            });

            el.children('.animateMe').css({
                'display' : 'none',
                'opacity' : '0.1'
            });
            el.children('.animateMe').stop(true, true);

            elFrame.css({
               width:getContentWidth() - 2,
               height:getContentHeight() - 2
            });
        }
        
        // this is to indicate if the printer information is on or off
        //  0 - info off - if the button is clicked, animate the info
        //  1 - info on - if the button is clicked, stop animation
        function setFlagValue (x) {
            window.FlagValue = x;
        }

        function getFlagValue () {
            return window.FlagValue;
        }

        // this is to indicate if the kiosk is informational or full
        //  "info" - informational - no printing, no keyboard
        //  "full" - full kiosk - all menus -- printing and keyboard
        function setKioskType (x) {
            window.KioskType = x;
        }

        function getKioskType () {
            return window.KioskType;
        }

//]]></script>

<!-- Below, if this is IE9, then clear the background filter and replace with
the gradient.svg -->
<!--[if  ie 9]>
<style type="text/css" media="screen">
        .purplebutton, .purplebutton:hover, .purplebutton:active
        {
                filter: none;
                background-image: url(images/gradients.svg);
                background-size: 100% 1100%;
                zoom: 1;
        }
        .infobutton, .infobutton:hover, infobutton:active
        {
                filter: none;
                background-image: url(images/gradients.svg);
                background-size: 100% 1100%;
                zoom: 1;
        }
</style>
<![endif]-->

</head>
<!--    For some pages, the onload in the iframe did not trigger.
        Hence, the loading bar would stay on.  This only seemed
        to happen in IE.  So, I added this should-be-unneeded onload
        call to body, too -->
<body onload="finish_loading();">
            <!-- Let's insert the header -->
        <?
            include("header.php");
        ?>

        <?
            $url=$_REQUEST['url'];
            $warn=$_REQUEST['warn'];
            if(isset($_COOKIE['KioskType'])) {
                $kiosk_type = $_COOKIE['KioskType'];
            } else {
                $kiosk_type = "full";
            }
        ?>
        <script type="text/javascript">
            // set kiosk mode
            setKioskType("<?echo $kiosk_type?>");

            function go_back () {
                history.go(-1);
            }

            function go_main_menu () {
                window.location = "Menu.php";
            }
            
        </script>
            
        <? if ($warn == 1) {?>
        <script type="text/javascript">
            // animate message to remind student to click on this before they leave
            function animate_warning_message (contentWidth) {
                $('div#message').show();
                var leftMessageFar = contentWidth - 105 - 430;
                var leftMessageClose = leftMessageFar - 20;
                $('div#message')
                    .animate({'opacity' : '1.0', left: leftMessageFar}, 2000) // 2000 = 2 seconds
                    .animate({'opacity' : '1.0', left: leftMessageClose}, 100)
                    .animate({'opacity' : '1.0', left: leftMessageFar}, 100)
                    .animate({'opacity' : '1.0', left: leftMessageClose}, 100)
                    .animate({'opacity' : '1.0', left: leftMessageFar}, 100)
                    .animate({'opacity' : '1.0'}, 1500)
                    .animate({'opacity' : '0.0'}, 1500,
                    function () {
                        $('div#message').hide();
                    });
            }
        </script>
        <? } else {?>
        <script type="text/javascript">
            // animate message to remind student to click on this before they leave
            function animate_warning_message (contentWidth) {
            }
        </script>
        <? } //endif?>

            <!-- Main Content Area -->
        <div id="content">
            <div id="frame">
                <iframe style="height:100%;width:100%;"
                    src="<?echo $url?>"
                    onload="finish_loading();">
                </iframe>
            </div>
            <div id="message">
                <img src="images/Arrow.png" style="position:relative;top:-15px;left:209px;"></img>
                <center>
                   <p>Important!<br>BEFORE you leave the kiosk<br>Click on 'Main Menu' button to log off.</p>
                </center>
            </div>
            <div id="printerAnimate">
                <a href="#" class="btn_close"><img src="images\closer.png" class="btn_close" title="Close Window" alt="Close" /></a>
                <div class="animateMe">         <!-- 1 -->
                    <p><center>To print a PDF:</center></p>
                    <p><center>1.) Right click and choose print:</center></p>
                    <img src="images/RightClickPrint.png" alt=""/>
                </div>
                <div class ="animateMe">        <!-- 2 -->
                    <p><center>To print a PDF:</center></p>
                    <p><center>2.) Choose OK on print dialog:</center></p>
                    <img src="images/PrintDialog.png" alt=""/>
                </div>
                <div class ="animateMe">        <!-- 3 -->
                    <p><center>To print a PDF:</center></p>
                    <p><center>3.) Choose green print icon:</center></p>
                    <img src="images/PrintSpool.png" alt=""/>
                </div>
                <div class ="animateMe">        <!-- 4 -->
                    <p><center>To print other documents:</center></p>
                    <p><center>1.) Scroll to bottom and click on print button:</center></p>
                    <img src="images/PrintButton.png" alt=""/>
                </div>
                <div class ="animateMe">        <!-- 5 -->
                    <p><center>To print other documents:</center></p>
                    <p><center>2.) Select OK on print:</center></p>
                    <img src="images/SelectPrinter.png" alt=""/>
                </div>
                <div class ="animateMe">        <!-- 6 -->
                    <p><center>To print other documents:</center></p>
                    <p><center>3.) Choose green print icon:</center></p>
                    <img src="images/PrintSpool.png" alt=""/>
                </div>
            </div>
        </div>

        <!-- Let's insert the footer -->
        <?
            include("footer.php");
        ?>
</body>
</html>
