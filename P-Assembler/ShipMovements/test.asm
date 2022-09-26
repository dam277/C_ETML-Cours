	_PosY = 12;	   
	_PosX = 0;   
    _Score = 0;
    _Life = 3;
 
    .LOC	0 
 
; **************************************************************   
; ********************Start of the program**********************   
; **************************************************************   
Start:  
  
; **************************************************************   
; ***********************Move the ship**************************   
; **************************************************************   
SHIP: 
        CALL    PlaceShip       ;
        ; Get keyboard key
        MOVE    _KEYBOARD, A    ;
        TEST    A:#_KEYBOARDDOWN; IF -> Check if the down is active
        JUMP,EQ ShipDown        ; YES -> Get down placement
        JUMP    ShipUp          ; NO -> Get up placement

        MOVE    #5, A           ;
        CALL    _WaitSec        ;
        CALL    PlaceShip       ;

ShipDown:
        INC     {SP}+_PosY      ;
        CALL    PlaceShip       ;
ShipUp:
        DEC     {SP}+_PosY      ;
        CALL    PlaceShip       ;
ShipTop:

ShipBottom:

;**************************************************************   
;*************Place the ship at a precise place****************   
;**************************************************************   
PlaceShip:				;    
        
        ; Get the positions of ship 
        MOVE	#_PosY, Y		; Position Y 
        MOVE	#_PosX, X		; Position X 

        ; Display Ship 
        DEC	Y		            ;  
        CALL	_NotPixel		; 
        DEC	Y		            ;  
        CALL	_NotPixel		; suce
        INC X                   ;  
        CALL    _NotPixel       ; 
        INC Y                   ; 
        CALL    _NotPixel       ; 
        INC X                   ;  
        CALL    _NotPixel       ; 
        INC X                   ;  
        CALL    _NotPixel       ; 
        INC Y                   ; 
        CALL    _NotPixel       ; 
        INC X                   ;  
        CALL    _NotPixel       ; 
        INC X                   ;  
        CALL    _NotPixel       ; 
        INC X                   ;  
        CALL    _NotPixel       ; 
        DEC	X		            ; 
        DEC	X		            ; 
        DEC	X		            ; 
        INC	Y		            ; 
        CALL    _NotPixel       ; 
        DEC	X		            ; 
        CALL    _NotPixel       ; 
        DEC	Y		            ; 
        CALL    _NotPixel       ; 
        DEC	X		            ; 
        CALL    _NotPixel       ; 
        INC	Y		            ; 
        CALL    _NotPixel       ; 
        DEC	X		            ; 
        CALL    _NotPixel       ; 
        INC	Y		            ; 
        CALL    _NotPixel       ; 
        INC X                   ;  
        CALL    _NotPixel       ;
        











HALT
