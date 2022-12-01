using Android.Views.Accessibility;
using AppAndroid.Model;
using SQLite;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Threading.Tasks;

namespace AppAndroid.Repository
{
    /// <summary>
    /// Manage the database
    /// </summary>
    public class TaskRepository
    {
        // Status message
        public string StatusMessage { get; set; }

        // Connection SQLite variable
        private SQLiteAsyncConnection _connection;

        /// <summary>
        /// Task repository constructor
        /// </summary>
        /// <param name="path">Path of the database</param>
        public TaskRepository(string path)
        {
            //Get the DB connection
            _connection = new SQLiteAsyncConnection(path);

            // Creation of the task table
            //_connection.CreateTableAsync<TaskTable>();
        }


        /// <summary>
        /// Add a new task
        /// </summary>
        /// <param name="name">Name of the task</param>
        /// <param name="description">Description of the task</param>
        /// <returns></returns>
        public async System.Threading.Tasks.Task AddTaskAsync(string name, string description)
        {
            var result = 0;

            try
            {
                // Insert into task table
                //result = await _connection.InsertAsync(new TaskTable { Name= name, Description = description });
                StatusMessage = $"tâche ajoutée : {name} - {result}";
            }
            catch (Exception ex)
            {
                // Error message
                StatusMessage = $"Error AddTaskAsync {name}. Error : {ex.Message}";
            }
        }

        /// <summary>
        /// Get all tasks
        /// </summary>
        /// <returns></returns>
        public async System.Threading.Tasks.Task<List<TaskTable>> GetTasksAsync()
        {
            try
            {
                // Return the list of tasks
                //return await _connection.Table<TaskTable>().ToListAsync();  
                return null;
            }
            catch(Exception ex)
            {
                // Error
                StatusMessage = $"Error ! Can't get all tasks. Error : {ex.Message}";
                return new List<TaskTable>();
            }
        }
    }
}