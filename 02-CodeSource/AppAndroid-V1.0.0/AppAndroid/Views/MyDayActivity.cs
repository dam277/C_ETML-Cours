using Android.App;
using Android.Content;
using Android.Hardware;
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
    [Activity(Label = "@strings/activity_my_day", Theme = "@style/DarkTheme", MainLauncher = false)]
    public class MyDayActivity : AppCompatActivity, ISensorEventListener
    {
        private SensorManager _sensorMgr;   // Sensor manager
        private Sensor _accelerometer;      // Accelerometer sensor
        private float _posX;                // Pos x of the smartphone


        public void OnAccuracyChanged(Sensor sensor, [GeneratedEnum] SensorStatus accuracy)
        {
            throw new NotImplementedException();
        }

        /// <summary>
        /// Execute when sensor state changed
        /// </summary>
        /// <param name="e">Sensor event</param>
        public void OnSensorChanged(SensorEvent e)
        {
            // Is the sens an accelerometer
            if (e.Sensor.Equals(_accelerometer))
            {
                // Get the 3 value of X, Y and Z
                IList<float> values = e.Values;

                if (Math.Abs(values[0] - _posX) > 5)
                {
                    // Delete the tasks
                }
                else
                {
                    _posX = values[0];
                }
            }
        }

        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.activity_myDay);

            // Create your application here

            // Get the accelerometer 
            _accelerometer = _sensorMgr.GetDefaultSensor(SensorType.Accelerometer); 

            // Register the accelerometer in the sensor manager
            _sensorMgr.RegisterListener(this, _accelerometer, SensorDelay.Normal);

            // Make free the sensor manager
            _sensorMgr.UnregisterListener(this);


            //// Get the sensor manager
            //SensorManager sensorMgr = (SensorManager)GetSystemService(SensorService);

            //// list of all the sensors
            //IList<Sensor> sensorList = sensorMgr.GetSensorList(SensorType.All);

            //// Get the TextView
            //TextView txtSensors = FindViewById<TextView>(Resource.Id.txtSensors);

            //// Display the sensor names
            //foreach (Sensor sensor in sensorList)
            //{
            //    txtSensors.Text += $"\n{sensor.Name}";
            //}

        }
    }
}