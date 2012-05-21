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
                switch(e.which)
                {
                    // user presses the "f" or "F"
                    case 102:   // "f"
                    case 70:    // "F"
                        go_f1_online_orientation();
                        break;	
                    // user presses the "x" or "X"
                    case 120:   // "x"
                    case 88:    // "X"
                        go_exit();
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
        $f1_online_orientation_url = urlencode("http://www.richlandcollege.edu/multicultural/quiz.php")
                            . '&warn=0';
        ?>
        <script type="text/javascript">
            function go_f1_online_orientation () {
                window.location = "Frame.php?url=<?echo $f1_online_orientation_url?>";
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
                echo $f1_online_orientation_url;
                echo '" class="greenbutton"></br><span class="underline">F</span>1 Online Orientation</br></a></br>';
                ?>
            </div>
            <div class="btninfo">Take the online orientation test now
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
