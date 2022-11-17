using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using I326_Singleton;
using SudokuValidator.GameObjects.Components;
using SudokuValidator.GameObjects.Utils;
using SudokuValidator.Logs;

namespace SudokuValidator.GameObjects
{
    public class Sudoku
    {
        private List<Error> _errors;            // List of errors
        private List<Section> _sections;        // List of sections
        private List<Line> _lines;              // List of lines
        private Case[,] _cases;                 // Array of cases with coordinates
        private int _size;                      // Size of the array

        /// <summary>
        /// 
        /// </summary>
        public List<Error> Errors
        {
            get { return _errors; }
        }

        /// <summary>
        /// 
        /// </summary>
        public List<Section> Sections
        {
            get { return _sections; }
        }

        /// <summary>
        /// 
        /// </summary>
        public List<Line> Lines
        {
            get { return _lines; }
        }

        /// <summary>
        /// 
        /// </summary>
        public Case[,] Cases
        {
            get { return _cases; }
        }

        /// <summary>
        /// 
        /// </summary>
        public int Size 
        { 
            get { return _size; } 
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="size"></param>
        public Sudoku(int size = 9)
        {
            _size = size;
            _cases = new Case[size, size];
            _sections = new List<Section>();
            _lines = new List<Line>();
            this.SetAllRandomSudoku();
            //this.SetRandomSudoku();
        }

        /// <summary>
        /// Generation of the sudoku
        /// </summary>
        private void SetAllRandomSudoku()
        {
            for(int y = 0; y < _size; y++)
            {
                for(int x = 0; x < _size; x++)
                {
                    Case @case = new Case(new Coordinate(x, y), RandomSingleton.GetInstance().RandomObject.Next(1, 10));
                    _cases[x, y] = @case;
                }
            }
        }

        /// <summary>
        /// 
        /// </summary>
        private void SetRandomSudoku()
        {
            for (int y = 0; y < _size; y++)
            {
                for (int x = 0; x < _size; x++)
                {

                }
            }
        }
    }
}
