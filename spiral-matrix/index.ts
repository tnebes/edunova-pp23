/**
 * author: tnebes
 * date 20 June 2021
 * spiral matrix exercise
 *  
 */

function main(): void
{
    if (!checkMatrixExists)
    {
        return;
    }

    var matrixContainerElement:Element = getMatrixContainerElement();
    var rows:HTMLCollectionOf<Element> = matrixContainerElement.getElementsByClassName("row");
    var desiredNumber:number = getNumber(rows);
    animateCells(rows, desiredNumber);

    /**
     * Calculates the desired number according to the number of cells.
     * @param rows 
     * @returns biggest number in the matrix.
     */
    function getNumber(rows:HTMLCollectionOf<Element>): number
    {
        var counter:number = 0;
        for (let i:number = 0; i < rows.length; i++)
        {
            let row = rows[i].getElementsByClassName("matrixContent");
            for (let j: number = 0; j < row.length; j++)
            {
                counter++;
            }
        }            
        return counter;
    }

    /**
     * Checks whether the matrix exists.
     * @returns boolean
     */
    function checkMatrixExists(): boolean
    {
        var matrixContainerElement:Element = getMatrixContainerElement();
        
        if (matrixContainerElement.getElementsByClassName("row").length == 0)
        {
            return false;
        }
        return true;
    }

    /**
     * Function that returns the container element of a document
     * @returns the container element
     */
    function getMatrixContainerElement(): Element
    {
        var mainElement:Element = document.getElementsByClassName("main")[0];
        var outputElement:Element = mainElement.getElementsByClassName("output")[0];
        return outputElement.getElementsByClassName("matrixContainer")[0];
    }

    /**
     * Function returns the contents of the matrix container in a 2d array
     * @param rows 
     * @returns 2d array of elements
     */
    function getMatrixContents(rows: HTMLCollectionOf<Element>): Array<Array<Element>>
    {
        var matrixContents: Array<Array<Element>> = new Array();
        for (let i = 0; i < rows.length; i++)
        {
            let row: HTMLCollectionOf<Element> = rows[i].getElementsByClassName("matrixContent");
            matrixContents.push([]);
            for (let j = 0; j < row.length; j++)
            {
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
     async function animateCells(rows: HTMLCollectionOf<Element>, number: number)
     {
        let counter = 0;
        let minColumn = 0;
        let minRow = 0;
        let maxColumn = rows.length - 1;
        let maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
        let matrixContents: Array<Array<Element>> = getMatrixContents(rows);
        let restart = false;
        const defaultStyle: string = getDefaultStyle(matrixContents[0][0]);
 
        while (true)
        {
            if (restart)
            {
                counter = 0;
                minColumn = 0;
                minRow = 0;
                maxColumn = rows.length - 1;
                maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
                restart = false;
            }

            for (let j = maxRow; j >= minRow && !restart; j--)
            {
                let selectedElement:Element = matrixContents[maxColumn][j];
                await blinkContent(selectedElement);
                selectedElement.setAttribute("style", defaultStyle);
                counter++;
                if (counter == number)
                {
                    restart = true;
                    break;
                }
            }

            maxColumn--;
            for (let i = maxColumn; i >= minColumn && !restart; i--)
            {
                let selectedElement:Element = matrixContents[i][minRow];
                await blinkContent(selectedElement);
                selectedElement.setAttribute("style", defaultStyle);
                counter++;
                if (counter == number)
                {
                    restart = true;
                    break;
                }
            }

            minRow++;
            for (let j = minRow; j <= maxRow && !restart; j++)
            {
                let selectedElement:Element = matrixContents[minColumn][j];
                await blinkContent(selectedElement);
                selectedElement.setAttribute("style", defaultStyle);
                counter++;
                if (counter == number)
                {
                    restart = true;
                    break;
                }
            }

            minColumn++;
            for (let i = minColumn; i <= maxColumn && !restart; i++)
            {
                let selectedElement:Element = matrixContents[i][maxRow];
                await blinkContent(selectedElement);
                selectedElement.setAttribute("style", defaultStyle);
                counter++;
                if (counter == number)
                {
                    restart = true;
                    break;
                }
            }

            maxRow--;
        }
    }
 
    /**
     * Blinks a selected element.
     * @param content 
     * @returns
     */
    function blinkContent(content:Element)
    {
        const waitTime = 200;
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
    function getDefaultStyle(element: Element): string
    {
        let styles: CSSStyleDeclaration = window.getComputedStyle(element);
        return [styles.getPropertyValue("background-color"), styles.getPropertyValue("border-color")].toString().replace("),", "); ");
    }
}


