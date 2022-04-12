<#
.NOTES
    *****************************************************************************
    ETML
    Name:	05-CreateTree.ps1
    Author:	Damien Loup
    Date:	23.03.2022
 	*****************************************************************************
.SYNOPSIS
    Create Tree 
 	
.DESCRIPTION
    Create a tree of fiew folders
	
.EXAMPLE
    .\05-CreateTree.ps1
#>

New-Item -ItemType Directory -Name Chap5 -Path c:/


# Create the tree from C:/
for (($i = 1); $i -lt 4; $i++)
{
    #Create First directory Chap5
    New-Item -ItemType Directory -Name rep$i -Path c:/Chap5;

    #Create all the directory
    for (($y = 1); $y -lt 3; $y++)
    {
        #Create name of the folder
        $name = "SousRep"
        $name += $i

        #Check what subfolder to create and files
        if($y -le 1)
        {
            $name += "Avec"
            New-Item -ItemType Directory -Name $name -Path c:/Chap5/rep$i;
            New-Item -ItemType File -Name toto.txt -Path c:/Chap5/rep$i/$name;
            New-Item -ItemType File -Name titi.rtf -Path c:/Chap5/rep$i/$name;
        }
        else
        {
            $name += "Sans"
            New-Item -ItemType Directory -Name $name -Path c:/Chap5/rep$i;
            New-Item -ItemType File -Name tata.bmp -Path c:/Chap5/rep$i/$name;
        }

        
    }
}