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

namespace ApplicationMobile_Android.Classes.Databases
{
    public class Database
    {
        private static Database _instance;      // Instance of the database

        /// <summary>
        /// Database class constructor
        /// </summary>
        private Database()
        {

        }

        /// <summary>
        /// Get the instance of the database
        /// </summary>
        /// <returns></returns>
        public static Database GetInstance()
        {
            // Define if the instance is null or not
            if (_instance == null)
            {
                _instance = new Database();
            }

            return _instance;
        }

        /// <summary>
        /// Select an item in the database
        /// </summary>
        /// <param name="table">Table selected</param>
        /// <param name="columns">Columns to return</param>
        /// <param name="where">Where to search</param>
        /// <param name="orderBy">Order by </param>
        /// <returns></returns>
        public List<object> Select(string table, string columns, string where = "", string orderBy = "")
        {
            string req = $"SELECT {columns} FROM {table}";

            if (where != null)
            {
                req += $" WHERE {where}"; 
            }

            if (orderBy != null)
            {
                req += $" ORDER BY {orderBy}";
            }

            return null;
        }

        public void Insert(string table, string columns, string values)
        {
            string req = $"INSERT INTO {table} {columns} VALUES {values}";
        }

        public void Update(string table, string columns, string where)
        {
            string req = $"UPDATE {table} SET {columns} WHERE {where}";
        }

        public void Delete(string table, string where)
        {
            string req = $"DELETE FROM {table} WHERE {where}";
        }

    }
}