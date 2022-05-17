<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-CreateFile.ps1
    Author:	Damien Loup
    Date:	23.03.2022
 	*****************************************************************************
.SYNOPSIS
    Create file 
 	
.DESCRIPTION
    Create a file with text at his creation
	
.EXAMPLE
    .\05-CreateFile.ps1
#>

New-Item -ItemType File -Name test.txt -Path .\05-RepertoiresFichiers -Value "bonjour toto"