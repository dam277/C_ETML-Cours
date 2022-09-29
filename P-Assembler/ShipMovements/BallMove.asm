; Initialisation des variables
.LOC    0;
CLR X
MOVE    #0, X
MOVE    #3, Y
MOVE    Y, B

; Dessine la balle
CALL    TRUC;
UP:
    MOVE    _KEYBOARD, A;
    TEST    A:#_KEYBOARDDOWN; Touche Down pressée ?
    JUMP,EQ DOWN; Non -> Appelle DOWN
    INC     B;
    CALL    LOOP

DOWN:
    MOVE    _KEYBOARD, A;
    TEST    A:#_KEYBOARDUP; Touche up pressée ?
    JUMP,EQ UP; Non -> UP
    DEC     B;
    CALL    LOOP;
LOOP:
; Allume la balle
    INC Y
    MOVE    #0, X
    CALL    TRUC;
    MOVE    #50, A
    CALL    _WaitSec
    MOVE    B, Y
    CALL    TRUC
    CALL    UP



TRUC:
    PUSH    X
    PUSH    Y

    INC Y
    CALL _NotPixel
    INC X
    CALL _NotPixel
    INC X
    CALL _NotPixel
    INC X
    CALL _NotPixel
    INC X
    CALL _NotPixel

    POP X
    POP Y
    RET