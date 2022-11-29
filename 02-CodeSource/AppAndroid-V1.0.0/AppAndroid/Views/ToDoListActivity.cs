using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AndroidX.AppCompat.App;
using AppAndroid.Adapters;
using AppAndroid.Datas;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid.Views
{
    [Activity(Label = "@strings/activity_todo", Theme = "@style/DarkTheme", MainLauncher = false)]
    public class ToDoListActivity : AppCompatActivity
    {
        List<TaskTable> tasks;
        ListView listView;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_toDo);

            // Create your application here
            tasks = new List<TaskTable>();
            tasks.Add(new TaskTable(0, "tâche 1", "Description de la tâche 1", DateTime.Now));
            tasks.Add(new TaskTable(1, "tâche 2", "Description de la tâche 2", DateTime.Now));
            tasks.Add(new TaskTable(2, "tâche 3", "Description de la tâche 3", DateTime.Now));

            TaskAdapter taskAdapter = new TaskAdapter(tasks, this);

            listView = FindViewById<ListView>(Resource.Id.lstTasks);
            listView.Adapter = taskAdapter;
        }
    }
}