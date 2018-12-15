<!DOCTYPE html>
<html>

<head>

	</head>
<body>

<p>Click the button to print the current page.</p>

<button onclick="printpdf()">Print this page</button>



</body>
<script>
function printpdf()
{
    var w = window.open('JS/Reports/abc.pdf');
    window.print();

    $(w).ready(function(){
        window.print();
    });
}
</script>
</html>
