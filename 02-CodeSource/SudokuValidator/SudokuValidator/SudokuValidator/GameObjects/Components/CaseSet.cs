using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SudokuValidator.GameObjects.Components
{
    public class CaseSet
    {
        protected List<Case> _cases;                // 

        /// <summary>
        /// 
        /// </summary>
        public List<Case> Cases
        {
            get { return _cases; }
        }

        /// <summary>
        /// 
        /// </summary>
        public CaseSet()
        {
            _cases = new List<Case>();
        }
        
        /// <summary>
        /// 
        /// </summary>
        /// <param name="case"></param>
        public void AddCase(Case @case)
        {
            _cases.Add(@case);
        }
    }
}
