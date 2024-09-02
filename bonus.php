<?php
// INIT MPDF
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

// YOU CAN USE THE LANDSCAPE ORIENTATION AS WELL
// $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

// OPTIONAL META DATA
$mpdf->SetTitle('Document Title');
$mpdf->SetAuthor('John Doe');
$mpdf->SetCreator('Creator');
$mpdf->SetSubject('Demo');
$mpdf->SetKeywords('Keyword 1, Keyword 2');

// SET THE PASSWORD & PERMISSIONS IF YOU WANT
// https://mpdf.github.io/reference/mpdf-functions/setprotection.html
// $mpdf->SetProtection(array(), "userpass", "ownerpass");

// THE HTML
$html = "
<html>
  <head>
    <style>
    #test{ background:#ff0000; }
    #atable{ border:1px solid #00ff00; }
    </style>
  </head>
  <body>
    <h1>Title</h1>
    <p id='test'>Hello world!</p>
    <table id='atable'>
      <tr><td>A Table</td></tr>
    </table>
  </body>
</html>";

// OPTIONALLY, JUST GRAB FROM AN ENTIRE HTML FILE
// $html = file_get_contents('file.html');

// WRITE HTML
$mpdf->WriteHTML($html);

// OUTPUT, SHOW IN BROWSER BY DEFAULT
$mpdf->Output();
// OR FORCE DOWNLOAD
// $mpdf->Output('file.pdf');
?>