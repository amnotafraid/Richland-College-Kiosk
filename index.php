<?
    if (isset($_GET['KioskType'])) {
        $kiosk_type = $_GET['KioskType'];
        }
    else {
        $kiosk_type = "full";
        }
    setcookie('KioskType', $kiosk_type);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <meta name="Description" content="Richland Community College Admissions Kiosk" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Richland Kiosk</title>
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
            // screen / resolution changes
            var contentWidth = getContentWidth();
            var contentHeight = getContentHeight();
            
            $('div#content').css({
               width:contentWidth,
               height:contentHeight
            });

            var mainButtonBoxLeft = (contentWidth - 300) / 2;
            var mainButtonBoxTop = (contentHeight - 68) / 2;
            $('div.mainbuttonbox').css({
                left:mainButtonBoxLeft,
                top:mainButtonBoxTop
            })

            // hover over button                      
//            $(".mainbuttonbox").hover (function (){
//                var offset = $(this).offset();
//                $(this).next('.btninfo').css({'left' : offset.left - 155});
//                $(this).next('.btninfo').css({'top' : offset.top + 50});
//                $(this).next('.btninfo').css({'visibility' : 'visible'});
//            });

            // mouseleave
//            $(".mainbuttonbox").mouseleave (function (){
//                $(this).next('.btninfo').css({'visibility' : 'hidden'});
//            });
            
            // set up hot keys
            $(document).keypress(function(e)
            {
                switch(e.which)
                {
                    // user presses the "t" or "T"
                    case 116: // "t"
                    case 84:  // "T"
                        go_menu();
                        break;	
                }
            });            

        });
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
        .mainbutton, .mainbutton:hover, .mainbutton:active
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

        <script type="text/javascript">
            function go_menu () {
                window.location = "Menu.php";
            }
        </script>

        <!-- Main Content Area -->
        <div id="content">
            <h1>Welcome to Richland College</h1>
            <h1>Your ONLINE Access Portal</h1>
                <div class="mainbuttonbox">
                    <a href="Menu.php" class="mainbutton"><span class="underline">T</span>ouch Here</a>
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
