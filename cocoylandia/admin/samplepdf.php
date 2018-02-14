<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title id='title'>HTML Page setup Tutorial</title>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.20/pdfmake.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.20/vfs_fonts.js'></script>
	<script type="text/javascript">
		function myFunction() {
			var docDefinition = {
				content: [
					{
						table: {
							body: [
								['First', 'Second', 'Third', 'The last one'],
								['Value 1', 'Value 2', 'Value 3', 'Value 4'],
								[{ text: 'Bold value', bold: true }, 'Val 2', 'Val 3', 'Val 4']
							]
						}
					}]
			}
			pdfMake.createPdf(docDefinition).download('Report.pdf');
		}
	</script>
</head>
<body>
	<button type="button" onclick="myFunction()">Click Me!</button>
</body>
</html>