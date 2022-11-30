using Android.App;
using Android.Content;
using Android.Graphics;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using SQLite;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AppAndroid.Model
{
    /// <summary>
    /// Datas of a category
    /// </summary>
    [Table("t_category")]
    public class CategoryTable
    {
        /// <summary>
        /// Id of the task
        /// </summary>
        [PrimaryKey, AutoIncrement, NotNull, Unique, MaxLength(10)]
        public int ID { get; set; }

        /// <summary>
        /// Name of the task
        /// </summary>
        [MaxLength(100)]
        public string Name { get; set; }

        /// <summary>
        /// Color of the category
        /// </summary>
        public Color Color { get; set; }
    }
}