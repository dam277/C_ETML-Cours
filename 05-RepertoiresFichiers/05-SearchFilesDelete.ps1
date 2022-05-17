<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-SearchFilesDelete.ps1
    Author:	Damien Loup
    Date:	23.03.2022
 	*****************************************************************************
.SYNOPSIS
    Search and delete file  
 	
.DESCRIPTION
    Search a file with the .bmp extension to delete all of them
	
.EXAMPLE
    .\05-SearchFilesDelete.ps1
#>

Get-ChildItem C:/Chap5 Filter *.bmp -recurse | Remove-Item

