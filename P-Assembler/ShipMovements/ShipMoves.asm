SHIPY	= 0	; position verticale du vaisseau
SHIPX	= 1	; position verticale du vaisseau
LENGTH	= 2	; longueur des variables sur la pile

SHIPDY	= 5	; hauteur totale du vaisseau

; Initialisation des variables
.LOC    0;
SUB     #LENGTH, SP;
MOVE    #_BITMAPHEIGHT/2, {SP}+SHIPY;
MOVE    #0, {SP}+SHIPX;
MOVE    {SP}+SHIPY, Y

; Dessine le vaiseau
CALL    INVSHIP;

LOOP:
        MOVE    _KEYBOARD, A;
        TEST    A:#_KEYBOARDDOWN; Touche Down pressée ?
        JUMP,EQ DOWN; Non -> Appelle DOWN
        INC     {SP}+SHIPY; Oui -> Descend le vaisseau

DOWN:
        TEST    A:#_KEYBOARDUP; Touche up pressée ?
        JUMP,EQ UP; Non -> UP
        DEC     {SP}+SHIPY; Oui -> Monte le vaisseau

UP:
        COMP    #SHIPDY/2, Y; Compare moitier de vaisseau avec Y pour le bas
        JUMP,HS TOP; Si supérieur ou égal
        MOVE    #SHIPDY/2, Y; Envoie la position à Y

TOP:
        COMP    #_BITMAPHEIGHT-(SHIPDY/2), Y; Compare moitier de vaisseau avec Y pour le haut
        JUMP,LS BOTTOM; Si inférieur ou égal
        MOVE	#_BITMAPHEIGHT-(SHIPDY/2), Y; Envoie la position à Y

BOTTOM:
        CALL    INVSHIP; Efface le vaisseau
        MOVE    Y, {SP}+SHIPY
        CALL    INVSHIP; Dessine le vaisseau
        JUMP    LOOP; Renvoie au début

INVSHIP:
        MOVE    #0, X
        MOVE    {SP}+SHIPY, Y

        ; Display Ship 

        DEC	Y               ;  
        CALL	_NotPixel	; 
        DEC	Y               ;  
        CALL	_NotPixel	;
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
        RET;