	BULLETY1 = 0; Position Y of the first bullet	   
	BULLETX1 = 1; Position X of the first bullet	
    BULLETY2 = 2; Position Y of the second bullet		   
	BULLETX2 = 3; Position X of the second bullet	
    BULLETY3 = 4; Position Y of the third bullet		   
	BULLETX3 = 5; Position X of the third bullet	
    OFFSET = 6; Get the width of the console
    RNDB1 = 7;Random bullet 1 height
    RNDB2 = 8;Random bullet 2 height
    RNDB3 = 9;Random bullet 3 height
    SCOREDIGIT1 = 10 ; Score (First digit on the 7segment) 0, 1, 2, 3
    SCOREDIGIT2 = 11 ; Score (Second digit on the 7segment) 00 10, 20, 30
    LIFES = 12 ; Lifes of the ship
    SHIPY = 13; Position Y of the ship	   
	SHIPX = 14; Position X of the ship
	LENGTH = 15; Lenght of the array

    ; Constants
    LIFEPOS = 0 ; Position of the life in the 7-segment
    SCOREPOS1 = 3 ; Position of the score digit in the 7-segment
    SCOREPOS2 = 2 ; Position of the 2nd score digit in the 7-segment

    .LOC	0 
	SUB	#LENGTH, SP

    ; Set the ship position
    MOVE	#0, {SP}+SHIPX
	MOVE	#12, {SP}+SHIPY 
	MOVE	#12, Y

    ; Set the score and life
    MOVE    #3, {SP}+LIFES ; Move 3 to the lifes
    MOVE    #0, {SP}+SCOREDIGIT1 ; Move 0 to the 1st score digit
    MOVE    #0, {SP}+SCOREDIGIT2 ; Move 0 to the 2nd score digit

    ; Get the width - 1
    MOVE    #_BITMAPWIDTH, {SP}+OFFSET

    ; Bullet 1
    MOVE	{SP}+OFFSET, B
	MOVE    B, {SP}+BULLETX1
	MOVE	#4, {SP}+BULLETY1

    ; Bullet 2
    SUB     #5, {SP}+OFFSET 
    MOVE	{SP}+OFFSET, B
    MOVE	B, {SP}+BULLETX2 
	MOVE	#12, {SP}+BULLETY2

    ; Bullet 3
    ADD     #2, {SP}+OFFSET
    MOVE	{SP}+OFFSET, B
    MOVE	B, {SP}+BULLETX3
	MOVE	#20, {SP}+BULLETY3

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
; *************************Ship turn****************************   
; **************************************************************   
SHIP: 
	MOVE	{SP}+SHIPY, Y
    MOVE    {SP}+SHIPX, X

	MOVE	_KEYBOARD, A
	TEST	A :#_KEYBOARDDOWN ;  Down key pressed ?
	JUMP,EQ	SHIPDOWN		; No -> SHIPDOWN
	INC	Y		; Get bottom the ship
SHIPDOWN:
	TEST	A :#_KEYBOARDUP	; Up key pressed ?
	JUMP,EQ	SHIPUP		; No -> SHIPUP
	DEC	Y		; Get up the ship
SHIPUP:
	COMP	#2, Y		; Touch the top of the screen
	JUMP,HS	SHIPTOP		; No -> SHIPTOP
	MOVE	#2, Y		; Stay in position
SHIPTOP:
	COMP	#_BITMAPHEIGHT-(3), Y; touch the bottom of the screen
	JUMP,LS	SHIPBOTTOM		; No -> SHIPBOTTOM
	MOVE	#_BITMAPHEIGHT-(3), Y; Stay in position
SHIPBOTTOM:

	CALL	PLACESHIP	; Draw the ship
	MOVE	Y, {SP}+SHIPY

	PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

	CALL	PLACESHIP	; Erase the ship

; **************************************************************   
; *************************Bullets turn*************************   
; **************************************************************   
BULLET: 
	DEC		{SP}+BULLETX1		; Get left the bullet
	DEC		{SP}+BULLETX2		; Get left the bullet
	DEC		{SP}+BULLETX3		; Get left the bullet
BULLETLEFT:
	; Get the bullets position and place bullets
    MOVE	{SP}+BULLETY1, Y
    MOVE    {SP}+BULLETX1, X
    CALL    PLACEBULLET

    MOVE	{SP}+BULLETY2, Y
    MOVE    {SP}+BULLETX2, X
    CALL    PLACEBULLET

    MOVE	{SP}+BULLETY3, Y
    MOVE    {SP}+BULLETX3, X
    CALL    PLACEBULLET

	PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

	; Get the bullets position and erase bullets
    MOVE	{SP}+BULLETY1, Y
    MOVE    {SP}+BULLETX1, X
    CALL    PLACEBULLET

    MOVE	{SP}+BULLETY2, Y
    MOVE    {SP}+BULLETX2, X
    CALL    PLACEBULLET

    MOVE	{SP}+BULLETY3, Y
    MOVE    {SP}+BULLETX3, X
    CALL    PLACEBULLET

    ADD     #1, {SP}+RNDB1
    COMP    #_BITMAPHEIGHT, {SP}+RNDB1
    JUMP,EQ RANDOM1
BACKRANDOM2:
    SUB     #1, {SP}+RNDB2
    COMP    #1, {SP}+RNDB2
    JUMP,EQ RANDOM2
BACKRANDOM3:
    ADD     #1, {SP}+RNDB3
    COMP    #_BITMAPHEIGHT, {SP}+RNDB3
    JUMP,EQ RANDOM3

; **************************************************************   
; ***********Check the positions of the first bullet************   
; **************************************************************   
NEWBULLET1POSITION:
    MOVE    {SP}+BULLETX1, X ; Is not at position 0
    COMP    #0, X
    JUMP,HI NEWBULLET2POSITION ; NO -> NEWBULLET2POSITION
    MOVE    #_BITMAPWIDTH, {SP}+BULLETX1
    ; YES -> Move the bullet
    MOVE    {SP}+RNDB1, Y      
    MOVE    Y, {SP}+BULLETY1

; **************************************************************   
; ****************Score update of first bullet******************   
; **************************************************************   
SCORE1: 

    COMP    #9, {SP}+SCOREDIGIT1 ; Score digit 1 is equal 9
    JUMP,EQ UPDATE1DIGIT2
 
    ; Increment score
    INC     {SP}+SCOREDIGIT1

    ; Move variables
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B

    ; Display
    CALL    DISPLAYDIGIT

    JUMP    NEWBULLET2POSITION

UPDATE1DIGIT2:

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

; **************************************************************   
; ***********Check the positions of the second bullet***********   
; **************************************************************   
NEWBULLET2POSITION:
    MOVE    {SP}+BULLETX2, X ; Is not at position 0
    COMP    #0, X
    JUMP,HI NEWBULLET3POSITION ; NO -> NEWBULLET2POSITION
    MOVE    #_BITMAPWIDTH, {SP}+BULLETX2
    ; YES -> Move the bullet
    MOVE    {SP}+RNDB2, Y      
    MOVE    Y, {SP}+BULLETY2

; **************************************************************   
; ****************Score update of second bullet*****************   
; **************************************************************   
SCORE2: 

    COMP    #9, {SP}+SCOREDIGIT1 ; Score digit 1 is equal 9
    JUMP,EQ UPDATE2DIGIT2
 
    ; Increment score
    INC     {SP}+SCOREDIGIT1

    ; Move variables
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B

    ; Display
    CALL    DISPLAYDIGIT

    JUMP    NEWBULLET3POSITION

UPDATE2DIGIT2:

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

; **************************************************************   
; ***********Check the positions of the third bullet************   
; **************************************************************   
NEWBULLET3POSITION:
    MOVE    {SP}+BULLETX3, X ; Is not at position 0
    COMP    #0, X
    JUMP,HI START ; NO -> NEWBULLET2POSITION
    MOVE    #_BITMAPWIDTH, {SP}+BULLETX3
    ; YES -> Move the bullet
    MOVE    {SP}+RNDB3, Y      
    MOVE    Y, {SP}+BULLETY3

; **************************************************************   
; ****************Score update of second bullet*****************   
; **************************************************************   
SCORE3: 

    COMP    #9, {SP}+SCOREDIGIT1 ; Score digit 1 is equal 9
    JUMP,EQ UPDATE3DIGIT2
 
    ; Increment score
    INC     {SP}+SCOREDIGIT1

    ; Move variables
    MOVE    {SP}+SCOREDIGIT1, A
    MOVE    #SCOREPOS1, B

    ; Display
    CALL    DISPLAYDIGIT

    JUMP    RESTART

UPDATE3DIGIT2:

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

; **************************************************************   
; *********************Restart the loop*************************   
; **************************************************************  
RESTART:
    
    JUMP	START		; Restart the method

; **************************************************************   
; ****************Reset the random 1 variable*******************   
; **************************************************************  
RANDOM1:
    MOVE    #0, {SP}+RNDB1
    JUMP    BACKRANDOM2

; **************************************************************   
; ****************Reset the random 2 variable*******************   
; **************************************************************  
RANDOM2:
    MOVE    #_BITMAPHEIGHT, {SP}+RNDB2
    JUMP    BACKRANDOM3

; **************************************************************   
; ****************Reset the random 3 variable*******************   
; **************************************************************  
RANDOM3:
    MOVE    #0, {SP}+RNDB3
    JUMP    NEWBULLET1POSITION

;**************************************************************   
;*************Place the bullet at a precise place**************   
;************************************************************** 
PLACEBULLET:
    ; Display bullet 
    PUSH	Y
    PUSH	X
    CALL	_NotPixel
    POP	    X
    POP	    Y
    RET

;**************************************************************   
;******Place the digits at a precise place for the score*******   
;************************************************************** 
DISPLAYDIGIT:
    PUSH    A
    PUSH    B
    CALL    _DisplayHexaDigit
    POP     A
    POP     B
    RET

; **************************************************************   
; **************************Win the game************************   
; **************************************************************   
WIN:

	CLR	    B		; rank of the letter
	MOVE	#0, X		; coord x
	MOVE	#1, Y		; coord y

WINLOOP:
	PUSH	X
	MOVE	B, X
	MOVE	TABLEWIN+{X}, A	; letter to display
	POP	X
	JUMP,EQ	ENDWIN		; if end of table -> END

	CALL	_DrawChar	; Display a letter

	INC	X		; next X coord
	INC	B		; next letter

    PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

	JUMP	WINLOOP		; restart

ENDWIN:
	HALT

	TABLE	#8+1	; 8 letters + end of table

; **************************************************************   
; *********************Table of win letters*********************   
; **************************************************************  
TABLEWIN:
	BYTE	#"V"		; V
	BYTE	#"I"		; I
	BYTE	#"C"		; C
	BYTE	#"T"		; T
	BYTE	#"O"		; O
	BYTE	#"I"		; I
	BYTE	#"R"		; R
	BYTE	#"E"		; E
	BYTE	#0		; end of table

; **************************************************************   
; ************************Lose the game*************************   
; ************************************************************** 
LOSE:

	CLR	    B		; rank of the letter
	MOVE	#0, X		; coord x
	MOVE	#1, Y		; coord y

lOSELOOP:
	PUSH	X
	MOVE	B, X
	MOVE	TABLELOSE+{X}, A	; letter to display
	POP	X
	JUMP,EQ	ENDLOSE		; if end of table -> END

	CALL	_DrawChar	; Display a letter

	INC	X		; next X coord
	INC	B		; next letter

    PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

	JUMP	lOSELOOP	; restart

ENDLOSE:
	HALT

	TABLE	#8+1	; 8 letters + end of table

; **************************************************************   
; *********************Table of lose letters********************   
; **************************************************************  
TABLELOSE:
	BYTE	#"D"		; D
	BYTE	#"E"		; E
	BYTE	#"F"		; F
	BYTE	#"A"		; A
	BYTE	#"I"		; I
	BYTE	#"T"		; T
	BYTE	#"E"		; E
	BYTE	#"!"		; !
	BYTE	#0		; end of table

;**************************************************************   
;*************Place the ship at a precise place****************   
;**************************************************************   
PLACESHIP:
    ; Display Ship 
    PUSH	Y
    PUSH	X
    DEC	Y
    CALL	_NotPixel
    DEC	Y	
    CALL	_NotPixel
    INC X             
    CALL    _NotPixel
    INC Y            
    CALL    _NotPixel
    INC X             
    CALL    _NotPixel
    INC X             
    CALL    _NotPixel
    INC Y           
    CALL    _NotPixel
    INC X            
    CALL    _NotPixel
    INC X             
    CALL    _NotPixel
    INC X             
    CALL    _NotPixel
    DEC	X
    DEC	X
    DEC	X
    INC	Y
    CALL    _NotPixel
    DEC	X
    CALL    _NotPixel
    DEC	Y
    CALL    _NotPixel
    DEC	X
    CALL    _NotPixel
    INC     Y
    CALL    _NotPixel
    DEC	X
    CALL    _NotPixel
    INC	Y
    CALL    _NotPixel
    INC     X 
    CALL    _NotPixel
    POP	X
    POP	Y
    RET