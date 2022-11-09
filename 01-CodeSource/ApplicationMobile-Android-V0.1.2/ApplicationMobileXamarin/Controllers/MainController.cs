using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using ApplicationMobileXamarin.Utils;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ApplicationMobileXamarin.Controllers
{
    public abstract class MainController
    {
        Dictionary<string, object> _datas;

        /// <summary>
        /// Main controller class constructor
        /// </summary>
        public MainController()
        {
            _datas = new Dictionary<string, object>();
        }

        /// <summary>
        /// Get the a controller
        /// </summary>
        /// <param name="eViews">Enum of all the views</param>
        /// <returns>Returns a controller</returns>
        public MainController GetController(EViews eViews)
        {
            switch (eViews)
            {
                case EViews.MENU:
                    return new MenuController();
                case EViews.MYDAY:
                    return new MyDayController();
                case EViews.TODOLIST:
                    return new ToDoListController();
                case EViews.TASKDETAILS:
                    return new TaskDetailsController();
                case EViews.TASKADD:
                    return new TaskAddController();
                case EViews.CATEGORYLIST:
                    return new CategoryListController();
                case EViews.CATEGORYADD:
                    return new CategoryAddController();
                default:
                    return null;
            }
        }

        /// <summary>
        /// Show a new activity
        /// </summary>
        public abstract void ShowActivity();

        /// <summary>
        /// Put a data in the dictionary
        /// </summary>
        /// <param name="name">name of the index</param>
        /// <param name="data">data send</param>
        protected void PutData(string name, string data)
        {
            _datas.Add(name, data);
        }

        /// <summary>
        /// Put a data in the dictionary
        /// </summary>
        /// <param name="name">name of the index</param>
        /// <param name="data">data send</param>
        protected void PutListData(string name, List<string> data)
        {
            _datas.Add(name, data);
        }
    }
}