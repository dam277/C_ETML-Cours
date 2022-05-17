<#
.NOTES
    *****************************************************************************
    ETML
    Name:	NameFirstname-Modify-Ini.ps1
    Author:	Damien Loup
    Date:	03.05.2022
 	*****************************************************************************
.SYNOPSIS
    modifier un fichier
 	
.DESCRIPTION
    modifier un fichier en y ajoutant une ligne à un endroit définit par le paramètre InputPart.
  	
.PARAMETER Help
    Active l'aide et affiche le canevas 
 	
.PARAMETER Param2
    Description second parameter
 	
.PARAMETER Param3
    Description third parameter
	
.EXAMPLE
    ./NameFirstname-Modify-Ini.ps1 -InputFile T:\temp\inventory.ini -InputPart "[WORKSTATIONS]" -AddedLine "Isa = Linux"

    [inventory.ini] :
    [WORKSTATIONS]
    Anna = Mac
    Paul = PC
    Lyne = Linux
==> Isa = Linux

#>

# Paramètres d'entrée
param([string]$Help, [string]$InputFile, [string]$InputPart, [string]$AddedLine)

# Affiche l'aide si un paramètre est manquant ou si le paramètre -help est renseigné
if($Help -or !$InputFile -or !$InputPart -or !$AddedLine)
{
    Get-Help $MyInvocation.Mycommand.Path
}
else
{
    try 
    {
        #Obtient le contenu du fichier de base
        $fileContent = Get-Content $InputFile;

        #Regarde le fichier à chaque ligne
        foreach($line in $fileContent)
        {
            # Ecrit la ligne du fichier principal dans le fichier temporaire
            Write-Output $line >> temp.txt;

            # Regarde si la ligne active est la ligne recherchée dans le paramètre d'entrée -InputPart
            if ($line -eq $InputPart) 
            {
                Write-Output $AddedLine >> temp.txt;
            }
        }

        #Récupère le contenu du fichier temporaire 
        $test = Get-Content temp.txt;

        # Remplace le texte par celui du fichier temporaire
        Write-Output $test > inventory.ini;

        # Efface le fichier temporaire
        Remove-Item -Path temp.txt;

        $date = Get-Date;
        Write-Output "$date : Le fichier [$InputFile] a ajouté [$AddedLine] à l'emplacement [$InputPart]" >> damloupInventoryLog.txt;
    }
    catch 
    {
        $date = Get-Date;
        Write-Output "$date : Une erreur est survenue. Le fichier [$InputFile] n'a pas ajouté [$AddedLine] à l'emplacement [$InputPart]" >> damloupInventoryLog.txt;    
    }
}# endif