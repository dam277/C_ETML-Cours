<#
.NOTES
    *****************************************************************************
    ETML
    Name:	04_Check-Args.ps1
    Author:	Damien Loup
    Date:	12.04.2022
 	*****************************************************************************
.SYNOPSIS
    Exercice 4 chap 8
 	
.DESCRIPTION
    Affiche tous les "arguments" rentrés en trop stockés dans le tableau d'argument
  		
.EXAMPLE
    ./04_Check-Args.ps1 toto 3.85 w 6798
    toto
    3.85
    w
    6798
#>

foreach($value in $args)
{
    $value;
}

# $args