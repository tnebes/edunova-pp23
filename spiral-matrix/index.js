/**
 * author: tnebes
 * date 20 June 2021
 * spiral matrix exercise
 *
 */
function main() {
    if (!checkMatrixExists) {
        return;
    }
    var matrixContainerElement = getMatrixContainerElement();
    var rows = matrixContainerElement.getElementsByClassName("row");
    var desiredNumber = getNumber(rows);
    animateCells(rows, desiredNumber);
    /**
     * Calculates the desired number according to the number of cells.
     * @param rows
     * @returns biggest number in the matrix.
     */
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
    /**
     * Checks whether the matrix exists.
     * @returns boolean
     */
    function checkMatrixExists() {
        var matrixContainerElement = getMatrixContainerElement();
        if (matrixContainerElement.getElementsByClassName("row").length == 0) {
            return false;
        }
        return true;
    }
    /**
     * Function that returns the container element of a document
     * @returns the container element
     */
    function getMatrixContainerElement() {
        var mainElement = document.getElementsByClassName("main")[0];
        var outputElement = mainElement.getElementsByClassName("output")[0];
        return outputElement.getElementsByClassName("matrixContainer")[0];
    }
    function getMatrixContents(rows) {
        var matrixContents = new Array();
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i].getElementsByClassName("matrixContent");
            matrixContents.push([]);
            for (var j = 0; j < row.length; j++) {
                matrixContents[i].push(row[j]);
            }
        }
        return matrixContents;
    }
    /**
     * Extremely cursed function that makes the cells blink.
     * @param rows
     * @param number
     */
    function animateCells(rows, number) {
        var waitTime = 250;
        var minColumn = 0;
        var minRow = 0;
        var maxColumn = rows.length - 1;
        var maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
        var matrixContents = getMatrixContents(rows);
        console.log(matrixContents);
        // while (true)
        // {
        for (var j = maxColumn; j >= minColumn; j--) {
            blinkContent(matrixContents[maxRow][j]);
        }
        // }
    }
    function blinkContent(content) {
        content.setAttribute("style", "background-color: rgb(0, 255, 0)");
    }
}
