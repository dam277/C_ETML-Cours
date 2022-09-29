; ETML
; Author : Kendy Song
; Date : 15.09.2022
; Summary : Simple version of Crossy Road game

;Hardware const
SCREEN_WIDTH  = 32
SCREEN_HEIGHT = 24

KEYBOARD_TOP   = 16
KEYBOARD_BOT   = 8
KEYBOARD_RIGHT = 64
KEYBOARD_LEFT  = 32

;Road settings
ROAD_LINE_UP 	 = 2
ROAD_LINE_BOT 	 = 21
ROAD_LINE_MID 	 = 11
ROAD_LINE_LENGTH = 5

;Player settings
PLAYER_START_X = SCREEN_WIDTH / 2
PLAYER_START_Y = SCREEN_HEIGHT - 1

;Variable player
PLAYER_X = H'600
PLAYER_Y = H'601

;Variable car
CAR_BOT_X = H'602
CAR_BOT_Y = H'603

START :
	;Init player position
	MOVE 	#PLAYER_START_X, PLAYER_X
	MOVE 	#PLAYER_START_Y, PLAYER_Y
	MOVE	#0, X
	
INIT_BORDER :
	;Set coordinate and draw lines
	MOVE 	#ROAD_LINE_UP, Y
	CALL 	_SetPixel
	MOVE	 #ROAD_LINE_MID, Y
	CALL 	_SetPixel
	MOVE	 #ROAD_LINE_BOT, Y
	CALL 	_SetPixel

	INC	 	X
	
	;For loop (draw lines)
	COMP 	#SCREEN_WIDTH, X
	JUMP 	LO, INIT_BORDER

INIT_CAR :
	MOVE	#0, CAR_BOT_X
	MOVE	#15, CAR_BOT_Y
	
GAME_LOOP :
	;Update game
	JUMP	MOVE_CAR_RIGHT

	;Draw bot car
	DRAW_CAR_BOT :
		MOVE 	CAR_BOT_X, X
		MOVE 	CAR_BOT_Y, Y
		CALL	_SetPixel
	
	;Check collision with player
	MOVE 	CAR_BOT_X, X 
	MOVE 	PLAYER_X,  Y
	COMP	X, Y
	JUMP	EQ,	CHECK_COLLISION_BOT_PLAYER

	MOVE_PLAYER :
		COMP	#KEYBOARD_TOP, H'C07
		JUMP	EQ, PLAYER_INC_TOP
		COMP	#KEYBOARD_BOT, H'C07
		JUMP	EQ, PLAYER_INC_BOT
		COMP	#KEYBOARD_RIGHT, H'C07
		JUMP	EQ, PLAYER_INC_RIGHT
		COMP 	#KEYBOARD_LEFT, H'C07
		JUMP	EQ,	PLAYER_INC_LEFT

	;Draw player
	AFTER_MOVE :	
		MOVE 	PLAYER_X, X
		MOVE	PLAYER_Y, Y
		CALL	_SetPixel

		JUMP 	GAME_LOOP

;;;;;;;;;;;;;;;COLLISION CHECK;;;;;;;;;;;;;;;
CHECK_COLLISION_BOT_PLAYER :
	MOVE 	CAR_BOT_Y, X 
	MOVE 	PLAYER_Y, Y 
	COMP	X, Y
	JUMP	EQ, DEATH
	JUMP	MOVE_PLAYER

;;;;;;;;;;;;;;;GAME EVENT;;;;;;;;;;;;;;;
DEATH : 
	MOVE #0, X 
	MOVE #0, Y 
	CALL _SetPixel

;;;;;;;;;;;;;;;CAR;;;;;;;;;;;;;;;
MOVE_CAR_RIGHT :
	CALL 	CLEAR_CAR
	INC		CAR_BOT_X
	JUMP	DRAW_CAR_BOT

MOVE_CAR_LEFT  :
	CALL CLEAR_CAR
	DEC 	CAR_BOT_X
	JUMP	DRAW_CAR_BOT

CLEAR_CAR :
	MOVE	CAR_BOT_X, X 
	MOVE 	CAR_BOT_Y, Y
	CALL	_ClrPixel
	RET

;;;;;;;;;;;;;;;PLAYER;;;;;;;;;;;;;;;
CLEAR_PLAYER :
	MOVE	PLAYER_X, X
	MOVE	PLAYER_Y, Y
	CALL	_ClrPixel
	RET

PLAYER_INC_TOP :
	CALL CLEAR_PLAYER
	DEC 	PLAYER_Y
	JUMP	AFTER_MOVE

PLAYER_INC_BOT :
	CALL CLEAR_PLAYER
	INC		PLAYER_Y
	JUMP	AFTER_MOVE

PLAYER_INC_RIGHT :
	CALL CLEAR_PLAYER
	INC		PLAYER_X
	JUMP	AFTER_MOVE

PLAYER_INC_LEFT :
	CALL CLEAR_PLAYER
	DEC 	PLAYER_X
	JUMP	AFTER_MOVE