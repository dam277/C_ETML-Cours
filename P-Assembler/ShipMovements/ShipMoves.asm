SHIPY	= 0	; position verticale du vaisseau
SHIPX	= 1	; position verticale du vaisseau
WALL	= 2	; position du mur vertical
SOLID	= 3	; solidité du mur restante
LENGTH	= 4	; longueur des variables sur la pile

SHIPDY	= 5	; hauteur totale du vaisseau

; Initialisation des variables
.LOC    0;
SUB     #LENGTH, SP;
MOVE    #_BITMAPHEIGHT/2, {SP}+SHIPY;
MOVE    #0, {SP}+SHIPX;

; Envoye la position du vaisseau dans Y et X
MOVE    {SP}+SHIPY, Y;
MOVE	{SP}+SHIPX, X

; Dessine le vaiseau
CALL    PlaceShip;

LOOP:
        MOVE    _KEYBOARD, A;
        TEST    A:#_KEYBOARDDOWN; Touche Down pressée ?
        JUMP,EQ DOWN; Non -> Appelle DOWN
        INC     Y; Oui -> Descend le vaisseau

DOWN:
        TEST    A:#_KEYBOARDUP; Touche up pressée ?
        JUMP,EQ UP; Non -> UP
        DEC     Y; Oui -> Monte le vaisseau

UP:
        COMP    #SHIPDY/2, Y; Compare moitier de vaisseau avec Y pour le bas
        JUMP,HS TOP; Si supérieur ou égal
        MOVE    #SHIPDY/2, Y; Envoie la position à Y

TOP:
        COMP    #_BITMAPHEIGHT-(SHIPDY/2), Y; Compare moitier de vaisseau avec Y pour le haut
        JUMP,LS BOTTOM; Si inférieur ou égal
        MOVE	#_BITMAPHEIGHT-(SHIPDY/2), Y; Envoie la position à Y

PlaceShip:				;
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
        CALL    LOOP;