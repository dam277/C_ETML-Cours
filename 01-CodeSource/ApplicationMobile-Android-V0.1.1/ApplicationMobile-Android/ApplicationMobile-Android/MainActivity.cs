using Android.App;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AndroidX.AppCompat.App;
using System;

namespace ApplicationMobile_Android
{
    [Activity(Label = "Menu", Theme = "@style/DarkTheme", MainLauncher = true)]
    public class MainActivity : AppCompatActivity
    {
        //Buttons
        Button _btnToDoList;
        Button _btnMyDay;
        Button _btnCategories;

        /// <summary>
        /// On the creation of the activity
        /// </summary>
        /// <param name="savedInstanceState">instance state</param>
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_main);

            // Get the buttons and assignes events
            _btnToDoList = FindViewById<Button>(Resource.Id.btnToDo);
            _btnToDoList.Click += _btnToDoList_Click;

            _btnMyDay = FindViewById<Button>(Resource.Id.btnMyDay);
            _btnMyDay.Click += _btnMyDay_Click;

            _btnCategories = FindViewById<Button>(Resource.Id.btnCategories);
            _btnCategories.Click += _btnCategories_Click;
        }

        /// <summary>
        /// Called when the buttons is clicked
        /// </summary>
        /// <param name="sender">Sender object</param>
        /// <param name="e">Event</param>
        private void _btnToDoList_Click(object sender, EventArgs e)
        {
            StartActivity(typeof(ToDoListActivity));
        }

        /// <summary>
        /// Called when the buttons is clicked
        /// </summary>
        /// <param name="sender">Sender object</param>
        /// <param name="e">Event</param>
        private void _btnMyDay_Click(object sender, EventArgs e)
        {
            
        }

        /// <summary>
        /// Called when the buttons is clicked
        /// </summary>
        /// <param name="sender">Sender object</param>
        /// <param name="e">Event</param>
        private void _btnCategories_Click(object sender, EventArgs e)
        {
            
        }

        public override void OnRequestPermissionsResult(int requestCode, string[] permissions, [GeneratedEnum] Android.Content.PM.Permission[] grantResults)
        {
            Xamarin.Essentials.Platform.OnRequestPermissionsResult(requestCode, permissions, grantResults);

            base.OnRequestPermissionsResult(requestCode, permissions, grantResults);
        }
    }
}