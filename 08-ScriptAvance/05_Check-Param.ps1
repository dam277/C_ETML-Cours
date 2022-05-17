<#
.NOTES
    *****************************************************************************
    ETML
    Name:	04_Check-Args.ps1
    Author:	Damien Loup
    Date:	12.04.2022
 	*****************************************************************************
.SYNOPSIS
    Exercice 5 chap 8
 	
.DESCRIPTION
    Affiche les 2 paramètres

.PARAMETER Name
    Nom de la personne

.PARAMETER Nb
    Nombre
  		
.EXAMPLE
    ./05_Check-Param.ps1 -Name toto -Nb 2
    toto
    2
#>

#Parameters
param([Parameter(Mandatory=$True, Position=0, ValueFromPipeline=$True)][string]$Name, [int]$Nb);

#display help if parameter is missing
if(!$Name -or !$Nb)
{
    Get-Help $MyInvocation.Mycommand.Path
}
else {
    $Name;
    $Nb;
}