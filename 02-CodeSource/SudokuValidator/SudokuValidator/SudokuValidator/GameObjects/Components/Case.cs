using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using SudokuValidator.GameObjects.Utils;

namespace SudokuValidator.GameObjects.Components
{
    public class Case
    {
        private Coordinate _coordinate;     //
        private int _number;                //

        /// <summary>
        /// 
        /// </summary>
        public Coordinate Coordinate
        {
            get { return _coordinate; }
        }

        /// <summary>
        /// 
        /// </summary>
        public int Number
        {
            get { return _number; }
            set { _number = value; }
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="coordinate"></param>
        /// <param name="number"></param>
        public Case(Coordinate coordinate, int number)
        {
            _coordinate = coordinate;
            _number = number;
        }
    }
}
