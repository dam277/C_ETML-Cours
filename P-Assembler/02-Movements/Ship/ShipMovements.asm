	SHIPY = 0; Position Y of the ship	   
	SHIPX = 1; Position X of the ship
	LENGTH = 2; Lenght of the array

    .LOC	0 
	SUB	#LENGTH, SP
	MOVE	#0, {SP}+SHIPX
	MOVE	#12, {SP}+SHIPY 
	MOVE	#12, Y
 
; **************************************************************   
; ********************Start of the program**********************   
; **************************************************************   
START:  

  
; **************************************************************   
; *************************Ship turn****************************   
; **************************************************************   
SHIP: 
	MOVE	{SP}+SHIPY, Y

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

	JUMP	SHIP		; Restart the method

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