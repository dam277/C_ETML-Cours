<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-CreateFolder.ps1
    Author:	Damien Loup
    Date:	23.03.2022
 	*****************************************************************************
.SYNOPSIS
    Create folder 
 	
.DESCRIPTION
    Create a folder with text at his creation
	
.EXAMPLE
    .\05-CreateFile.ps1
#>

New-Item -ItemType Directory -Name test -Path .\05-RepertoiresFichiers -Value "bonjour toto"