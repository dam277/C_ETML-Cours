<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-CreateItemHKLM.ps1
    Author:	Damien Loup
    Date:	29.03.2022
 	*****************************************************************************
.SYNOPSIS
    Create HKLM
 	
.DESCRIPTION
    Create a new key on ETML named CLE4 with TATA for name and TATADATA for value
	
.EXAMPLE
    .\05-SearchFilesDelete.ps1
#>

New-ItemProperty -Path HKLM:/SOFTWARE/ETML/CLE4/ -Name TATA -Value Tatadata