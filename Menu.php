<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <meta name="Description" content="Richland Community College Admissions Kiosk" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Richland Kiosk Menu</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/positions.js" type="text/javascript"></script>
    <script type="text/javascript">//<![CDATA[
        /*
            As soon as the DOM is ready, this code will be ready to execute.
            Hover - when a user hovers over a button, either the following the 
            button with the class btninfo will appear or the animateMe divs 
            within the following btninfoanimate div will appear one after another.
            Mouseleave - when the mouse leaves a button, the btninfo div will
            disappear or the animation in the btninfoanimate div will stop.
            Keypress - when the user presses a key it is detected and handled by the
            keypress switch statement.
        */
        $(document).ready(function() {
            var contentWidth = getContentWidth();
            var contentHeight = getContentHeight();
            
            $('div#content').css({
               width:contentWidth,
               height:contentHeight
            });
            
            var buttons = $('div#content').children('.greenbuttonbox');
            
            positionButtons(buttons, contentWidth, contentHeight, 90);

            //$('.greenbuttonbox').each(function (i, obj) {
            //    $(obj).css({
            //        'left' : buttonStartLeft,
            //        'top' : (buttonStartTop + (i * BUTTON_HEIGHT))
            //    });
            //});

//            $(".greenbuttonbox").hover (function (){
//                var el = $(this).next();
//                var elClass = el.attr('class');
//                if (elClass == 'btninfo') {
//                    var offset = $(this).offset();
//                    //alert("offset.top = " + offset.top + " offset.left = " + offset.left);
//                    el.css({'left' : offset.left + 260});
//                    el.css({'top' : offset.top - 83});
//                    el.css({'visibility' : 'visible'});
//                } else if (elClass = '.btninfoanimate') {
//                    var offset = $(this).offset();
//                    el.css({'left' : offset.left + 260});
//                    el.css({'top' : offset.top - 83});
//                    el.css({'visibility' : 'visible'});
//
//                    // Some help on the following code:
//                    // http://net.tutsplus.com/tutorials/javascript-ajax/quick-tip-easy-sequential-animations-in-jquery/
//                    var anims = el.children('.animateMe'),
//                        i = 0,
//                        cnt = anims.length;
//                        
//                    (function() {
//                        if (i == cnt) {
//                            i = 0;
//                        }
//                        $(anims[i]).show();
//                        $(anims[i++]).animate({'opacity' : '1.0'}, 3000)
//                                     .fadeOut(500, arguments.callee);
//                    })();
//                }
//            });

//            $(".greenbuttonbox").mouseleave (function (){
//                var el = $(this).next();
//                var elClass = el.attr('class');
//
//                if (elClass == 'btninfo') {
//                    el.css({'visibility' : 'hidden'});
//                } else if (elClass == 'btninfoanimate') {
//                    el.css({'visibility' : 'hidden'});
//                    el.children('.animateMe').css({'display' : 'none',
//                                                   'opacity' : '0.1'});
//                    el.children('.animateMe').stop(true, true);
//                }
//            });
            
            // set up hotkeys
            $(document).keypress(function(e)
            {
                var fullKioskFlag = 0;
                if (getKioskType() == "full") {
                    fullKioskFlag = 1;
                }
                switch(e.which)
                {
                    // user presses the "a" or "A"
                    case 97:    // "a"
                    case 65:    // "A"
                        if (fullKioskFlag == 1) {
                            go_admissions();
                        }
                        break;	
                    // user presses the "v" or "V"
                    case 118:   // "v"
                    case 86:    // "V"
                        if (fullKioskFlag == 1) {
                            go_advising();
                        }
                        break;	
                    // user presses the "f" or "F"
                    case 102:   // "f"
                    case 70:    // "F"
                        if (fullKioskFlag == 1) {
                            go_financial_aid();
                        }
                        break;	
                    // user presses the "b" or "B"
                    case 98:   // "b"
                    case 66:    // "B"
                        go_business_office();
                        break;	
                    // user presses the "m" or "M"
                    case 109:   // "m"
                    case 77:    // "M"
                        if (fullKioskFlag == 1) {
                            go_multicultural_center();
                        }
                        break;	
                    // user presses the "p" or "P"
                    case 112:   // "p"
                    case 80:    // "P"
                        go_map();
                        break;	
                    // user presses the "x" or "X"
                    case 120:   // "x"
                    case 88:    // "X"
                        go_exit();
                        break;	
                }
            });            
        });

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
    
<!--
    For help with this code, please see:
    http://abouthalf.com/2010/10/25/internet-explorer-9-gradients-with-rounded-corners/
    This assists in creating a button with rounded corners and filled by a gradient
    in IE9

    Below, if this is IE9, then clear the background filter and replace with
    the gradient.svg

-->
<!--[if  ie 9]>
<style type="text/css" media="screen">
.greenbutton, .greenbutton:hover, .greenbutton:active
        {
                filter: none;
                background-image: url(images/gradients.svg);
                background-size: 100% 1100%;
                zoom: 1;
        }
</style>
<![endif]-->

</head>
<body>
            <!-- Let's insert the header -->
        <?
                include("header.php");
        ?>

        <!-- Main Content Area -->
        <?
        /* encode those urls */
        /* if econnect set warn = 1 else warn = 0 */
        $financial_aid_url = urlencode("https://econnect.dcccd.edu/econnect/st/stmenu.html")
                            . '&warn=1';
            $map_url = urlencode("Map/Map.php")
                                . '&warn=0';
            
            if(isset($_COOKIE['KioskType'])) {
                $kiosk_type = $_COOKIE['KioskType'];
            } else {
                $kiosk_type = "full";
            }
        ?>
        
        <script type="text/javascript">
            // set full kiosk mode - printing and keyboard
            setKioskType("<?echo $kiosk_type?>");

            function go_admissions () {
                window.location = "MenuAdmissions.php";
            }

            function go_advising () {
                window.location = "MenuAdvising.php";
            }

            function go_financial_aid () {
                window.location = "Frame.php?url=<?echo $financial_aid_url?>";
            }

            function go_business_office () {
                window.location = "MenuBusinessOffice.php";
            }

            function go_multicultural_center () {
                window.location = "MenuMultiCultural.php";
            }

            function go_map () {
                window.location = "Frame.php?url=<?echo $map_url?>";
            }

            function go_exit () {
                window.location = "index.php?KioskType=<?echo $kiosk_type?>";
            }

        </script>
        <div id="content">
            <h1>Welcome to Richland College</h1>
            <h1>Your ONLINE Access Portal</h1>
            <? if (strcmp($kiosk_type, "full") == 0) { ?>
            <div class="greenbuttonbox">
                <a href="MenuAdmissions.php" class="greenbutton"><span class="underline">A</span>dmissions</a></br>
            </div>
            <div class="btninfo">To apply online, print advising report, request credit transcript, or change address or social security number
            </div>
            <div class="greenbuttonbox">
                <a href="MenuAdvising.php" class="greenbutton">Ad<span class="underline">v</span>ising</a></br>
            </div>
            <div class="btninfo">To print advising report or print class schedule
            </div>
            <div class="greenbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $financial_aid_url;
                echo '" class="greenbutton"><span class="underline">F</span>inancial Aid</a></br>';
                ?>
            </div>
            <div class="btninfoanimate">
                <div class="animateMe">
                    <p><center>To get financial aid information, first, login to eConnect:</center></p>
                    <img src="images/Login.png" alt=""/>
                </div>
                <div class ="animateMe">
                    <p><center>Next, go to the financial aid section:</center></p>
                    <img src="images/FinancialAid.png" alt=""/>
                </div>
            </div>
            <? } ?>
            <div class="greenbuttonbox">
                <a href="MenuBusinessOffice.php" class="greenbutton"><span class="underline">B</span>usiness Office</a></br>
            </div>
            <div class="btninfo">To access information about Higher One card, tuition payment, Student ID cards, Tuition/Textbook Loans or Sponsorships
            </div>
            <? if (strcmp($kiosk_type, "full") == 0) { ?>
            <div class="greenbuttonbox">
                <a href="MenuMultiCultural.php" class="greenbutton"><span class="underline">M</span>ulticultural Center</a></br>
            </div>
            <div class="btninfo">To take the F1 online orientation quiz
            </div>
            <? } ?>
            <div class="greenbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $map_url;
                echo '" class="greenbutton">Ma<span class="underline">p</span></a></br>';
                ?>
            </div>
            <div class="btninfo">Where you are
            </div>
            <div class="greenbuttonbox">
                <a href="index.php?KioskType=<?echo $kiosk_type?>" class="greenbutton">E<span class="underline">x</span>it / Restart</a>
            </div>
            <div class="btninfo">To access Admissions, Advising, Financial Aid, DCCCD Money Card or to Find Credit Classes
            </div>
        </div>

        <!-- Let's insert the footer -->
        <?

        include("footer.php");
        ?>
</body>
</html>
