Get-CimInstance CIM_Processor | Format-Table Name, NumberOfCores, MaxClockSpeed, Description;
Get-WmiObject -Classname Wim32_Processor | Format-Table Name, NumberOfCores, MaxClockSpeed, Description;