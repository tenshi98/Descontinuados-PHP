<%Function FechaAVer(Fecha)
	if trim(Fecha) <> "" then
		Dia_ = day(Fecha)
		if len(Dia_) = 1 then
			Dia_ = "0" & Dia_
		end if
		Mes_ = Month(Fecha)
		if len(Mes_) = 1 then
			Mes_ = "0" & Mes_
		end if
		Ano_ = Year(Fecha)
		
		FechaAVer = Dia_ & "/" & Mes_ & "/" & Ano_
	else
		FechaAVer = ""
	end if
end function%>


<%Function StrToFecha(Fecha,Tipo)
	Dim Ciclo,DMA 
	Dim D,M,A,tmp
	DMA = 0
	if trim(Fecha)="" then
		StrToFecha = ""
	end if
	if not isnull(Fecha) and trim(Fecha)<> "" then
		Select Case Tipo
		Case "Cumpleano"
			StrToFecha = Mid(Fecha,7,2) & "-"
			StrToFecha = StrToFecha & Mes(Mid(Fecha,5,2))
		Case Else
			tmp = ""
			if Instr(Fecha,"/") > 0 or Instr(Fecha,"-") > 0 then
				For Ciclo = 1 to len(Fecha)
					if Mid(Fecha,Ciclo,1) = "/" or Mid(Fecha,Ciclo,1) = "-" Then
						Select Case DMA
							Case 0
								D = String(2-Len(tmp),"0") & tmp
								tmp = ""
								Ciclo=Ciclo+1
							Case 1
								M = String(2-Len(tmp),"0") & tmp
								tmp = ""
								Ciclo=Ciclo+1
						End Select
						DMA = DMA +1
					End If
					tmp = tmp & Mid(Fecha,Ciclo,1)
				Next
				If Len(tmp) < 4 Then	
				   A = "20" & tmp
				Else
				   A = tmp
				End If   
				StrToFecha = A & M & D
				'StrToFecha = Mid(Fecha,7,4)
				'StrToFecha = StrToFecha & Mid(Fecha,4,2)
				'StrToFecha = StrToFecha & Mid(Fecha,1,2)
			else	
				StrToFecha = Mid(Fecha,7,2) & "/"
				StrToFecha = StrToFecha & Mid(Fecha,5,2) & "/"
				StrToFecha = StrToFecha & Mid(Fecha,1,4)
			end if 
		End Select
	else
		StrToFecha = ""
	end if
End Function%>


<%Function FormatFecha(Fecha,Tipo)
	Select Case Tipo
		Case "date"
		Case "string"
			FormatFecha = Day(Fecha) & " de " & Mes(Month(Fecha)) & " del año " & Year(Fecha)
	End Select
End Function%>

<%Function Mes(M)
	Select Case M
		Case 1
			Mes = "Enero"
		Case 2
			Mes = "Febrero"
		Case 3
			Mes = "Marzo"
		Case 4
			Mes = "Abril"
		Case 5
			Mes = "Mayo"
		Case 6
			Mes = "Junio"
		Case 7
			Mes = "Julio"
		Case 8
			Mes = "Agosto"
		Case 9
			Mes = "Septiembre"
		Case 10
			Mes = "Octubre"
		Case 11
			Mes = "Noviembre"
		Case 12
			Mes = "Diciembre"
	End Select
End Function%>

<%Function DiasDelMes(Mes,Agno)
	Dim Res 
	Select Case Mes
		Case 1,3,5,7,8,10,12   '31
			DiasDelMes=31
		Case 2                 'Febrero
			Res = Agno Mod 4
			If Res = 0 Then 
				DiasDelMes=29
			Else
			    DiasDelMes=28
			End If
		Case 4,6,9,11          '30
			DiasDelMes=30
	End Select
End Function%>

<%Sub ValidaTexto
	Select Case window.event.keyCode 
		case asc("0")				
			window.event.keyCode = 0
		case asc("1")
			window.event.keyCode = 0
		case asc("2")
			window.event.keyCode = 0
		case asc("3")
			window.event.keyCode = 0
		case asc("4")
			window.event.keyCode = 0
		case asc("5")
			window.event.keyCode = 0
		case asc("6")
			window.event.keyCode = 0
		case asc("7")
			window.event.keyCode = 0
		case asc("8")
			window.event.keyCode = 0
		case asc("9")
			window.event.keyCode = 0
	End Select
End Sub%>

<%Function DigitoRut(numero)
	if trim(numero) = "" then
		return
	end if
	Escala = "32765432"
	l = Len(Trim(numero))
	E = Len(Trim(Escala))
	l = E-l
	For i= 1 To l
		numero = "0" & numero
	Next
	For x = 1 To E	
		Suma = Suma + (cint(Mid(numero,x,1)) * cint(Mid(Escala,x,1)))
	Next
	Resto = Suma mod 11
	Dig   = cstr(11 - Resto)
	If Dig = "10" Then
		DigitoRut = "K"
	Elseif Dig = "11" Then
	    DigitoRut = "0"
	else
	    DigitoRut = Dig
	End if    
End Function%>

<%Function FechaHora(QueCosa)
	If QueCosa="F" Then
		Fecha1 = Date()
		Fecha = Cstr(Year(fecha1))
		if len (Cstr(Month(fecha1)))=1 then 
			Fecha= Fecha & "0" & Cstr(Month(fecha1))
		else
			Fecha= Fecha & Cstr(Month(fecha1))
		end if	
		If day(fecha1)< 10 Then
			Fecha = Fecha & "0" &Cstr(Day(fecha1))
		Else
			Select Case Day(Date())
				Case 10
					Fecha = Fecha & "10"
				Case 20
					Fecha = Fecha & "20"
				Case 30
					Fecha = Fecha & "30"
				Case Else
					Fecha = Fecha & Cstr(Day(Date()))
			End select
		End If
		FechaHora=Fecha
	Else
		Hora = Hour(Time)
		If len(hora)=1 Then Hora="0"&Hora End If
			Minuto = Minute(Time)
		If len(Minuto)=1 Then minuto="0"&Minuto End If
			Segundo = Second(time)
		If len(Segundo)=1 Then segundo="0"&Segundo End If
			Hora=Hora&Minuto&Segundo
			FechaHora=Hora
	End IF
End Function%>

<%function gatos(pal)
if not isnull(pal) then
	if trim(pal)<>"" then
		pal = replace(pal,"#","Ñ")
		pal = replace(pal,"¦","ñ")
		gatos = pal
	else
		gatos = ""
	end if
end if
end function%>

<%Function StrToHora(Hora)
	Dim Ciclo,DMA 
	Dim H,M,S,tmp
	DMA = 0
	if Hora="" then
		StrToHora = ""
	end if
	if not isnull(Hora) then
		tmp = ""
		if Instr(Hora,":") > 0 then
			For Ciclo = 1 to len(Hora)
				if Mid(Hora,Ciclo,1) = ":" Then
					Select Case DMA
					Case 0
						H = String(2-Len(tmp),"0") & tmp
						tmp = ""
						Ciclo=Ciclo+1
					Case 1
						M = String(2-Len(tmp),"0") & tmp
						tmp = ""
						Ciclo=Ciclo+1
					End Select
					DMA = DMA +1
				End If
				tmp = tmp & Mid(Hora,Ciclo,1)
			Next
			A = tmp
			StrToHora = H & M & A
		else
			StrToHora = Mid(Hora,1,2) & ":"
			StrToHora = StrToHora & Mid(Hora,3,2) & ":"
			StrToHora = StrToHora & Mid(Hora,5,2)
		end if
	else
		StrToHora = ""
	end if
End Function%>

<%
Function LlenaCeros(Cod)
	if isnull(cod) then
		exit function
	end if
	Select case Len(Cod)
		Case 1
			LlenaCeros = "00" & Cod
		Case 2
			LlenaCeros = "0" & Cod
		case else
			LlenaCeros = Cod
	End Select
end function%>

<%
 Function CleanTheString(theString)  'Remueve todos los caracteres que no esten contenidos en el string siguiente
     strAlphaNumeric = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑ.,:;+-_¿?¡!/()[]{}<>ºª=*@"
     For i = 1 to len(theString)
         strChar = mid(theString,i,1)
         If instr(strAlphaNumeric,strChar) Then
             CleanedString = CleanedString & strChar
         End If
     Next
     CleanTheString = CleanedString
 End Function
 %>

<%Function Capitaliza(Texto)
	Dim Salida, Ini, Pos
	Texto = Trim(Texto)
	If Texto <> "" Then
		'La primera queda automaticamente como Mayuscula
		Salida = UCase(Left(Texto,1)) & LCase(right(Texto,len(Texto)-1))
		Ini = 1
		While Instr(Ini,Texto,chr(32),1) > 0
			Ini = Instr(Ini,Texto,chr(32),1) + 1
			Salida = left(Salida,Ini-1)
			Salida = Salida & UCase(Mid(Texto,Ini,1))
			Salida = Salida & LCase(right(Texto,Len(Texto)-Ini))
		Wend
	Else
		Salida = Texto	
	End If
	Capitaliza = Salida
End Function

function par (numero)
	dim nro
	par = false
	nro = numero mod 2	
    if  nro = 1 then
	par = true
	else
	par = false
	end if
 end function
%>

<%
'Remueve todo el codigo HTML de la variable contenida en string
'Sintaxis :       string = StripHTML(string)

Private Function StripHTML(byVal string)
	Dim lngStart, lngEnd, strHTML
	string = Replace( string, vbTab, "" )
	string = Replace( string, vbCrLf, "" )
	string = Trim( string )
	do
		lngStart = Instr(string, "<")
		lngEnd   = InStr(string, ">")
		strHTML  = Mid( string, lngStart, _
			   lngEnd - lngStart + 1)
		string   = Trim(  Replace( string, strHTML, "" )  )
	loop until Not Instr(string, "<") _
		AND Not Instr(string, ">")
	If Instr( string, "<" ) Then _
		string = StripHTML( Trim( string ) )
	StripHTML = Trim( string )
End Function
%>

<%
'Formateo de expresiones Numéricas
'Sintaxis :       string = Format(expression, format)
'Ejemplos:      Short Time:  <% = Format( datetime, "Short Time" ) %>
'                      Long Time:  <% = Format( datetime, "Long Time" ) %>
'	       Short Date:  <% = Format( datetime, "Short Date" ) %>
'	       Long Date:  <% = Format( datetime, "Long Date" ) %>
'                 General Date:  <% = Format( datetime, "General Date" ) %>
'            General Number:  <% = Format( num, "General Number" ) %>
'                        Currency:  <% = Format( num, "Currency" ) %>
'                             Fixed:  <% = Format( num, "Fixed" ) %>
'                       Standard:  <% = Format( num, "Standard" ) %>
'                         Percent:  <% = Format( num, "Percent" ) %>
'                          Yes/No:  <% = Format( num, "Yes/No" ) %>
'                    True/False:  <% = Format( num, "True/False" ) %>
'                           On/Off:  <% = Format( num, "On/Off" ) %>

Private Function Format(byVal expression, byVal strFormat)
	On Error Resume Next
	Select Case lcase( strFormat )
		Case "general date"
			Format = FormatDateTime(expression, 0)
		Case "long date"
			Format = FormatDateTime(expression, 1)
		Case "short date"
			Format = FormatDateTime(expression, 2)
		Case "long time"
			Format = FormatDateTime(expression, 3)
		Case "short time"
			Format = FormatDateTime(expression, 4)
		Case "general number"
			'  Format = Replace( expression, ",", "" )
                                                   Format = Replace( expression, ".", "" )
		Case "currency"
			Format = FormatCurrency(expression, 2)
		Case "fixed"
			'  Format = Replace( FormatNumber(expression,  2, -1), ",", "" )
			Format = Replace( FormatNumber(expression,  2, -1), ".", "" )
		Case "standard"
			Format = FormatNumber(expression, 2, -1)
		Case "percent"
			Format = FormatPercent(expression, 2)
		Case "yes/no"
			expression = cLng(expression)
			If expression = 0 then 
				Format = "No" 
			else 
				Format = "Yes"
			end if
		Case "true/false"
			expression = cLng(expression)
			If expression = 0 then 
				Format = "False" 
			else 
				Format = "True"
			end if
		Case "on/off"
			expression = cLng(expression)
			If expression = 0 then 
				Format = "Off" 
			else 
				Format = "On"
			end if
		Case Else
			Format = expression
	End Select
	On Error GoTo 0
End Function
%>

	