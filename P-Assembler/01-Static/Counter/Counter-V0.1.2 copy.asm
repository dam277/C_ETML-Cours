; **************************************************************   
; ************************Lose the game*************************   
; ************************************************************** 
LOSE:

	CLR	    B		; rank of the letter
	MOVE	#0, X		; coord x
	MOVE	#1, Y		; coord y

; *********************Display the lose text********************   
lOSELOOP:
	PUSH	X
	MOVE	B, X
	MOVE	TABLELOSE+{X}, A	; letter to display
	POP	X
	JUMP,EQ	ENDLOSE		; if end of table -> END

	CALL	_DrawChar	; Display a letter

	INC	X		; next X coord
	INC	B		; next letter

    ; wait
    PUSH	A
	MOVE	#30, A
	CALL	_WaitSec		
	POP	A

	JUMP	lOSELOOP	; restart

; **************************End the game************************  
ENDLOSE:
	HALT

	TABLE	#8+1	; 8 letters + end of table

; **************************************************************   
; *********************Table of lose letters********************   
; **************************************************************  
TABLELOSE:
	BYTE	#"D"		; D
	BYTE	#"E"		; E
	BYTE	#"F"		; F
	BYTE	#"A"		; A
	BYTE	#"I"		; I
	BYTE	#"T"		; T
	BYTE	#"E"		; E
	BYTE	#"!"		; !
	BYTE	#0		; end of table
