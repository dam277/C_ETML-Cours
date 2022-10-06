	BULLETY1 = 0; Position Y of the ship	   
	BULLETX1 = 1; Position X of the ship
    BULLETY2 = 2; Position Y of the ship	   
	BULLETX2 = 3; Position X of the ship
    BULLETY3 = 4; Position Y of the ship	   
	BULLETX3 = 5; Position X of the ship
	LENGTH = 6; Lenght of the array

    .LOC	0 
	SUB	#LENGTH, SP
	MOVE	#_BITMAPWIDTH, {SP}+BULLETX1
	MOVE	#4, {SP}+BULLETY1
    MOVE	#_BITMAPWIDTH, {SP}+BULLETX2
	MOVE	#12, {SP}+BULLETY2
    MOVE	#_BITMAPWIDTH, {SP}+BULLETX3
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
	CALL	PLACEBULLETS	; Draw the bullet

	PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

	CALL	PLACEBULLETS	; Erase the bullet

	JUMP	START		; Restart the method

;**************************************************************   
;*************Place the bullet at a precise place**************   
;************************************************************** 
PLACEBULLETS:
    ; Get the bullets position
    MOVE	{SP}+BULLETY1, Y
    MOVE    {SP}+BULLETX1, X
    CALL    PLACEBULLET

    MOVE	{SP}+BULLETY2, Y
    MOVE    {SP}+BULLETX2, X
    CALL    PLACEBULLET

    MOVE	{SP}+BULLETY3, Y
    MOVE    {SP}+BULLETX3, X
    CALL    PLACEBULLET

    RET
PLACEBULLET:
    ; Display bullet 
    PUSH	Y
    PUSH	X
    CALL	_NotPixel
    POP	    X
    POP	    Y
    RET