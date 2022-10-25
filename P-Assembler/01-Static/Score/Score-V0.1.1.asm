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

    ; Display score
    ; Digit 1
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B
    CALL    _DisplayHexaDigit

    ;Digit 2
    MOVE    {SP}+SCOREDIGIT2, A
    MOVE    #SCOREPOS2, B
    CALL    _DisplayHexaDigit

    ; **************************************************************   
    ; ********************Start of the program**********************   
    ; **************************************************************   
    START:  

    ; **************************************************************   
    ; *************************Score turn***************************   
    ; **************************************************************   
    SCORE: 



    CALL SCORE