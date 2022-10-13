	BULLETY1 = 0; Position Y of the ship	   
	BULLETX1 = 1; Position X of the ship
    BULLETY2 = 2; Position Y of the ship	   
	BULLETX2 = 3; Position X of the ship
    BULLETY3 = 4; Position Y of the ship	   
	BULLETX3 = 5; Position X of the ship
    WIDTH = 6; Get the width of the console
	LENGTH = 7; Lenght of the array

    .LOC	0 
	SUB	#LENGTH, SP

    ; Get the width
    MOVE    #_BITMAPWIDTH, {SP}+WIDTH
    SUB     #1, {SP}+WIDTH

    ; Bullet 1
    MOVE	{SP}+WIDTH, B
	MOVE    B, {SP}+BULLETX1
	MOVE	#4, {SP}+BULLETY1

    ; Bullet 2
    SUB     #5, {SP}+WIDTH 
    MOVE	{SP}+WIDTH, B
    MOVE	B, {SP}+BULLETX2 
	MOVE	#12, {SP}+BULLETY2

    ; Bullet 3
    ADD     #2, {SP}+WIDTH
    MOVE	{SP}+WIDTH, B
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

	JUMP	START		; Restart the method

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