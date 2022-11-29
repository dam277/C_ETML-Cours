using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AppAndroid.Datas;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid.Adapters
{
    class TaskAdapter : BaseAdapter<TaskTable>
    {
        public List<TaskTable> Tasks { get; }

        public Activity Activity;

        public TaskAdapter(List<TaskTable> tasks, Activity activity)
        {
            Tasks = tasks;
            Activity = activity;
        }

        public override TaskTable this[int position] => throw new NotImplementedException();

        public override int Count
        {
            get { return Tasks.Count; }
        }

        public override long GetItemId(int position)
        {
            throw new NotImplementedException();
        }

        public override View GetView(int position, View convertView, ViewGroup parent)
        {
            TaskTable task = Tasks[position];

            View v = Activity.LayoutInflater.Inflate(Resource.Layout.activity_modelTask, null);
            v.FindViewById<TextView>(Resource.Id.txtName).Text = task.Name;
            v.FindViewById<TextView>(Resource.Id.txtDescription).Text = task.Description;
            v.FindViewById<Button>(Resource.Id.btnTask).Text = task.EndDate.ToString();

            return v;
        }
    }
}