using SudokuValidator.GameObjects;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SudokuValidator.Methods.MultiThreading.BossWorkerModel
{
    public class BossWorkerModelMethod : Method
    {
        public BossWorkerModelMethod(Sudoku sudoku) : base(sudoku)
        {
        }

        public override void Columns()
        {
            throw new NotImplementedException();
        }

        public override void Lines()
        {
            throw new NotImplementedException();
        }

        public void Resolve()
        {

        }

        public override void Sections()
        {
            throw new NotImplementedException();
        }
    }
}
