///<Sum>
/// Demande à l'utilisateur si il veut vraiment effacer l'enseignant
///</Sum>
function deleteTeacher(idTeacher)
{
	//Alert de confirmation
 	if(confirm("Voulez-vous vraiment supprimer cet enseignant ?") == true)
	{
		window.location = "src/php/delete.php?idTeacher=" + idTeacher;
	}
}