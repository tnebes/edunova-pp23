function main() {
    console.log("I am in\n");
    if (!checkMatrixExists) {
        return;
    }
    var matrixContainerElement = getMatrixContainerElement();
    var rows = matrixContainerElement.getElementsByClassName("row");
    var desiredNumber = getNumber(rows);
    animateCells(rows, desiredNumber);
    function getNumber(rows) {
        var counter = 0;
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i].getElementsByClassName("matrixContent");
            for (var j = 0; j < row.length; j++) {
                counter++;
            }
        }
        return counter;
    }
    function checkMatrixExists() {
        var matrixContainerElement = getMatrixContainerElement();
        if (matrixContainerElement.getElementsByClassName("row").length == 0) {
            return false;
        }
        return true;
    }
    function getMatrixContainerElement() {
        var mainElement = document.getElementsByClassName("main")[0];
        var outputElement = mainElement.getElementsByClassName("output")[0];
        return outputElement.getElementsByClassName("matrixContainer")[0];
    }
    function animateCells(rows, number) {
        var waitTime = 250;
        var minColumn = 0;
        var minRow = 0;
        var maxColumn = rows.length;
        var maxRow = rows[0].getElementsByClassName("matrixContent").length;
        while (true) {
            console.log("hello!");
            break;
        }
    }
}
