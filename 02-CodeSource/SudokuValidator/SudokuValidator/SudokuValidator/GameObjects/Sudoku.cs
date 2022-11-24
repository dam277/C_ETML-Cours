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
        private List<Set> _lines;               // List of lines
        private List<Set> _columns;             // List of columns
        private Case[,] _cases;                 // Array of cases with coordinates
        private int _size;                      // Size of the array
        private int _sectionSize;               // Size of a section

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
        public List<Set> Lines
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
        public int SectionSize
        {
            get { return _sectionSize; }
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="size"></param>
        public Sudoku(int size = 3)
        {
            _size = size * size;
            _sectionSize = size;
            _cases = new Case[_size, _size];
            _sections = new List<Section>();
            _lines = new List<Set>();
            _columns = new List<Set>();
        }

        /// <summary>
        /// Generation of the sudoku
        /// </summary>
        public void SetAllRandomSudoku()
        {
            for(int y = 0; y < _size; y++)
            {
                for(int x = 0; x < _size; x++)
                {
                    Case @case = new Case(new Coordinate(x, y), RandomSingleton.GetInstance().RandomObject.Next(1, _size + 1));
                    _cases[x, y] = @case;
                }
            }
        }

        public void SetLines()
        {
            for (int y = 0; y < _size; y++)
            {
                Set line = new Set();
                for (int x = 0; x < _size; x++)
                {
                    line.AddCase(_cases[x, y]);
                }
                _lines.Add(line);
            }
        }

        public void SetColumns()
        {
            for (int x = 0; x < _size; x++)
            {
                Set column = new Set();
                for (int y = 0; y < _size; y++)
                {
                    column.AddCase(_cases[x, y]);
                }
                _columns.Add(column);
            }
        }

        public void SetSection()
        {
            for (int i = 0; i < _size; i += _sectionSize)
            {
                for (int u = 0; u < _size; u += _sectionSize)
                {
                    Section section = new Section();
                    for (int y = u; y < _size; y++)
                    {
                        for (int x = i; x < _size; x++)
                        {
                            section.AddCase(_cases[x, y]);
                        }
                    }
                    _sections.Add(section);
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

        /// <summary>
        /// 
        /// </summary>
        public void DisplaySudoku()
        {
            for (int y = 0; y < _size; y++)
            {
                for (int x = 0; x < _size; x++)
                {
                    Console.ForegroundColor = ConsoleColor.White;
                    Console.Write($"[{_cases[x, y].Number}]");

                    if ((x + 1) % _sectionSize == 0)
                    {
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.Write("|");
                    }
                }
                
                if ((y + 1) % _sectionSize == 0)
                {
                    Console.WriteLine();
                    for (int i = 0; i < _size * _sectionSize; i++)
                    {
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.Write("-");
                    }
                }
                Console.WriteLine();
            }
        }
    }
}
