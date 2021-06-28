/**
 * author: tnebes
 * date 20 June 2021
 * spiral matrix exercise
 *  
 */

class Position
{
   column: number;
   row: number;

   constructor(column: number, row: number)
   {
      this.column = column;
      this.row = row;
   }
}

function main(): void
   {
   if (!checkMatrixExists)
   {
      return;
   }

   var matrixContainerElement: Element = getMatrixContainerElement();
   var rows: HTMLCollectionOf<Element> = matrixContainerElement.getElementsByClassName("row");
   var desiredNumber: number = getNumber(rows);
   animateCells(rows, desiredNumber);

   /**
    * Calculates the desired number according to the number of cells.
    * @param rows 
    * @returns biggest number in the matrix.
    */
   function getNumber(rows: HTMLCollectionOf<Element>): number
   {
      var counter: number = 0;
      for (let i: number = 0; i < rows.length; i++)
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
      var matrixContainerElement: Element = getMatrixContainerElement();

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
      var mainElement: Element = document.getElementsByClassName("main")[0];
      var outputElement: Element = mainElement.getElementsByClassName("outputBox")[0];
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
   async function animateCells(rows: HTMLCollectionOf<Element>, desiredNumber: number)
   {
      let maxColumn: number = rows.length - 1;
      let maxRow: number = rows[0].getElementsByClassName("matrixContent").length - 1;
      let matrixContents: Array<Array<Element>> = getMatrixContents(rows);
      const defaultStyle: string = getDefaultStyle(matrixContents[0][0]);
      let URLSearch: URLSearchParams = new URLSearchParams(window.location.href);
      let startPositionIndex: number = Number(URLSearch.get("start"));
      let spiralDirection: boolean = URLSearch.get("direction")?.toLowerCase() == "true" ? true : false;
      const startPositions =
      [
         new Position(0, maxRow), // NE
         new Position(maxColumn, maxRow), // SE
         new Position(maxColumn, 0), // SW
         new Position(0, 0) // NW
      ]
      const directions =
      {
         ['north']: [-1, 0],
         ['east']: [0, 1],
         ['south']: [1, 0],
         ['west']: [0, -1]
      };
      const anticlockwiseDirections =
      [
         directions["south"],
         directions["east"],
         directions["north"],
         directions["west"]
      ];
      const clockwiseDirections =
      [
         directions["north"],
         directions["east"],
         directions["south"],
         directions["west"]
      ];
      const startingDirections =
      [
          [3, 0], // NE
          [0, 3], // SE
          [1, 2], // SW
          [2, 1], // NW
      ];
      const chosenDirection: Array<Array<number>> = spiralDirection ? anticlockwiseDirections : clockwiseDirections;
      let currentDirectionIndex: number = startingDirections[startPositionIndex][spiralDirection ? 0 : 1];
      let currentPosition: Position = { ...startPositions[startPositionIndex] };
      let nextPosition: Position = { ...currentPosition };
      let restart: boolean = false;
      let counter: number = 0;
      let visitedCoordinates: boolean[][] = Array(maxColumn + 1).fill([]).map(() => Array(maxRow + 1).fill(false));
      while (true)
      {
         if (restart)
         {
            restart = false;
            currentPosition = { ...startPositions[startPositionIndex] };
            currentDirectionIndex = startingDirections[startPositionIndex][spiralDirection ? 0 : 1];
            nextPosition = { ...currentPosition };
            counter = 0;
            visitedCoordinates = Array(maxColumn + 1).fill([]).map(() => Array(maxRow + 1).fill(false));
         }

         let selectedElement: Element = matrixContents[currentPosition.column][currentPosition.row];
         visitedCoordinates[currentPosition.column][currentPosition.row] = true;
         await blinkContent(selectedElement, desiredNumber, counter++);
         selectedElement.setAttribute("style", defaultStyle);

         if (desiredNumber === counter)
         {
            restart = true;
            continue;
         }

         while (true)
         {
            if (currentDirectionIndex > 3)
            {
               currentDirectionIndex = 0;
            }   

            nextPosition.column += chosenDirection[currentDirectionIndex][0];
            nextPosition.row += chosenDirection[currentDirectionIndex][1];

            // out of bounds check
            if (nextPosition.column > maxColumn || nextPosition.column < 0 ||
               nextPosition.row > maxRow || nextPosition.row < 0) {
               currentDirectionIndex++;
               nextPosition = { ...currentPosition };
               continue;
            }
            // visited check
            if (visitedCoordinates[nextPosition.column][nextPosition.row]) {
               currentDirectionIndex++;
               nextPosition = { ...currentPosition };
               continue;
            }

            // apply new position
            currentPosition = { ...nextPosition };
            break;
         }
      } 
   }

   /**
    * Blinks a selected element.
    * @param content 
    * @returns
    */
   function blinkContent(content: Element, desiredNumber: number, currentNumber: number)
   {
      var waitTime: number;
      if (desiredNumber === currentNumber + 1 || currentNumber === 0)
      {
         waitTime = 1500;
      }
      else
      {
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
   function getDefaultStyle(element: Element): string
   {
      let styles: CSSStyleDeclaration = window.getComputedStyle(element);
      return [styles.getPropertyValue("background-color"), styles.getPropertyValue("border-color")].toString().replace("),", "); ");
   }
}


