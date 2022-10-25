    SCOREDIGIT = 0 ; Score (digit on the 7-segment) 0 1, 2, 3
    LENGTH = 1 ; Lenght of the array

    ; Constants
    SCOREPOS = 3 ; Position of the score digit in the 7-segment

    .LOC    0
    SUB #LENGTH, SP

    ; Set the score
    MOVE    #0, {SP}+SCOREDIGIT ; Move 0 to the 1st score digit
    
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
 
    ; Increment score
    INC     {SP}+SCOREDIGIT

    ; Move variables
    MOVE    {SP}+SCOREDIGIT, A
    MOVE    #SCOREPOS, B

    ; Display
    CALL    DISPLAYDIGIT

    ; Redo function
    JUMP    SCORE

DISPLAYDIGIT:
    PUSH    A
    PUSH    B
    CALL    _DisplayHexaDigit
    POP     A
    POP     B
    RET