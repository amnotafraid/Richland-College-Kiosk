/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getContentWidth () {
    return screen.width - 210;
}

function getContentHeight () {
    return screen.height - 210;
}

function positionButtons (buttons, contentWidth, contentHeight, buttonHeight) {
    var buttonLeft,
        buttonTop,
        totalButtonHeight,
        columnLeftLeft,     // left-hand column's left position
        columnRightLeft,    // right-hand column's left position
        columnMiddle;       // last button, odd number of buttons

    var j = 0,
        num = buttons.length,
        fEvenNum = num % 2 === 0,
        columns = 1,
        BUTTON_HEIGHT = buttonHeight,
        BUTTON_WIDTH = 300;

    totalButtonHeight = 150 + (BUTTON_HEIGHT * num);
    buttonTop = 100;
    // Figure out if you need one columns or two.  Then find the
    // first button left and top position.  This is only designed
    // to figure out two columns.  If you have more buttons than
    // will fit in two columns, this code will break
    if (totalButtonHeight > contentHeight) {
        columns = 2;
        buttonLeft = (contentWidth - (BUTTON_WIDTH * 2 + 100)) / 2;
        columnLeftLeft = buttonLeft;
        columnMiddle = (contentWidth - BUTTON_WIDTH) / 2;
        columnRightLeft = buttonLeft + BUTTON_WIDTH + 100;
    } else {
        columns = 1;
        buttonLeft = (contentWidth - BUTTON_WIDTH) / 2;
    }

    for (j = 0; j < num; j++) {
        $(buttons[j]).css ({
            'left' : buttonLeft,
            'top' : buttonTop
        });

        if (columns == 1) {
            buttonTop += BUTTON_HEIGHT;
        } else {
            if (j % 2 === 0) { // even number
                buttonLeft = columnRightLeft;
            } else {
                buttonTop += BUTTON_HEIGHT;
                if (j == num - 2) { // next is last
                    buttonLeft = columnMiddle;
                } else {
                    buttonLeft = columnLeftLeft;
                }
            }
        }
    }
}