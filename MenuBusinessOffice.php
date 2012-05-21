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
            Hover - when the user hovers over the main button, the following btninfo div
            appears.
            Mouseleave - when the mouse stops hovering over the main button, the btninfo
            div disappears.
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
            
            var buttons = $('div#content').children('.adminbuttonbox');
            
            positionButtons(buttons, contentWidth, contentHeight, 120);

//            $(".adminbuttonbox").hover (function (){
//                var offset = $(this).offset();
//                $(this).next('.btninfo').css({'left' : offset.left + 260});
//                $(this).next('.btninfo').css({'top' : offset.top - 83});
//                $(this).next('.btninfo').css({'height' : '88px'})
//                $(this).next('.btninfo').css({'visibility' : 'visible'});
//            });

//            $(".adminbuttonbox").mouseleave (function (){
//                $(this).next('.btninfo').css({'visibility' : 'hidden'});
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
                    // user presses the "g" or "G"
                    case 103:   // "g"
                    case 71:    // "G"
                        go_general_information ();
                        break;	
                    // user presses the "m" or "M"
                    case 109:   // "m"
                    case 77:    // "M"
                        if (fullKioskFlag == 1) {
                            go_make_a_payment ();
                        }
                        break;	
                    // user presses the "h" or "H"
                    case 104:   // "h"
                    case 72:    // "H"
                        go_higher_one ();
                        break;	
                    // user presses the "p" or "P"
                    case 112:   // "p"
                    case 80:    // "P"
                            go_payment ();
                        break;	
                    // user presses the "c" or "C"
                    case 99:   // "c"
                    case 67:    // "C"
                        go_cashier ();
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
        $general_information_url = urlencode("http://www.richlandcollege.edu/businessoffice/")
                            . '&warn=0';
        $make_a_payment_url = urlencode("https://econnect.dcccd.edu/econnect/st/stmenu.html")
                            . '&warn=1';
        $higher_one_url = urlencode("http://www.richlandcollege.edu/moneycard/")
                            . '&warn=0';
        $payment_url = urlencode("https://www1.dcccd.edu/catalog/tuition/tuition.cfm?loc=RLC")
                            . '&warn=0';
        $cashier_url = "http://www.richlandcollege.edu/businessoffice/cashier.php"
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

            function go_general_information () {
                window.location = "Frame.php?url=<?echo $general_information_url?>";
            }

            function go_make_a_payment () {
                window.location = "Frame.php?url=<?echo $make_a_payment_url?>";
            }

            function go_higher_one () {
                window.location = "Frame.php?url=<?echo $higher_one_url?>";
            }

            function go_payment () {
                window.location = "Frame.php?url=<?echo $payment_url?>";
            }

            function go_cashier () {
                window.location = "Frame.php?url=<?echo $cashier_url?>";
            }

            function go_exit () {
                window.location = "Menu.php";
            }
        </script>
        <div id="content">
            <h1>Welcome to Richland College</h1>
            <h1>Your ONLINE Access Portal</h1>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $general_information_url;
                echo '" class="greenbutton"></br><span class="underline">G</span>eneral Information</a></br>';
                ?>
            </div>
            <div class="btninfo">For general information
            </div>
            <? if (strcmp($kiosk_type, "full") == 0) { ?>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $make_a_payment_url;
                echo '" class="greenbutton"></br><span class="underline">M</span>ake a Payment</a></br>';
                ?>
            </div>
            <div class="btninfo">To login and make a payment
            </div>
            <? } ?>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $higher_one_url;
                echo '" class="greenbutton"><span class="underline">H</span>igher One</br>DCCCD Money Card</a>';
                ?>
            </div>
            <div class="btninfo">For Higher One, to apply for or replace a Money Card
            </div>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $payment_url;
                echo '" class="greenbutton"><span class="underline">P</span>ayments</br>Pay Plans / Refunds</a>';
                ?>
            </div>
            <div class="btninfo">For payments
            </div>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $cashier_url;
                echo '" class="greenbutton"></br><span class="underline">C</span>ashier Services</br></a>';
                ?>
            </div>
            <div class="btninfo">Cashier services
            </div>
            <div class="adminbuttonbox">
                <a href="Menu.php" class="greenbutton"></br>E<span class="underline">x</span>it</a>
            </div>
            <div class="btninfo">To go back to Admissions, Advising, Financial Aid, DCCCD Money Card, Find Credit Classes
            </div>
        </div>

        <!-- Let's insert the footer -->
        <?

        include("footer.php");
        ?>
</body>
</html>
