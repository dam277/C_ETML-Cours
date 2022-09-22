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


ShipDown:

ShipUp:

ShipTop:

ShipBottom:

;**************************************************************   
;*************Place the ship at a precise place****************   
;**************************************************************   
PlaceShip:				;    
        ; Get the positions of ship 
        MOVE	#_PosY, Y		; Position X 
        MOVE	#_PosX, X		; Position Y 
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
