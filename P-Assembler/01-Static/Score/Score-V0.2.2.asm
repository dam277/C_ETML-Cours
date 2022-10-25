    SCOREDIGIT1 = 0 ; Score (First digit on the 7segment) 0, 1, 2, 3
    SCOREDIGIT2 = 1 ; Score (Second digit on the 7segment) 00 10, 20, 30
    LIFES = 2 ; Lifes of the ship
    LENGTH = 3 ; Lenght of the array

    ; Constants
    LIFEPOS = 0 ; Position of the life in the 7-segment
    SCOREPOS1 = 2 ; Position of the 1st score digit in the 7-segment
    SCOREPOS2 = 3 ; Position of the 2nd score digit in the 7-segment

    .LOC    0
    SUB #LENGTH, SP

    ; Set the score
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

    
; **************************************************************   
; ********************Start of the program**********************   
; **************************************************************   
START:  

; **************************************************************   
; *************************Score turn***************************   
; **************************************************************   
SCORE: 

    CALL DISPLAYSCORE

    PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A
 
    ; Compare the second digit to update it
    COMP    #9, {SP}+SCOREDIGIT2 ; Score digit 2 is equal 9
    JUMP,EQ UPDATEDIGIT1 ; YES -> Update the second digit
    ; NO -> Continue up second digit
    INC     {SP}+SCOREDIGIT2

    JUMP SCORE

UPDATEDIGIT1:

    ; Compare the first digit to update it
    COMP    #9, {SP}+SCOREDIGIT1 ; Score digit 1 is equal to 9
    JUMP,EQ WIN  ; YES -> Win the game
    ; NO -> Continue up first digit
    INC     {SP}+SCOREDIGIT1
    MOVE    #0, {SP}+SCOREDIGIT2

    JUMP SCORE

DISPLAYSCORE:
    ; Display score
    PUSH    A
    PUSH    B
    ; Digit 1
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B
    CALL    _DisplayHexaDigit

    ;Digit 2
    MOVE    {SP}+SCOREDIGIT2, A
    MOVE    #SCOREPOS2, B
    CALL    _DisplayHexaDigit
    POP     A
    POP     B
    RET

WIN: