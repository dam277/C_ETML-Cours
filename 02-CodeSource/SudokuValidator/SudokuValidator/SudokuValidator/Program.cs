using SudokuValidator.GameObjects;
using SudokuValidator.Methods;
using SudokuValidator.Methods.MonoThreading;

namespace SudokuValidator
{
    class Program
    {
        static void Main(string[] args)
        {

            // Sudoku with size 9
            Sudoku sudoku = new Sudoku(2);
            MonoThreadingMethod monoThreading = new MonoThreadingMethod(sudoku);
            monoThreading.CreateSudoku();
            monoThreading.Resolve();

            Console.ReadLine();
        }
    }
}