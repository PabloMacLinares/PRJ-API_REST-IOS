#Servidor
<ul>
	<li><a href="https://github.com/PabloMacLinares/PRJ-API_REST-IOS/blob/master/Server/api/api.php" target="_blank">api.php</a></li>
	<li><a href="https://github.com/PabloMacLinares/PRJ-API_REST-IOS/tree/master/Server/api/clases" target="_blank">Gestores</a></li>
	<li><a href="https://github.com/PabloMacLinares/PRJ-API_REST-IOS/blob/master/Server/api/src/Actividad.php" target="_blank">Actividad.php</a></li>
	<li><a href="https://github.com/PabloMacLinares/PRJ-API_REST-IOS/blob/master/Server/api/src/Profesor.php" target="_blank">Profesor.php</a></li>
	<li><a href="https://github.com/PabloMacLinares/PRJ-API_REST-IOS/blob/master/Server/api/src/Grupo.php" target="_blank">Grupo.php</a></li>
</ul>

##Uso de la api
<TABLE FRAME=VOID CELLSPACING=0 COLS=5 RULES=NONE BORDER=0>
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Arial"; font-size:x-small }
		 -->
	</STYLE>
	<COLGROUP><COL WIDTH=233><COL WIDTH=86><COL WIDTH=378><COL WIDTH=353><COL WIDTH=692></COLGROUP>
	<TBODY>
		<TR>
			<TD WIDTH=233 HEIGHT=17 ALIGN=LEFT><B><U>API URL</U></B></TD>
			<TD WIDTH=86 ALIGN=LEFT><BR></TD>
			<TD WIDTH=378 ALIGN=LEFT><BR></TD>
			<TD WIDTH=353 ALIGN=LEFT><BR></TD>
			<TD WIDTH=692 ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT><A HREF="https://prj-ios-runepml.c9users.io/api">https://prj-ios-runepml.c9users.io/api</A>/</TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT><B><U>Extensiones</U></B></TD>
			<TD ALIGN=LEFT><B><U>m&eacute;todo</U></B></TD>
			<TD ALIGN=LEFT><B><U>datos json</U></B></TD>
			<TD ALIGN=LEFT><B><U>respuesta</U></B></TD>
			<TD ALIGN=LEFT><B><U>detalles</U></B></TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT>/grupo</TD>
			<TD ALIGN=LEFT>get</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT>array de grupos</TD>
			<TD ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT>/grupo/X/Y/...</TD>
			<TD ALIGN=LEFT>get</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT>array de grupos</TD>
			<TD ALIGN=LEFT>se le pasan pares de datos en la url, donde X es el nombre del par&aacute;metro e Y el valor a buscar</TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT>/profesor</TD>
			<TD ALIGN=LEFT>get</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT>array de grupos</TD>
			<TD ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT>/profesor/X/Y/...</TD>
			<TD ALIGN=LEFT>get</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT>array de grupos</TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT>/actividad</TD>
			<TD ALIGN=LEFT>get</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT>array de grupos</TD>
			<TD ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD HEIGHT=17 ALIGN=LEFT>/actividad/X/Y/...</TD>
			<TD ALIGN=LEFT>get</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT>array de grupos</TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/grupo</TD>
			<TD ALIGN=LEFT>post</TD>
			<TD ALIGN=LEFT>{&quot;nombre&quot;: &quot;X&quot;}</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>devuelve error si el json es nulo o incorrecto</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/profesor</TD>
			<TD ALIGN=LEFT>post</TD>
			<TD ALIGN=LEFT>{&quot;nombre&quot;: &quot;X&quot;, &quot;departamento&quot;: &quot;X&quot;}</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/actividad</TD>
			<TD ALIGN=LEFT>post</TD>
			<TD ALIGN=LEFT>{&quot;profesor&quot;:X,&quot;grupo&quot;:X,&quot;titulo&quot;:&quot;X&quot;,&quot;descripcion&quot;:&quot;X&quot;,&quot;fecha&quot;:&quot;0000-00-00&quot;,&quot;lugar&quot;:&quot;X&quot;,&quot;horaInicio&quot;:&quot;00:00:00&quot;,&quot;horaFin&quot;:&quot;00:00:00&quot;}</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/grupo/id/X</TD>
			<TD ALIGN=LEFT>put</TD>
			<TD ALIGN=LEFT>{ &quot;nombre&quot;: &quot;X&quot;}</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>se pasa como par&aacute;metro, el id del objeto a actualizar, si el objeto no existe, se realiza una inserci&oacute;n. </TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/profesor/id/X</TD>
			<TD ALIGN=LEFT>put</TD>
			<TD ALIGN=LEFT>{&quot;nombre&quot;: &quot;X&quot;, &quot;departamento&quot;: &quot;X&quot;}</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/actividad/id/X</TD>
			<TD ALIGN=LEFT>put</TD>
			<TD ALIGN=LEFT>{&quot;profesor&quot;:X,&quot;grupo&quot;:X,&quot;titulo&quot;:&quot;X&quot;,&quot;descripcion&quot;:&quot;X&quot;,&quot;fecha&quot;:&quot;0000-00-00&quot;,&quot;lugar&quot;:&quot;X&quot;,&quot;horaInicio&quot;:&quot;00:00:00&quot;,&quot;horaFin&quot;:&quot;00:00:00&quot;}</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/grupo/id/X</TD>
			<TD ALIGN=LEFT>delete</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>devuelve error si el id no existe</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/profesor/id/X</TD>
			<TD ALIGN=LEFT>delete</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT>&quot;</TD>
		</TR>
		<TR>
			<TD HEIGHT=18 ALIGN=LEFT>/actividad/id/X</TD>
			<TD ALIGN=LEFT>delete</TD>
			<TD ALIGN=LEFT>null</TD>
			<TD ALIGN=LEFT><FONT FACE="Cumberland,Cumberland AMT,Courier New,Cousine,Liberation Mono,Nimbus Mono L,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier,Lucida Sans Typewriter,Lucida Typewriter,Monaco,Monospaced">[&quot;message&quot; :&quot;ok&quot;] o [&quot;message&quot; : &quot;error&quot;]</FONT></TD>
			<TD ALIGN=LEFT><U>&quot;</U></TD>
		</TR>
	</TBODY>
</TABLE>

###Cliente
