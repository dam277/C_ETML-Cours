using SudokuValidator.GameObjects.Components;
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
        private Case _case;                          //

        /// <summary>
        /// 
        /// </summary>
        public string Message
        {
            get { return _message; }
        }

        public Case Case
        {
            get { return _case; }
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="message"></param>
        /// <param name="coordinate"></param>
        public Error(string message, Case @case)
        {
            _message = message;
            _case = @case;
        }
    }
}
