using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using SQLite;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid_V0._1._3.Models
{
    class Task
    {
        [PrimaryKey, AutoIncrement]
        public int tasId { get; set; }
    }
}