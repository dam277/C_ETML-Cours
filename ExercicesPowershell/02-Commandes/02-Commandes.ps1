$separate = "============================================================================================================================================================================================";

# === Lister toutes les commandes de type *cmdlet* === #
Get-Command -command-type Cmdlet

$separate

# === Afficher tous les paramètres d'une commande tapée === #
Get-Help Get-Process

$separate

# === Trouver la liste des *Function* qui se termine par *Configuration* === #
Get-Command -CommandType Function *Configuration

$separate

# === Trouver la liste des *Alias* qui commence par la lettre *g* === #
Get-Command -CommandType Alias g*

$separate

# === Trouver les propriétés et les méthodes d'un object === #
Get-Member

$separate

# === Obtenir les services qui contiennent le mot *Network* === #
Get-Service *Network*

$separate

# === Voir les propriétés et les méthodes de *Process* === #
Get-Service | Get-Member

$separate

# === Définir *$a = 3* et *$b ="toto"* et trouver les propriétés et méthodes des 2 === #
$a = 3;
$b = "toto";

$a | Get-Member
$b | Get-Member

