# Si la dernière commande ne réussi pas il contiendra false
"-- 1 --"
function Test-WriteError
{
    Write-Error "Bad"
    $? # $false
}

Test-WriteError
$? # $true
"-- 2 --"
$_
"-- 3 --"
$args
"-- 4 --"
$false, $true, $null;
"-- 5 --"
$PSItem
 