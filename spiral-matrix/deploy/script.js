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
class Position {
    constructor(column, row) {
        this.column = column;
        this.row = row;
    }
}
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
        var outputElement = mainElement.getElementsByClassName("outputBox")[0];
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
    function animateCells(rows, desiredNumber) {
        var _a;
        return __awaiter(this, void 0, void 0, function* () {
            let maxColumn = rows.length - 1;
            let maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
            let matrixContents = getMatrixContents(rows);
            const defaultStyle = getDefaultStyle(matrixContents[0][0]);
            let URLSearch = new URLSearchParams(window.location.href);
            let startPositionIndex = Number(URLSearch.get("start"));
            let spiralDirection = ((_a = URLSearch.get("direction")) === null || _a === void 0 ? void 0 : _a.toLowerCase()) == "true" ? true : false;
            const startPositions = [
                new Position(0, maxRow),
                new Position(maxColumn, maxRow),
                new Position(maxColumn, 0),
                new Position(0, 0) // NW
            ];
            const directions = {
                ['north']: [-1, 0],
                ['east']: [0, 1],
                ['south']: [1, 0],
                ['west']: [0, -1]
            };
            const anticlockwiseDirections = [
                directions["south"],
                directions["east"],
                directions["north"],
                directions["west"]
            ];
            const clockwiseDirections = [
                directions["north"],
                directions["east"],
                directions["south"],
                directions["west"]
            ];
            const startingDirections = [
                [3, 0],
                [0, 3],
                [1, 2],
                [2, 1], // NW
            ];
            const chosenDirection = spiralDirection ? anticlockwiseDirections : clockwiseDirections;
            let currentDirectionIndex = startingDirections[startPositionIndex][spiralDirection ? 0 : 1];
            let currentPosition = Object.assign({}, startPositions[startPositionIndex]);
            let nextPosition = Object.assign({}, currentPosition);
            let restart = false;
            let counter = 0;
            let visitedCoordinates = Array(maxColumn + 1).fill([]).map(() => Array(maxRow + 1).fill(false));
            while (true) {
                if (restart) {
                    restart = false;
                    currentPosition = Object.assign({}, startPositions[startPositionIndex]);
                    currentDirectionIndex = startingDirections[startPositionIndex][spiralDirection ? 0 : 1];
                    nextPosition = Object.assign({}, currentPosition);
                    counter = 0;
                    visitedCoordinates = Array(maxColumn + 1).fill([]).map(() => Array(maxRow + 1).fill(false));
                }
                let selectedElement = matrixContents[currentPosition.column][currentPosition.row];
                visitedCoordinates[currentPosition.column][currentPosition.row] = true;
                yield blinkContent(selectedElement, desiredNumber, counter++);
                selectedElement.setAttribute("style", defaultStyle);
                if (desiredNumber === counter) {
                    restart = true;
                    continue;
                }
                while (true) {
                    if (currentDirectionIndex > 3) {
                        currentDirectionIndex = 0;
                    }
                    nextPosition.column += chosenDirection[currentDirectionIndex][0];
                    nextPosition.row += chosenDirection[currentDirectionIndex][1];
                    // out of bounds check
                    if (nextPosition.column > maxColumn || nextPosition.column < 0 ||
                        nextPosition.row > maxRow || nextPosition.row < 0) {
                        currentDirectionIndex++;
                        nextPosition = Object.assign({}, currentPosition);
                        continue;
                    }
                    // visited check
                    if (visitedCoordinates[nextPosition.column][nextPosition.row]) {
                        currentDirectionIndex++;
                        nextPosition = Object.assign({}, currentPosition);
                        continue;
                    }
                    // apply new position
                    currentPosition = Object.assign({}, nextPosition);
                    break;
                }
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
            content.setAttribute("style", "background-color: rgb(88, 88, 88); color: rgb(124, 124, 124);");
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
//# sourceMappingURL=script.js.map