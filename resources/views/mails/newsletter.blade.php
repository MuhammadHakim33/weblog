<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin
    link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        table {
            font-family: 'Roboto', sans-serif;
        } 
        tr, td {
            border: none;
        }
        @media only screen and (max-width: 720px) {
            .multi-column table {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: whitesmoke;">

    <table align="center" style="width: 100%; max-width: 602px; background-color: white;" cellpadding="0" cellspacing="0">
        <!-- HEADER -->
        <tr class="single-column">
            <td colspan="2">
                <img src="https://iili.io/Hx9PF2t.jpg" alt="cover" srcset="" width="100%" >
            </td>
        </tr>
        <!-- Main CONTENT -->
        <tr class="single-column">
            <td colspan="2" style="padding: 8px 20px 8px 20px;">
                <p>{{ $request->message }}</p>
                <a href="https://www.youtube.com/">Lorem ipsum dolor sit amet.</a>
            </td>
        </tr>
    </table>
    
</body>
</html>