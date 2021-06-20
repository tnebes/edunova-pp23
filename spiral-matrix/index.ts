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
    function animateCells(rows: HTMLCollectionOf<Element>, number: number): void
    {
        var waitTime = 250;
        var minColumn = 0;
        var minRow = 0;
        var maxColumn = rows.length - 1;
        var maxRow = rows[0].getElementsByClassName("matrixContent").length - 1;
        var matrixContents: Array<Array<Element>> = getMatrixContents(rows);

        console.log(matrixContents);
        
        // while (true)
        // {
        for (let j = maxColumn; j >= minColumn; j--)
        {
            blinkContent(matrixContents[maxRow][j]);
        }
        // }
    }

    function blinkContent(content:Element)
    {
        content.setAttribute("style", "background-color: rgb(0, 255, 0)");
        
    }

}