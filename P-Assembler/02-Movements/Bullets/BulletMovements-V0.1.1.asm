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
	MOVE	{SP}+BULLETX1, X
	MOVE	{SP}+BULLETY1, Y
	DEC		X		; Get left the bullet
BULLETLEFTMOVE:
	COMP	#1, X		; Touch the left of the screen
	JUMP,HS	BULLETLEFT	; No -> BULLETLEFT
	MOVE	#_BITMAPWIDTH, X		; Stay in position
BULLETLEFT:
	CALL	PLACEBULLET	; Draw the bullet
	MOVE	X, {SP}+BULLETX1

	PUSH	A
	MOVE	#10, A
	CALL	_WaitSec		; wait...
	POP	A

	CALL	PLACEBULLET	; Erase the bullet

	JUMP	BULLET		; Restart the method

;**************************************************************   
;*************Place the bullet at a precise place**************   
;**************************************************************   
PLACEBULLET:
    ; Display bullet 
    PUSH	Y
    PUSH	X
    CALL	_NotPixel
    POP	X
    POP	Y
    RET