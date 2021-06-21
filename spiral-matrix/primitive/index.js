"use strict";
/**
 * author: tnebes
 * date 20 June 2021
 * spiral matrix exercise
 *
 */
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
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
        for (let i = 0; i < rows.length; i++) {
            let row = rows[i].getElementsByClassName("matrixContent");
            for (let j = 0; j < row.length; j++) {
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
    /**
     * Function returns the contents of the matrix container in a 2d array
     * @param rows
     * @returns 2d array of elements
     */
    function getMatrixContents(rows) {
        var matrixContents = new Array();
        for (let i = 0; i < rows.length; i++) {
            let row = rows[i].getElementsByClassName("matrixContent");
            matrixContents.push([]);
            for (let j = 0; j < row.length; j++) {
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
        return __awaiter(this, void 0, void 0, function* () {
            let counter = 0;
            let minColumn = 0;
            let minRow = 0;
            let maxColumn = rows.length - 1;
            let maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
            let matrixContents = getMatrixContents(rows);
            let restart = false;
            const defaultStyle = getDefaultStyle(matrixContents[0][0]);
            while (true) {
                if (restart) {
                    counter = 0;
                    minColumn = 0;
                    minRow = 0;
                    maxColumn = rows.length - 1;
                    maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
                    restart = false;
                }
                for (let j = maxRow; j >= minRow && !restart; j--) {
                    let selectedElement = matrixContents[maxColumn][j];
                    yield blinkContent(selectedElement, number, counter);
                    selectedElement.setAttribute("style", defaultStyle);
                    counter++;
                    if (counter === number) {
                        restart = true;
                        break;
                    }
                }
                maxColumn--;
                for (let i = maxColumn; i >= minColumn && !restart; i--) {
                    let selectedElement = matrixContents[i][minRow];
                    yield blinkContent(selectedElement, number, counter);
                    selectedElement.setAttribute("style", defaultStyle);
                    counter++;
                    if (counter === number) {
                        restart = true;
                        break;
                    }
                }
                minRow++;
                for (let j = minRow; j <= maxRow && !restart; j++) {
                    let selectedElement = matrixContents[minColumn][j];
                    yield blinkContent(selectedElement, number, counter);
                    selectedElement.setAttribute("style", defaultStyle);
                    counter++;
                    if (counter === number) {
                        restart = true;
                        break;
                    }
                }
                minColumn++;
                for (let i = minColumn; i <= maxColumn && !restart; i++) {
                    let selectedElement = matrixContents[i][maxRow];
                    yield blinkContent(selectedElement, number, counter);
                    selectedElement.setAttribute("style", defaultStyle);
                    counter++;
                    if (counter === number) {
                        restart = true;
                        break;
                    }
                }
                maxRow--;
            }
        });
    }
    /**
     * Blinks a selected element.
     * @param content
     * @returns
     */
    function blinkContent(content, desiredNumber, currentNumber) {
        var waitTime;
        if (desiredNumber === currentNumber + 1 || currentNumber === 0) {
            waitTime = 1500;
        }
        else {
            waitTime = 200 - (175 / (desiredNumber / (currentNumber + 1)));
        }
        return new Promise(resolve => {
            content.setAttribute("style", "background-color: rgb(0, 66, 0); border-color: rgb(0, 255, 0)");
            setTimeout(resolve, waitTime);
        });
    }
    /**
     * Returns the default style of a given element.
     * @param element
     * @returns
     */
    function getDefaultStyle(element) {
        let styles = window.getComputedStyle(element);
        return [styles.getPropertyValue("background-color"), styles.getPropertyValue("border-color")].toString().replace("),", "); ");
    }
}
