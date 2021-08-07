
	subject_id = '';
	function handleHttpResponse() {
		if (http.readyState == 4) {
			if (subject_id != '') {
				document.getElementById(subject_id).innerHTML = document.getElementById(subject_id).innerHTML+http.responseText;
			}
		}
	}
	function getHTTPObject() {
		var xmlhttp;
		/*@cc_on
		@if (@_jscript_version >= 5)
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (E) {
					alert('Error while creating ActiveX object');
					xmlhttp = false;
				}
			}
		@else
		xmlhttp = false;
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (e) {
				alert('Error while creating XMLHttp Request object');
				xmlhttp = false;
			}
		}
		return xmlhttp;
	}
	var http = getHTTPObject(); // We create the HTTP Object