<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <meta name="Description" content="Richland Community College Admissions Kiosk" />
    <!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
    <link href="css/form.css" rel="stylesheet" type="text/css"/>
    <link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Personal Information Change Request Form - Admissions - Richland College</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">//<![CDATA[
        /*
            As soon as the DOM is ready, this code will be ready to execute.
            This uses JSON to load a dropdown box with state abbreviations and sets
            the default values to TX.
            Click - when a user clicks on one of the checkboxes (addressChange, nameChange,
            or socialSecurityNumberChange) it shows or hides that section.
        */
        $(document).ready(function() {
            // put today's date in
            setDate();
            
            // load states into dropdowns
            $.getJSON('js/states.txt', function(data) {
                $.each(data.states, function(i, state) {
                    $("<option>").attr("value", state.code).text(state.code).appendTo("#state1");
                    $("<option>").attr("value", state.code).text(state.code).appendTo("#state2");
                    $("<option>").attr("value", state.code).text(state.code).appendTo("#state3");
                });
                // select TX
                $("#state1 option[value='TX']").attr('selected', 'selected');
                $("#state2 option[value='TX']").attr('selected', 'selected');
                $("#state3 option[value='TX']").attr('selected', 'selected');
            });
            
            // show/hide div id='toggleForm' for corresponding showFieldset checkbox
            $('label.showFieldset input:checkbox').click (function() {
                var checked = $(this).is(':checked');
                if (checked)
                    $(this).parents('fieldset').children('div.toggleForm').css({'display' : 'block'});
                else
                    $(this).parents('fieldset').children('div.toggleForm').css({'display' : 'none'});
            })
        });
//]]></script>

</head>
<body>
    <script type="text/javascript">
    // executed when user clicks on print
    function printform() {
        window.print();
        return false;
    }
    
    // executed when user clicks on reset (clears all fields)
    function resetform() {
        if (confirm("Are you sure you want to clear form?")) {
            document.personalInformationForm.reset();
            $('label.showFieldset input:checkbox').parents('fieldset').children('div.toggleForm').css({'display' : 'none'});
            setDate();
        }
        return false;
    }
    
    // gets today's date, formats it, and puts it in the date field
    function setDate() {
        var currentTime = new Date()
        var month = currentTime.getMonth() + 1
        var day = currentTime.getDate()
        var year = currentTime.getFullYear()
        $('#date').val(month + "/" + day + "/" + year);
    }
    </script>
        <!-- Main Content Area -->
        <h2>Richland College</h2>
        <h3>Request for a Change of Address, Name, and/or Social Security Number</h3>
        <h4>Please check the appropriate box, complete the information requested, print and sign.</h4>
        <form action="" method="" name="personalInformationForm">
            <label class="first" for="Name">
                Name<div class="validation"></div>
                <input id="name" type="text" value="" />
            </label>
            <label for="studentID">
                Student ID<div class="validation"></div>
                <input id="studentID" name="studentID" type="text" value=""/>
            </label>
            <label for="date">
                Date<div class="validation"></div>
                <input id="date" name="date" type="text" value=""/>
            </label>
            <div class="clear"></div>

            <fieldset style="width:980px;">
                <legend>
                        Address Change
                </legend>
                <label for="addressChange" class="showFieldset">
                    <input class="showFieldset" id="addressChange" name="addressChange" type="checkbox" />Address Change
                </label>
                <div class="information clear">
                    <span class="italic"><span class="bold">If your change of address involves a move from another county into Dallas County, documentation of your new address will be required before a change of tuition rates can be made. </span>If you are changing your address to a P.O. Box, you <span class="bold underline">must</span> complete the following and <span class ="bold underline">provide</span> documentary evidence of Dallas County Residence. <span class="bold underline">A P.O. Box can be used only as a mailing address, not as a valid address for the purpose of determining tuition rates.</span></span>
                </div>
                <div class="toggleForm">
                    <fieldset class="leftSide">
                        <legend>
                            Old Address
                        </legend>
                        <label class="first" for="street1">
                                Street
                                <input id="street1" name="street1" type="text" value="" style="width:300px;"/>
                        </label>
                        <label for="apartment1">
                                Apartment
                                <input id="apartment1" name="apartment1" type="text" value="" style="width:100px;"/>
                        </label>
                        <label class="first" for="city1">
                                City
                                <input id="city1" name="city1" type="text" value="" style="width:300px;"/>
                        </label>
                        <label for="state1">
                                State
                                <select id="state1" name="state1"></select>
                        </label>
                        <label for="zipcode1">
                                Zipcode<div class="validation"></div>
                                <input id="zipcode1" name="zipcode1" type="text" value="" style="width:100px;"/>
                        </label>
                    </fieldset>
                    <fieldset class="rightSide">
                        <legend>
                            New Address
                        </legend>
                        <label class="first" for="street2">
                                Street
                                <input id="street2" name="street2" type="text" value="" style="width:300px;"/>
                        </label>
                        <label for="apartment2">
                                Apartment
                                <input id="apartment2" name="apartment2" type="text" value="" style="width:100px;"/>
                        </label>
                        <label class="first" for="city2">
                                City
                                <input id="city2" name="city2" type="text" value="" style="width:300px;"/>
                        </label>
                        <label for="state2">
                                State
                                <select id="state2" name="state2"></select>
                        </label>
                        <label for="zipcode2">
                                Zipcode<div class="validation"></div>
                                <input id="zipcode2" name="zipcode2" type="text" value="" style="width:100px;"/>
                        </label>
                    </fieldset>
                    <fieldset class="leftSide">
                        <legend>
                            Other Contact Information
                        </legend>
                        <label class="first" for="phone1">
                                New Phone Number<div class="validation"></div>
                                <input id="phone1" name="phone1" type="text" value="" />
                        </label>
                        <label for="phone2">
                                Work/Other Phone Number<div class="validation"></div>
                                <input id="phone2" name="phone2" type="text" value="" />
                        </label>
                        <label for="email">
                                Email Address<div class="validation"></div>
                                <input id="email" name="email" type="text" value="" />
                        </label>
                    </fieldset>
                    <fieldset class="rightSide">
                        <legend>
                            Address of Residence
                        </legend>
                        <label class="first" for="street3">
                                Street
                                <input id="street3" name="street3" type="text" value="" style="width:300px;"/>
                        </label>
                        <label for="apartment3">
                                Apartment
                                <input id="apartment3" name="apartment3" type="text" value="" style="width:100px;"/>
                        </label>
                        <label for="city3">
                                City
                                <input id="city3" name="city3" type="text" value="" style="width:300px;"/>
                        </label>
                        <label for="state3">
                                State
                                <select id="state3" name="state3"></select>
                        </label>
                        <label for="zipcode3">
                                Zipcode<div class="validation"></div>
                                <input id="zipcode3" name="zipcode3" type="text" value="" style="width:100px;"/>
                        </label>
                    </fieldset>
                </div>
            </fieldset>
            <div class="clear"></div>

            <fieldset style="width:980px;">
                <legend>
                        Name Change
                </legend>
                <label for="nameChange" class="showFieldset">
                    <input class="showFieldset" id="nameChange" name="nameChange" type="checkbox" />Name Change
                </label>
                <div class="information clear">
                    <span class="italic">Legal documentation such as a court order, marriage license, permanent driver's license, or divorce decree indicating your name change <span class="underline bold">must</span> accompany this request.</span>
                </div>
                <div class="toggleForm">
                    <fieldset class="leftSide">
                        <legend>
                            Former Name
                        </legend>
                        <label for="formerName">
                                Last, First Middle
                                <input id="firstName1" name="firstName1" type="text" value="" style="width:400px;" />
                        </label>
                    </fieldset>
                    <fieldset class="rightSide">
                        <legend>
                            Present Name
                        </legend>
                        <label for="presentName">
                            Last, First Middle
                            <input id="firstName2" name="firstName2" type="text" value=""  style="width:400px;" />
                        </label>
                    </fieldset>
                </div>
            </fieldset>
            <div class="clear"></div>

            <fieldset style="width:980px;">
                <legend>
                        Social Security Number Change
                </legend>
                <label for="socialSecurityNumberChange" class="showFieldset">
                    <input class="showFieldset" id="socialSecurityNumberChange" name="socialSecurityNumberChange" type="checkbox" />Social Security Number Change
                </label>
                <div class="information clear">
                    <span class="italic">(Student <span class="bold underline">must</span> provide Social Security Card)</span>
                </div>
                <div class="toggleForm">
                    <label for="employedByDCCCD">
                        <span class="bold italic">Are you now or have you ever been employed by DCCCD/Richland College?</span></br>
                        <div style="width:150px;
                                    position:absolute;
                                    border:none;
                                    color: #333;
                                    font-size:14px;
                                    margin: 10px 10px 2px 0;
                                    text-align:left;
                                    float:none;
                                    display:inline;">
                            <input id="employedByDCCCDYes" name="employedByDCCCD" type="radio" value="yes"/>Yes**</br>
                            <input id="employedByDCCCDNo" name="employedByDCCCD" type="radio" value="no"/>No</br>
                        </div>
                        <div class="information clear" style="margin-top:10px;">
                            <span class="bold italic">**If yes, please go to the Human Resources Office for changing of the social security number.  Proof of social security number is required.</span>
                        </div>
                    </label>
                    <div class="clear"></div>
                    <label for="incorrectSocialSecurityNumber">
                            Incorrect #<div class="validation"></div>
                            <input id="incorrectSocialSecurityNumber" name="incorrectSocialSecurityNumber" type="text" value="" />
                    </label>
                    <label for="correctSocialSecurityNumber">
                            Correct #<div class="validation"></div>
                            <input id="correctSocialSecurityNumber" name="correctSocialSecurityNumber" type="text" value="" />
                    </label>
                </div>
            </fieldset>
            <div class="clear" style="height:20px;"></div>
            <span class="bold">STUDENT'S SIGNATURE ____________________________________________________ DATE _____________</span>
            <input id="printme" type="button" value=" Print this page " onclick="printform();" />
            <input id="resetme" type="button" value=" Clear form " onclick="resetform();"
        </form>
</body>
</html>
