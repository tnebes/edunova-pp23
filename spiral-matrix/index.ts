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
     * Extremely cursed function that makes the cells blink.
     * @param rows 
     * @param number 
     */
    function animateCells(rows: HTMLCollectionOf<Element>, number: number): void
    {
        var waitTime = 250;
        var minColumn = 0;
        var minRow = 0;
        var maxColumn = rows.length;
        var maxRow = rows[0].getElementsByClassName("matrixContent").length;
        var xPosition = maxColumn;
        var yPosition = maxRow;
        
        while (true)
        {
            break;
        }
    }
}