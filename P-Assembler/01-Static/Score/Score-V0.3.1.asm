    SCOREDIGIT1 = 0 ; Score (First digit on the 7segment) 0, 1, 2, 3
    SCOREDIGIT2 = 1 ; Score (Second digit on the 7segment) 00 10, 20, 30
    LIFES = 2 ; Lifes of the ship
    LENGTH = 3 ; Lenght of the array

    ; Constants
    LIFEPOS = 0 ; Position of the life in the 7-segment
    SCOREPOS1 = 3 ; Position of the score digit in the 7-segment
    SCOREPOS2 = 2 ; Position of the 2nd score digit in the 7-segment

    .LOC    0
    SUB #LENGTH, SP

    ; Set the score and life
    MOVE    #3, {SP}+LIFES ; Move 3 to the lifes
    MOVE    #0, {SP}+SCOREDIGIT1 ; Move 0 to the 1st score digit
    MOVE    #0, {SP}+SCOREDIGIT2 ; Move 0 to the 2nd score digit

    ; **********************Set the 7-segment***********************   
    ; Display Life
    MOVE    {SP}+LIFES, A
    MOVE    #LIFEPOS, B
    CALL    _DisplayHexaDigit

    ; Display separator
    MOVE    #1, A
    RL      A
    RL      A
    RL      A
    RL      A
    RL      A
    RL      A
    MOVE    A, _DIGIT1

    ; Display
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B
    CALL    DISPLAYDIGIT

    ; Display
    MOVE    {SP}+SCOREDIGIT2, A
    MOVE    #SCOREPOS2, B
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

    ; Compare the second digit to update it
    COMP    #9, {SP}+SCOREDIGIT2 ; Score digit 2 is equal 9
    JUMP,EQ WIN ; YES -> Win the game
    ; NO -> Continue up second digit
    INC     {SP}+SCOREDIGIT2
    MOVE    #0, {SP}+SCOREDIGIT1 ; Reset the score digit 1

    ; Move variables
    MOVE    {SP}+SCOREDIGIT2, A
    MOVE    #SCOREPOS2, B

    ; Display
    CALL    DISPLAYDIGIT

    ; Move variables
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B

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

WIN:

    HALT

LOSE:

    HALT