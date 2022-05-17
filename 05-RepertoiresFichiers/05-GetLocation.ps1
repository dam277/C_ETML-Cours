<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-GetLocation.ps1
    Author:	Damien Loup
    Date:	23.03.2022
 	*****************************************************************************
.SYNOPSIS
    Get location  
 	
.DESCRIPTION
    Get the location of folders

.OUTPUTS
	Path of the folder
	
.EXAMPLE
    .\05-GetLocation.ps1
    [-path]
#>
clear;
Get-Location;
(Get-Location).Path;
