using Android.App;
using Android.OS;
using Android.Widget;
using AndroidX.AppCompat.App;
using AppAndroid.Adapters;
using AppAndroid.Model;
using System;
using System.Collections.Generic;

namespace AppAndroid.Views
{
    [Activity(Label = "@strings/activity_todo", Theme = "@style/DarkTheme", MainLauncher = false)]
    public class ToDoListActivity : AppCompatActivity
    {
        List<TaskTable> _tasks;
        ListView _listView;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_toDo);

            // Create your application here
            _tasks = new List<TaskTable>();
            _tasks.Add(new TaskTable(0, "Apprendre le typescript", "Apprendre le typescript en Web pour créer des sites personnels", DateTime.Now));
            _tasks.Add(new TaskTable(1, "Finir la doc Xamarin", "Finir la doc Xamarin pour mardi", DateTime.Now));
            _tasks.Add(new TaskTable(2, "Faire les courses", "Prendre 25Kg de lait, 12L de farine et 7g d'oeufs", DateTime.Now));

            // Get new task adapter
            TaskAdapter taskAdapter = new TaskAdapter(_tasks, this);

            // Get ListView
            _listView = FindViewById<ListView>(Resource.Id.lstTasks);

            // Add adapter to the ListView
            _listView.Adapter = taskAdapter;
        }

        private void Adapter()
        {
            // Create Adapter
            var classicAdapter = ArrayAdapter.CreateFromResource(this, Resource.Array.array_tasks, Android.Resource.Layout.SimpleSpinnerItem);

            // Set a drop down view to the adapter
            classicAdapter.SetDropDownViewResource(Android.Resource.Layout.SimpleSpinnerDropDownItem);

            // Add to the ListView
            _listView = FindViewById<ListView>(Resource.Id.lstTasks);
            _listView.Adapter = classicAdapter;
        }
    }
}