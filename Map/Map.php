<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <meta name="Description" content="Richland Community College Information Kiosk" />
    <link href="css/mapStyle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Richland Kiosk</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">//<![CDATA[
        $(document).ready(function() {
            
        if (getKioskType() == "info") {
                $('div.youAreHere').css({
                                'left' : '355px',
                                'top' : '330px'
            })
        }

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

</head>
    <body>
        <?
            if(isset($_COOKIE['KioskType'])) {
                $kiosk_type = $_COOKIE['KioskType'];
            } else {
                $kiosk_type = "full";
            }
        ?>
        <script type="text/javascript">
            // set full kiosk mode - printing and keyboard
            setKioskType("<?echo $kiosk_type?>");

        </script>
            
        <h1>Campus Map</h1>
        <div class="campusMap">
            <div class="youAreHere">
                <img src="images/you-are-here.png"/>
            </div>
        </div>
        <p>
        <span class="strong">A    Alamito:</span> ACCESS Adjunct Faculty Center; Administration; Distance Learning; Emergency Response Office<br />
        <span class="strong">B    Bonham:</span> Classrooms; College Communications and Marketing; Graphics; Language Lab; Media; School of Engineering, Business and Technology; Web Office<br /> 
        <span class="strong">C    Crockett:</span> Brazos Gallery; Classrooms; Dual Credit; Educational Transitions; Emeritus Office; Richland Collegiate High School (RCHS); Rising Star Program; School of Learning Enrichment and Academic Development; Trio/Soar Programs<br /> 
        <span class="strong">D    Del Rio:</span> Computer Labs<br /> 
        <span class="strong">E    El Paso:</span> Cafeteria; Career Center; Classrooms; Counseling Center; Office of Student Life; Richland Chronicle; Student I.D. Room; Student Lounge; Transfer Advising; Veterans Affairs; Working Wonders<br /> 
        <span class="strong">F    Fannin:</span> Arena Theatre; Humanities, Fine and Performing Arts; Performance Hall <br /> 
        <span class="strong">G    Guadalupe:</span> Dance Studio; Fitness Center; Gymnasiums; Swimming Pool <br /> 
        <span class="strong">H    Hondo:</span> Employee Services; Gardens; Thunderwater Organizational Learning Institute<br /> 
        <span class="strong">K    Kiowa:</span> Classrooms<br /> 
        <span class="strong">L    Lavaca:</span> Lago Vista Gallery; Library; School of World Languages, Cultures and Communications <br /> 
        <span class="strong">M    Medina:</span> Classrooms; Test Center; The Learning Center<br /> 
        <span class="strong">N    Neches:</span> Classrooms; Office of Planning and Research for Institutional Effectiveness<br /> 
        <span class="strong">P    Pecos:</span> College Police; Facilities Services; Information Technology Support Center<br /> 
        <span class="strong">R    LeCroy Center:</span> Telecommunications<br /> 
        <span class="strong">SH    Sabine Hall:</span> Bookstore; Coffee Shop; Conference Rooms; School of Mathematics, Science and Health Professions; Science Labs<br /> 
        <span class="strong">T    Thunderduck:</span> Admissions; Advising; Cashier Windows; Classrooms; Computer Training Institute; Continuing Education; Disability Services; Financial Aid; Health Center; Multi­cultural Center; Multimedia Labs; Phtotography; Registration; Skills Training Center<br /> 
        <span class="strong">U    Uvalde:</span> Classrooms<br /> 
        <span class="strong">WH    Wichita Hall:</span> American English and Culture Institute (AECI); Classrooms; Engineering Labs; ESOL Lab; Health Professions; Print Shop; <br /> 
        <span class="strong">Y    Yegua:</span> Classrooms<br /><br />
        </p>
    </body>
</html>
