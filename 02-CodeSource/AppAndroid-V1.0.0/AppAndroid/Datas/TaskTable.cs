using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid.Datas
{
    class TaskTable
    {
        public int ID { get; set; }

        public string Name { get; set; }

        public string Description { get; set; }

        public DateTime EndDate { get; set; }

        public TaskTable(int id, string name, string description, DateTime endDate)
        {
            ID = id;
            Name = name;
            Description = description;
            EndDate = endDate;
        }

        public override string ToString()
        {
            return $"{{ID={ID}, Name={Name}, Description={Description}, EndDate={EndDate}}}";
        }
    }
}