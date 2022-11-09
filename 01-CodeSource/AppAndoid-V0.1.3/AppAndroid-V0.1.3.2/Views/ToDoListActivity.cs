using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using System;
using System.Collections.Generic;
using System.Linq;
using AndroidX.AppCompat.App;
using System.Text;

namespace AppAndroid_V0._1._3.Views
{
    [Activity(Label = "ToDoListActivity")]
    public class ToDoListActivity : AppCompatActivity
    {
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_toDo);

            // Create your application here
        }
    }
}