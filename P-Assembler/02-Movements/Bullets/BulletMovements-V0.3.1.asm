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
	LENGTH = 10; Lenght of the array



    .LOC	0 
	SUB	#LENGTH, SP

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
 
; **************************************************************   
; ********************Start of the program**********************   
; **************************************************************   
START:  
  
; **************************************************************   
; *************************Bullet turn**************************   
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

; Check the positions of the bullets
NEWBULLET1POSITION:
    MOVE    {SP}+BULLETX1, X ; Is not at position 0
    COMP    #0, X
    JUMP,HI NEWBULLET2POSITION ; NO -> NEWBULLET2POSITION
    MOVE    #_BITMAPWIDTH, {SP}+BULLETX1
    ; YES -> Move the bullet
    MOVE    {SP}+RNDB1, Y      
    MOVE    Y, {SP}+BULLETY1

NEWBULLET2POSITION:
    MOVE    {SP}+BULLETX2, X ; Is not at position 0
    COMP    #0, X
    JUMP,HI NEWBULLET3POSITION ; NO -> NEWBULLET2POSITION
    MOVE    #_BITMAPWIDTH, {SP}+BULLETX2
    ; YES -> Move the bullet
    MOVE    {SP}+RNDB2, Y      
    MOVE    Y, {SP}+BULLETY2

NEWBULLET3POSITION:
    MOVE    {SP}+BULLETX3, X ; Is not at position 0
    COMP    #0, X
    JUMP,HI START ; NO -> NEWBULLET2POSITION
    MOVE    #_BITMAPWIDTH, {SP}+BULLETX3
    ; YES -> Move the bullet
    MOVE    {SP}+RNDB3, Y      
    MOVE    Y, {SP}+BULLETY3

	JUMP	START		; Restart the method

RANDOM1:
    MOVE    #0, {SP}+RNDB1
    JUMP    BACKRANDOM2
RANDOM2:
    MOVE    #_BITMAPHEIGHT, {SP}+RNDB2
    JUMP    BACKRANDOM3
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