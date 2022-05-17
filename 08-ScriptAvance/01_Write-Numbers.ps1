<#
.NOTES
    *****************************************************************************
    ETML
    Name:	01_Write-Numbers.ps1
    Author:	Damien Loup
    Date:	12.04.2022
 	*****************************************************************************
.SYNOPSIS
    Ecrit le contenu d'un tableau généré aléatoirement en rentrant des chiffres
    cadre
 	
.DESCRIPTION
    Recevoir 2 chiffres en paramètre étant comme limite. 
    Créer un tableau à l'aide de ces 2 chiffres.
    Et afficher le contenu du tableau.
  	
.PARAMETER Min
    Nombre minimum à se générer dans le tableau
 	
.PARAMETER Max
    Nombre maximum à se générer dans le tableau

.OUTPUTS
	[-Min] ... [-Max]
	
.EXAMPLE
    ./01_Write-Numbers.ps1 -Min 4 -Max 9
    4
    5
    6
    7
    8
    9
#>

# Paramètres
param($Min, $Max);

# Affiche l'aide si un paramètre estt manquant
if((!$Min -or !$Max) -or ($Min -isnot [int] -or $Max -isnot [int]))
{
    Get-Help $MyInvocation.Mycommand.Path
}
else
{

    # Création du tableau et remplissage
    $tab = @();

    for ($i = $Min; $i -lt $Max + 1; $i++) {
        $tab += $i;
    }

    # Affichage du tableau
    foreach($value in $tab)
    {
        $value;
    }
}# endif
