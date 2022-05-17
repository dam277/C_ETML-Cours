cls;
$separate = "============================================================================================================================================================================================";

# === Afficher le texte "hello" en bleu sur le fond rouge === #
Write-Host "hello" -ForegroundColor Blue -BackgroundColor Red;

$separate;

# === Afficher le texte "hello titi" dans un fichier texte === #
Write-Output "hello titi" > C:\Users\damloup\Desktop\ExercicesPowershell\03-titi.txt;

$separate;

# === Ecrire le texte "hello titi" Dans un fichier texte === #
Write-Output "hello toto" >> C:\Users\damloup\Desktop\ExercicesPowershell\03-toto.txt;

$separate;

# === Ecrire le texte "hello titi" Dans un fichier texte === #
$p1 = Get-Process
$p2 = "Get-Process";
Write-Output Get-Process;
"---";
Write-Output $p1;
"---";
Write-Output $p2;

$separate;

# === Ecrire le texte "hello titi" Dans un fichier texte === #
Get-Partition | Format-Table DriveLetter, Size
shutdown -a
