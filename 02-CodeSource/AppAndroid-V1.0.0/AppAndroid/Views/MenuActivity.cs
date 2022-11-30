using Android.App;
using Android.Content;
using Android.Graphics;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AndroidX.AppCompat.App;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid.Views
{
    [Activity(Label = "@string/activity_menu", Theme = "@style/DarkTheme", MainLauncher = true)]
    public class MenuActivity : AppCompatActivity
    {
        //Buttons
        Button _btnToDoList;
        Button _btnMyDay;
        Button _btnCategories;
        Button _btnAppear;

        /// <summary>
        /// On the creation of the activity
        /// </summary>
        /// <param name="savedInstanceState">Instance</param>
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_menu);

            // Get the buttons and assignes events
            _btnToDoList = FindViewById<Button>(Resource.Id.btnToDo);
            _btnToDoList.Click += _btnToDoList_Click;

            _btnMyDay = FindViewById<Button>(Resource.Id.btnMyDay);
            _btnMyDay.Click += _btnMyDay_Click;

            _btnCategories = FindViewById<Button>(Resource.Id.btnCategories);
            _btnCategories.Click += _btnCategories_Click;

            // Button created dynamically visible with the text "appear"
            Button btnAppear = new Button(this)
            {
                Text = "appear",
                Visibility = Android.Views.ViewStates.Invisible
            };

            // Set the color of the text
            btnAppear.SetTextColor(Color.Violet);
            btnAppear.SetBackgroundColor(Color.Rgb(52, 152, 219));

            _btnAppear = btnAppear;

            // Get principal layout
            LinearLayout layout = FindViewById<LinearLayout>(Resource.Id.lytMain);
            layout.AddView(_btnAppear);

            // Get btnAppearVisible
            Button btnAppearVisible = FindViewById<Button>(Resource.Id.btnAppearVisible);

            btnAppearVisible.Click += BtnAppearVisible_Click;
        }

        /// <summary>
        /// Make appear the button btnAppear when clicked
        /// </summary>
        /// <param name="sender">Element clicked</param>
        /// <param name="e">Event information</param>
        private void BtnAppearVisible_Click(object sender, EventArgs e)
        {
            // Make visible the btnAppear button
            _btnAppear.Visibility = Android.Views.ViewStates.Visible;

            // Set the text of the clicked button by "button was clicked"
            (sender as Button).Text = "Button was clicked";
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
            Intent activity = new Intent(this, typeof(SecondActivity));
            activity.PutExtra("Data", "Datas to send to another activity");
            activity.PutStringArrayListExtra("Names", new List<string> { "Jerôme", "Michel", "Paul" });
            StartActivity(activity);
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