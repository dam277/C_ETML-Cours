<#
.NOTES
    *****************************************************************************
    ETML
    Name:	02_Read-Numbers.ps1
    Author:	Damien Loup
    Date:	12.04.2022
 	*****************************************************************************
.SYNOPSIS
    Ecrit le nombre entré au clavier s'il est plus petit que celui rentré en paramètre
 	
.DESCRIPTION
    Recevoir 1 chiffre en paramètre étant comme limite. 
    Prendre le nombre entré au clavier et l'afficher aussi longtemps que celui-ci
    est inférieur à la valeur passée en paramètre.
  	
.PARAMETER NumberMax
    Nombre maximum qui peut être retenu 

.OUTPUTS
	Chiffre du clavier
	
.EXAMPLE
    ./02_Read-Numbers.ps1 -NumberMax 9
    Le nombre entier à afficher est : 7
    7
    Le nombre entier à afficher est : 40
#>

#Parameters
param([int]$NumberMax);

#display help if parameter is missing
if(!$NumberMax)
{
    Get-Help $MyInvocation.Mycommand.Path
}
else {
    # Ecrit les nombre que l'on rentre tant que ce n'est pas plus grand que le chiffre rentré en paramètre
    do
    {
        [int]$number = Read-Host("Le nombre entier à afficher est ");  
    }while ($number -lt $NumberMax)
}

