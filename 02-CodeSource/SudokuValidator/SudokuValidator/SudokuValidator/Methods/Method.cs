using SudokuValidator.GameObjects;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SudokuValidator.Methods
{
    public abstract class Method
    {
        protected Sudoku _sudoku;

        public Method(Sudoku sudoku)
        {
            _sudoku = sudoku;
        }

        public void CreateSudoku()
        {
            _sudoku.SetAllRandomSudoku();
            _sudoku.SetLines();
            _sudoku.SetColumns();
            _sudoku.SetSection();
            _sudoku.DisplaySudoku();
        }

        public void Resolve()
        {
            Lines();
            Columns();
            Sections();
        }

        public abstract void Lines();
        public abstract void Columns();
        public abstract void Sections();
    }
}
