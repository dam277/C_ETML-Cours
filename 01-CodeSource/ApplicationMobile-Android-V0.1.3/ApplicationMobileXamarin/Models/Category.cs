using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using ApplicationMobile_Android.Classes.Databases;
using System;
using System.Collections.Generic;
using System.Drawing;
using System.Linq;
using System.Text;

namespace ApplicationMobile_Android.Classes
{
    public class Category
    {
        private int _id;                             // Id of the category
        private string _name;                        // name of the category
        private Color _color;                        // Color of the category
        private const string TABLE = "t_Category";   // Table of the entry

        /// <summary>
        /// Public id of the category
        /// </summary>
        public int Id
        {
            get { return _id; }
        }

        /// <summary>
        /// Public name of the category
        /// </summary>
        public string Name
        {
            get { return _name; }
        }

        /// <summary>
        /// Public color of the category
        /// </summary>
        public Color Color
        {
            get { return _color; }
        }

        /// <summary>
        /// Category constructor
        /// </summary>
        /// <param name="name">name of the category</param>
        /// <param name="color">Color of the category</param>
        public Category(string name, Color color)
        {
            _name = name;
            _color = color;
        }

        /// <summary>
        /// Get all the categories
        /// </summary>
        /// <returns>Returns list of category</returns>
        public List<Category> GetCategories()
        {
            string columns = "*";
            Database.GetInstance().Select(TABLE, columns);
            return null;
        }

        /// <summary>
        /// Get one category by Id
        /// </summary>
        /// <param name="id">Id of the category</param>
        /// <returns>Return a category object</returns>
        public Category GetCategory()
        {
            string where = this._id.ToString();
            string columns = "*";
            Database.GetInstance().Select(TABLE, columns, where);
            return null;
        }

        /// <summary>
        /// Insert a category on the database
        /// </summary>
        /// <param name="category">Category created</param>
        public void InsertCategory()
        {
            string columns = "*";
            string values = $"{this._id}, {this._name}, {this._color.ToString()}";
            Database.GetInstance().Insert(TABLE, columns, values);
        }


        /// <summary>
        /// Delete a category by Id
        /// </summary>
        /// <param name="id">Id of the category</param>
        public void DeleteCategory()
        {
            string where = this._id.ToString();
            Database.GetInstance().Delete(TABLE, where);
        }


        ///// <summary>
        ///// Modify a category by Id
        ///// </summary>
        ///// <param name="id">Id of the category</param>
        //public void ModifyCategory()
        //{
        //    string columns = "";
        //    string where = $"idTask = {this._id}";
        //    Database.GetInstance().Update(TABLE, columns, where);
        //}
    }
}