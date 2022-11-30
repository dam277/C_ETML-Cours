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

using SQLite;
using Java.Sql;
using SQLiteNetExtensions.Attributes;

namespace AppAndroid.Model
{
    /// <summary>
    /// Datas of a task
    /// </summary>
    [Table("t_task")]
    public class TaskTable
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
        /// Description of the task
        /// </summary>
        [MaxLength(1000)]
        public string Description { get; set; }

        /// <summary>
        /// End date of the task
        /// </summary>
        public DateTime EndDate { get; set; }

        /// <summary>
        /// Foreign key of the category
        /// </summary>
        [ForeignKey(typeof(CategoryTable))]
        public int FkCategory { get; set; }

        /// <summary>
        /// Category of the task
        /// </summary>
        [ManyToOne]
        public CategoryTable Category { get; set; }
             
        /// <summary>
        /// Task constructor
        /// </summary>
        /// <param name="id">Id of the task</param>
        /// <param name="name">Name of the task</param>
        /// <param name="description">Description of the task</param>
        /// <param name="endDate">End date of the task</param>
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