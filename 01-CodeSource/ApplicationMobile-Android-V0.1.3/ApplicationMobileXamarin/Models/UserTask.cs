using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using ApplicationMobile_Android.Classes.Databases;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ApplicationMobile_Android.Classes
{
    public class UserTask
    {
        private int _id;                         // Id of the task
        private string _name;                    // name of the task
        private string _description;             // Description of the task
        private bool _isOnMyDay;                 // Determines if the task is on the page (My day)
        private Category _category;              // Category of the task
        private DateTime _end;                   // End date of the task
        private const string TABLE = "t_task";   // Table of the entry

        /// <summary>
        /// Public id of the task
        /// </summary>
        public int Id
        {
            get { return _id; }
        }

        /// <summary>
        /// Public name of the task
        /// </summary>
        public string Name
        {
            get { return _name; }
        }

        /// <summary>
        /// Public description of the task
        /// </summary>
        public string Description
        {
            get { return _description; }
        }

        /// <summary>
        /// Public is on "my day" page of the task
        /// </summary>
        public bool IsOnMyDay
        {
            get { return _isOnMyDay; }
            set { _isOnMyDay = value; }
        }

        /// <summary>
        /// Public category of the task
        /// </summary>
        public Category Category
        {
            get { return _category; }
        }

        /// <summary>
        /// Public end date of the task
        /// </summary>
        public DateTime End
        {
            get { return _end; }
        }

        /// <summary>
        /// Task constructor
        /// </summary>
        /// <param name="name">name of the task</param>
        /// <param name="description">description of the task</param>
        /// <param name="category">category of the task</param>
        /// <param name="end">end of the task</param>
        public UserTask(string name, string description, Category category, DateTime end)
        {
            _name = name;
            _description = description;
            _category = category;
            _end = end;
        }

        /// <summary>
        /// Get all the tasks
        /// </summary>
        /// <returns>Returns a list of task</returns>
        public List<UserTask> GetTasks()
        {
            string columns = "*";
            Database.GetInstance().Select(TABLE, columns);
            return null;
        }

        /// <summary>
        /// get one task by Id
        /// </summary>
        /// <param name="id">Id of the task</param>
        /// <returns>Returns a task object</returns>
        public UserTask GetTask()
        {
            string where = this._id.ToString();
            string columns = "*";
            Database.GetInstance().Select(TABLE, columns, where);
            return null;
        }

        /// <summary>
        /// Insert a new task
        /// </summary>
        public void InsertTask()
        {
            string columns = "*";
            string values = $"{this._id}, {this._name}, {this._description}, {this._isOnMyDay}, {this._category}, {this._end}";
            Database.GetInstance().Insert(TABLE, columns, values);
        }


        /// <summary>
        /// Delete a task by iD
        /// </summary>
        /// <param name="id">id of the task</param>
        public void DeleteTask()
        {
            string where = this._id.ToString();
            Database.GetInstance().Delete(TABLE, where);
        }


        ///// <summary>
        ///// Modify a task by Id
        ///// </summary>
        //// <param name="id">id of the task</param>
        //public void ModifyTask()
        //{
        //    string columns = "";
        //    string where = $"idTask = {this._id}";
        //    Database.GetInstance().Update(TABLE, columns, where);
        //}
    }
}