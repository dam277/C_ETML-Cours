using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SudokuValidator.GameObjects.Utils
{
    public struct Coordinate
    {
        private int _x;             //
        private int _y;             //

        /// <summary>
        /// 
        /// </summary>
        public int X
        {
            get { return _x; }
        }

        /// <summary>
        /// 
        /// </summary>
        public int y
        {
            get { return _y; }
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="x"></param>
        /// <param name="y"></param>
        public Coordinate(int x, int y)
        {
            _x = x;
            _y = y;
        }
    }
}
