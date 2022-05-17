# MODULO => 4 % 2 = 0

############################################### -eq => == => EGALE
BONJOUR -eq bonjour
# TRUE

################################################ -ceq => != EGALE => Sensible à la casse
BONJOUR -ceq bonjour
# FALSE

################################################ -ne => != PAS EGALE
toto NE bonjour
# TRUE

################################################ -gt => > => Coté gauche plus grand
8 -gt 6  
# Output: True

################################################ -ge => >= => Coté gauche plus grand ou egale
8 -ge 8  
# Output: True

################################################ -lt => < => Coté droite plus grand
6 -lt 8  
# Output: True

################################################ -le => <= => Coté droite plus grand ou egale
8 -le 8  
# Output: True

################################################ Affectation +1 
$a = 1
$a++;
$a;

################################################ -replace => Remplace ce que l'on veut par une autre valeur
"B1","B2","B3","B4","B5" -replace "B", 'a'
a1
a2
a3
a4
a5
#

################################################ -like => Regarde si le nom ressemble à un autre (utilisation de *, ? et [...-...])
"PowerShell" -like    "*shell"           
# Output: True
#

################################################ -notlike => Regarde si le nom ne ressemble pas à un autre (utilisation de *, ? et [...-...])
"PowerShell" -notlike "*shell"           
# Output: False
#

################################################ -like => Regarde si le nom ressemble à d'autres et retourne le plus ressemblant (utilisation de *, ? et [...-...])
"PowerShell", "Server" -like "*shell"    
# Output: PowerShell
#

################################################ -notlike => Regarde si le nom ne ressemble pas à d'autres et retourne le moins ressemblant (utilisation de *, ? et [...-...])
"PowerShell", "Server" -notlike "*shell" 
# Output: Server
#

################################################ -match => Regarde si le nom ne ressemble un autre
"PowerShell" -match 'shell'        
# Output: True
#

################################################ -is => Chercher si une variable est d'un type précis
$a -is [int]          
Output: True
#

################################################ -isnot => Checher si une variable n'est pas d'un type précis
$b -isnot [int]        
Output: True
#