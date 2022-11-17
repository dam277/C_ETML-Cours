using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace I326_Singleton
{
    public class RandomSingleton
    {
        private static RandomSingleton _instance;         //
        private Random _randomObject;               //
        public Random RandomObject
        {
            get
            {
                return _randomObject;
            }
            set
            {
                _randomObject = value;
            }
        }

        /// <summary>
        /// 
        /// </summary>
        private RandomSingleton()
        {
            RandomObject = new Random();
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public static RandomSingleton GetInstance()
        {
            if (_instance == null)
            {
                _instance = new RandomSingleton();
            }

            return _instance;
        }
    }
}
