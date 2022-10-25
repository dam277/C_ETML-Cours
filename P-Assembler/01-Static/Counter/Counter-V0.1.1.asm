    SCOREDIGIT1 = 0 ; Score (digit on the 7-segment) 0 1, 2, 3
    LENGTH = 1 ; Lenght of the array

    ; Constants
    SCOREPOS1 = 3 ; Position of the score digit in the 7-segment

    .LOC    0
    SUB #LENGTH, SP

    ; Set the score
    MOVE    #0, {SP}+SCOREDIGIT1 ; Move 0 to the 1st score digit


    ; Display
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B
    CALL    DISPLAYDIGIT
    
; **************************************************************   
; ********************Start of the program**********************   
; **************************************************************   
START:  

; **************************************************************   
; *************************Score turn***************************   
; **************************************************************   
SCORE: 
    
    // Sleep
    PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

    COMP    #9, {SP}+SCOREDIGIT1 ; Score digit 1 is equal 9
    JUMP,EQ UPDATEDIGIT2

 
    ; Increment score
    INC     {SP}+SCOREDIGIT1

    ; Move variables
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B

    ; Display
    CALL    DISPLAYDIGIT

    ; Redo function
    JUMP    SCORE

UPDATEDIGIT2:

    MOVE    #0, {SP}+SCOREDIGIT1

    ; Redo function
    JUMP    SCORE

DISPLAYDIGIT:
    PUSH    A
    PUSH    B
    CALL    _DisplayHexaDigit
    POP     A
    POP     B
    RET