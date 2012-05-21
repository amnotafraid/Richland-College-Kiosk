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
                    // user presses the "p" or "P"
                    case 112:   // "p"
                    case 80:    // "P"
                        go_apply_online();
                        break;	
                    // user presses the "v" or "V"
                    case 118:   // "v"
                    case 86:    // "V"
                        go_advising_report();
                        break;	
                    // user presses the "t" or "T"
                    case 116:   // "t"
                    case 84:    // "T"
                        go_request_transcript();
                        break;	
                    // user presses the "m" or "M"
                    case 109:   // "m"
                    case 77:    // "M"
                        go_money_card();
                        break;	
                    // user presses the "i" or "I"
                    case 105:   // "i"
                    case 73:    // "I"
                        go_change_address();
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
        $apply_online_url = urlencode("https://www1.dcccd.edu/stuapp/")
                            . '&warn=0';
        $advising_report_url = urlencode("https://econnect.dcccd.edu/econnect/st/stmenu.html")
                            . '&warn=1';
        $request_transcript_url = urlencode("https://econnect.dcccd.edu/econnect/st/stmenu.html")
                            . '&warn=1';
        $change_address_url = urlencode("WebForm/PersonalInformationForm.php")
                            . '&warn=0';
        ?>
        <script type="text/javascript">
            function go_apply_online () {
                window.location = "Frame.php?url=<?echo $apply_online_url?>";
            }

            function go_advising_report () {
                window.location = "Frame.php?url=<?echo $advising_report_url?>";
            }

            function go_request_transcript () {
                window.location = "Frame.php?url=<?echo $request_transcript_url?>";
            }

            function go_change_address () {
                window.location = "Frame.php?url=<?echo $change_address_url?>";
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
                echo $apply_online_url;
                echo '" class="greenbutton"></br>A<span class="underline">p</span>ply online</br></a></br>';
                ?>
            </div>
            <div class="btninfo"> To apply online
            </div>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $advising_report_url;
                echo '" class="greenbutton"></br>Print Ad<span class="underline">v</span>ising report</a></br>';
                ?>
            </div>
            <div class="btninfo">To print advising report
            </div>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $request_transcript_url;
                echo '" class="greenbutton">Request DCCCD <span class="underline">T</span>ranscript</a></br>';
                ?>
            </div>
            <div class="btninfo">To request transcript for DCCCD classes
            </div>
            <div class="adminbuttonbox">
                <?
                echo '<a href="Frame.php?url=';
                echo $change_address_url;
                echo '" class="greenbutton">Change Personal <span class="underline">I</span>nformation </a></br>';
                ?>
            </div>
            <div class="btninfo">To change your address or add your social security number
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
