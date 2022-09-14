using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using AndroidX.AppCompat.App;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ApplicationMobile_Android
{
    public class SecondActivity : AppCompatActivity
    {
        protected override void OnCreate(Bundle bundle)
        {
            base.OnCreate(bundle);
            SetContentView(Resource.Layout.acti);
            var btn2Act1 = FindViewById<Button>(Resource.Id.Btn2Act1);
            btn2Act1.Click += OnClick;
            // recuperation des donnees (si existe)
            var dataTextView = FindViewById<TextView>(Resource.Id.Data2Recover);
            string data = Intent.GetStringExtra("Data");
            // teste si la donnee existe
            if (!string.IsNullOrEmpty(data))
            {
                dataTextView.Text = data;
            }
        }
        private void OnClick(object sender, System.EventArgs e)
        {
            // retour a la premiere activity
            StartActivity(typeof(MainActivity));
        }
    }
}