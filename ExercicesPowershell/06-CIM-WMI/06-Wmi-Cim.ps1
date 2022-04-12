<#
.NOTES
    *****************************************************************************
    ETML
    Name:	06-Vmi-Cim.ps1
    Author:	Damien Loup
    Date:	29.03.2022
 	*****************************************************************************
.SYNOPSIS
    Get cim wmi cmdlets
 	
.DESCRIPTION
    Get the CMDLETS of wmi and cim

.OUTPUTS
	the cmdlets with names which contains *Cim*
	
.EXAMPLE
    .\05-Vmi-Cim.ps1
    [-Commands]
#>

Get-Command -Name *Cim* -CommandType Cmdlet;
"---";
Get-Command -Name *Cim* -CommandType Cmdlet;