using SudokuValidator.GameObjects;
using SudokuValidator.GameObjects.Components;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SudokuValidator.Methods.MonoThreading
{
    public class MonoThreadingMethod : Method
    {
        public MonoThreadingMethod(Sudoku sudoku) : base(sudoku)
        {

        }

        public override void Lines()
        {
            foreach(var line in _sudoku.Lines)
            {
                
            }
        }

        public override void Columns()
        {

        }

        public override void Sections()
        {

        }
    }
}
