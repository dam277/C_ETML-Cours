using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using ApplicationMobile_Android.Classes;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ApplicationMobile_Android
{
    [Activity(Label = "To Do List", Theme = "@style/DarkTheme", MainLauncher = false)]
    public class ToDoListActivity : Activity
    {
        private ListView _taskList;
        private List<UserTask> _tasks;

        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_ToDo);
            //_taskList = FindViewById<LinearLayout>(388309)

        }
    }
}