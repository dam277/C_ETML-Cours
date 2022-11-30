using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AppAndroid.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid.Adapters
{
    /// <summary>
    /// Adapter of tasks
    /// </summary>
    class TaskAdapter : BaseAdapter<TaskTable>
    {
        /// <summary>
        /// List of task
        /// </summary>
        public List<TaskTable> Tasks { get; }

        /// <summary>
        /// Actual activity
        /// </summary>
        public Activity Activity;

        /// <summary>
        /// Task adapter constructor
        /// </summary>
        /// <param name="tasks">List of tasks</param>
        /// <param name="activity">Actual acti</param>
        public TaskAdapter(List<TaskTable> tasks, Activity activity) : base()
        {
            Tasks = tasks;
            Activity = activity;
        }

        /// <summary>
        /// Get a task on a specific position
        /// </summary>
        /// <param name="position">Position on the list of tasks</param>
        /// <returns>Returns a task object on the position</returns>
        public override TaskTable this[int position]
        {
            get { return Tasks[position]; }
        }

        /// <summary>
        /// Get the number of tasks
        /// </summary>
        public override int Count
        {
            get { return Tasks.Count; }
        }

        /// <summary>
        /// Get the id of a task
        /// </summary>
        /// <param name="position">Position of the task in the list</param>
        /// <returns>Returns an id => INT</returns>
        public override long GetItemId(int position)
        {
            return position;
        }

        /// <summary>
        /// Get a task on a specific position (Not usefull method)
        /// </summary>
        /// <param name="positon">Position on the list of tasks</param>
        /// <returns>Returns a task object on the position</returns>
        public override Java.Lang.Object GetItem(int positon)
        {
            // Return nothing
            return null;
        }

        /// <summary>
        /// Set the render model of ListView
        /// </summary>
        /// <param name="position">Position on the list of tasks</param>
        /// <param name="convertView">View</param>
        /// <param name="parent">parent View group</param>
        /// <returns>Returns a view of datas</returns>
        public override View GetView(int position, View convertView, ViewGroup parent)
        {
            // Create a task
            TaskTable task = Tasks[position];

            // Get the view and set datas
            View v = Activity.LayoutInflater.Inflate(Resource.Layout.activity_modelTask, null);
            v.FindViewById<TextView>(Resource.Id.txtName).Text = task.Name;
            v.FindViewById<TextView>(Resource.Id.txtDescription).Text = task.Description;
            v.FindViewById<Button>(Resource.Id.btnTask).Text = task.EndDate.ToString();

            // Returns view
            return v;
        }
    }
}