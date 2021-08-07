DaysofWeek = new Array()
DaysofWeek[0]="Domingo"
DaysofWeek[1]="Lunes"
DaysofWeek[2]="Martes"
DaysofWeek[3]="Mi&eacute;rcoles"
DaysofWeek[4]="Jueves"
DaysofWeek[5]="Viernes"
DaysofWeek[6]="S&aacute;bado"

Months = new Array()
Months[0]="Enero"
Months[1]="Febrero"
Months[2]="Marzo"
Months[3]="Abril"
Months[4]="Mayo"
Months[5]="Junio"
Months[6]="Julio"
Months[7]="Augosto"
Months[8]="Septiembre"
Months[9]="Octubre"
Months[10]="Noviembre"
Months[11]="Diciembre"

RightNow = new Date()

var day = DaysofWeek[RightNow.getDay()]
var date = RightNow.getDate()
var Month = Months[RightNow.getMonth()]
var Year = RightNow.getFullYear()

if (date == 1 || date == 21 || date == 31)
{ender = "<SUP>st</SUP>"}

else
if (date == 2 || date == 22)
{ender = "<SUP>nd</SUP>"}

else
if (date == 3 || date == 23)
{ender = "<SUP>rd</SUP>"}

else
{ender = "<SUP>th</SUP>"}
document.write("Hoy es ")
//document.write("" +day+ ", " +Month+ " " +date+ ender+ ", " +Year+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")
document.write("" +day+ ", " +date+ " de " +Month+ " de " +Year+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")