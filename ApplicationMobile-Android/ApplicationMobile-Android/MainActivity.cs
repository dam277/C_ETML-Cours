using Android.App;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AndroidX.AppCompat.App;
using System;

namespace ApplicationMobile_Android
{
    [Activity(Label = "@string/app_name", Theme = "@style/AppTheme", MainLauncher = true)]
    public class MainActivity : AppCompatActivity
    {
        Button crtButton;

        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_main);

            crtButton = FindViewById<Button>(Resource.Id.btnHello);
            crtButton.Click += OnClick;
        }

        public override void OnRequestPermissionsResult(int requestCode, string[] permissions, [GeneratedEnum] Android.Content.PM.Permission[] grantResults)
        {
            Xamarin.Essentials.Platform.OnRequestPermissionsResult(requestCode, permissions, grantResults);

            base.OnRequestPermissionsResult(requestCode, permissions, grantResults);
        }

        public void OnClick(object sender, EventArgs e)
        {
            TextView textView = FindViewById<TextView>(Resource.Id.textViewHello);
            textView.Text = "Hello World";

            if(textView.Visibility == ViewStates.Visible)
            {
                textView.Visibility = ViewStates.Gone;
            }
            else
            {
                textView.Visibility = ViewStates.Visible;
            }


            Button btnAppears = new Button(this)
            {
                Text = "Aller à un autre activité",
                TextAlignment = TextAlignment.Center
            };
            btnAppears.Click += btnAppears_OnClick; 

            LinearLayout main = FindViewById<LinearLayout>(Resource.Id.main);
            main.AddView(btnAppears);
        }

        public void btnAppears_OnClick(object sender, EventArgs e)
        {

        }
    }
}