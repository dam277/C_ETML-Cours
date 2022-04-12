<#
.NOTES
    *****************************************************************************
    ETML
    Name:	04-Firstname-Give-Name.ps1
    Author:	Damien Loup
    Date:	22.03.2022
 	*****************************************************************************
.SYNOPSIS
    Dire bonjour à l'utilisateur avec son nom 
 	
.DESCRIPTION
    Write the name and the firstname by entering them
  	
.PARAMETER Name
    Name of the person
 	
.PARAMETER Firstname
    Firstname of the person

.OUTPUTS
	Bonjour [-name] [-Firstname]
	
.EXAMPLE
    .\04-Firstname-Give-Name.ps1 -Name toto -Firstname titi
    Bonjout toto titi
#>

#Parameters
param([string]$Name, [string]$Firstname)

#display help if parameter is missing
if(!$Name -or !$Firstname)
{
    Get-Help $MyInvocation.Mycommand.Path
}
else
{
    write-host "Bonjour" $Name $Firstname
}# endif


