using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AppAndroid.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Xamarin.Essentials;

namespace AppAndroid.Views
{
    [Activity(Label = "@strings/activity_task_add", Theme = "@style/DarkTheme", MainLauncher = false)]
    public class TaskAddActivity : Activity
    {
        private string _path = System.IO.Path.Combine(FileSystem.AppDataDirectory, "db_335-AppMobile");

        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_taskAdd);

            // Create a new task
            TaskRepository taskRepository = new TaskRepository(_path);
            taskRepository.AddTaskAsync("Apprendre le typescript", "Apprendre le typescript en Web pour créer des sites personnels");
        }
    }
}
