<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-Vmi-Cim_Class.ps1
    Author:	Damien Loup
    Date:	23.03.2022
 	*****************************************************************************
.SYNOPSIS
    Get Vmi Cim class
 	
.DESCRIPTION
    Get all the class of the Cim and Vmi cmdlets

.OUTPUTS
	Class of the Cim and Vmi
	
.EXAMPLE
    .\05-Vmi-Cim_Class.ps1
    [-Class]
#>

Get-CimClass; Get-WmiObject;