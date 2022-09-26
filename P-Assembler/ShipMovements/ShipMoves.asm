SHIPY	= 0	; position verticale du vaisseau
SHIPX	= 1	; position verticale du vaisseau
WALL	= 2	; position du mur vertical
SOLID	= 3	; solidité du mur restante
LENGTH	= 4	; longueur des variables sur la pile

SHIPDY	= 6	; hauteur totale du vaisseau

.LOC    0;
SUB     #LENGTH, SP;
MOVE    #_BITMAPHEIGHT/2, {SP}+SHIPY;
MOVE    #0, {SP}+SHIPX;

MOVE    {SP}+SHIPY, Y;
CALL    PlaceShip;

PlaceShip:				;    
        ; Get the positions of ship 
        MOVE	{SP}+SHIPY, X
        ; Display Ship 
        DEC	Y		            ;  
        CALL	_NotPixel		; 
        DEC	Y		            ;  
        CALL	_NotPixel		;
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
        HALT;