using SudokuValidator.GameObjects.Utils;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SudokuValidator.Logs
{
    public class Error
    {
        private string _message;                     // 
        private Coordinate _coordinate;              //

        /// <summary>
        /// 
        /// </summary>
        public string Message
        {
            get { return _message; }
        }

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
        /// <param name="message"></param>
        /// <param name="coordinate"></param>
        public Error(string message, Coordinate coordinate)
        {
            _message = message;
            _coordinate = coordinate;
        }
    }
}
