<#
.NOTES
    *****************************************************************************
    ETML
    Name:	03_ISI-Test-Function-Date.ps1
    Author:	Damien Loup
    Date:	12.04.2022
 	*****************************************************************************
.SYNOPSIS
    Affiche les informations à propos du jour
 	
.DESCRIPTION
    Affiche un message avec la date d'aujourd'hui

.PARAMETER Color
    Couleur du texte à afficher
  		
.EXAMPLE
    ./03_ISI-Test-Function-Date.ps1 -Color yellow
    Nous sommes le : 12.04.2022 15:44:50
#>

#Parameters
param([string]$Color);

#display help if parameter is missing
if(!$Color)
{
    Get-Help $MyInvocation.Mycommand.Path
}
else {
    # Appelles la fonction Write-Date
    Write-Date -Color $Color;
}

<# --- Fonction - Write-Date --- >
# Ecrit la date d'aujourd'hui avec la couleur entrée en paramètre au début du script
# -Color => Couleur du texte à afficher
#>
function Write-Date ([string]$Color) {
    $date = Get-Date;
    Write-Host "Nous sommes le : " $date -ForegroundColor $Color  
}