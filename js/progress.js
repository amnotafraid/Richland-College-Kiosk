var ProgressBar = function(divId, cellCount, tableCss, cellCss, sizeCss)
{
    var index = -1;
    var timerObj = new Timer();
    var progressDivId = divId;

    this.Init = function()
    {
        var str = "Loading:  ";
        str += "<table class='" + tableCss + "' cellpadding='0' cellspacing='1'><tr>";
        for(var cnt=0; cnt<cellCount; cnt++)
        {
            str += "<td class='" + sizeCss + "'><div class='" 
              + cellCss + " " + cellCss + cnt + "'></div></td>";
        }
        str += "</tr></table>";
        $("#" + divId).append(str);

        timerObj.Interval = 100;
        timerObj.Tick = timer_tick;
    }

    this.Start = function()
    {
        this.Init();
        timerObj.Start();
    }

    this.Stop = function()
    {
        timerObj.Stop();
        $('#' + progressDivId).remove();
    }

    function timer_tick()
    {
        //debugger;
        index = index + 1;
        index = index % cellCount;

        $("#" + divId + " ." + cellCss + index).fadeIn(10);
        $("#" + divId + " ." + cellCss + index).fadeOut(500);
    }
}

// Declaring class "Timer"
var Timer = function()
{        
    // Property: Frequency of elapse event of the timer in millisecond
    this.Interval = 1000;

    // Property: Whether the timer is enable or not
    this.Enable = new Boolean(false);

    // Event: Timer tick
    this.Tick;

    // Member variable: Hold interval id of the timer
    var timerId = 0;

    // Member variable: Hold instance of this class
    var thisObject;

    // Function: Start the timer
    this.Start = function()
    {
        this.Enable = new Boolean(true);

        thisObject = this;
        if (thisObject.Enable)
        {
            thisObject.timerId = setInterval(
            function()
            {
                thisObject.Tick(); 
            }, thisObject.Interval);
        }
    };

    // Function: Stops the timer
    this.Stop = function()
    {            
        thisObject.Enable = new Boolean(false);
        clearInterval(thisObject.timerId);
    };

};

function setBarValue (x) {
    window.BarValue = x;
}

function getBarValue () {
    return window.BarValue;
}
