POSX	= 0	; position en X
POSY	= 1	; position en Y

BALLDY	= 1	; hauteur totale de la balle


.LOC	0

LOOP:
    MOVE    {SP}+POSY, Y            ;

    MOVE    _KEYBOARD, A            ;
    TEST    A:#_KEYBOARDDOWN        ;
    JUMP,EQ DOWN1                   ;

DOWN1:
    TEST    A :#_KEYBOARDU          ;
    JUMP,EQ UP1;
    DEC     Y;

UP1:
    COMP    #BALLDY/2, Y
    JUMP,HS TOP1
    MOVE    #BALLDY/2, Y

TOP1:
    COMP    #_BITMAPHEIGHT-(BALLDY/2), Y
    JUMP,LS	BOTTOM1
    MOVE	#_BITMAPHEIGHT-(BALLDY/2), Y

BOTTOM1:
