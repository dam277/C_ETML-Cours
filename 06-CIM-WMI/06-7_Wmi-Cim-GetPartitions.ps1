Get-CimInstance -ClassName CIM_DiskPartition | Format-Table Name, BootPartition
Get-CimInstance -ClassName Win32_Volume | Format-Table Name, BootVolume