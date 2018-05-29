<!DOCTYPE html>
<html>
<head>
  <style>
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }
    header .pagenum:before{
        content: counter(page);
    }
    footer .pagenum:before {
          content: counter(page);
    }
  </style>
  @yield('header_styles')
</head>
<body>
  <header>header on each page <div class="pagenum-container">Page <span class="pagenum"></header>
  <footer>
              <div class="pagenum-container">Page <span class="pagenum"></span></div>
  </footer>

  
  <main>
    <h2>Load PDF File</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Vimal Kashiyani</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Hardik Savani</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Harshad Pathak</td>
        </tr>
    </table>
    <p>page1</p>
    <p>page2</p>
    <p>page3</p>
    <p>page4</p>
    <p>page5</p>
  </main>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Load PDF</title>
    <style type="text/css">
        table{
            width: 100%;
            border:1px solid black;
        }
        td, th{
            border:1px solid black;
        }
    </style>
</head>
<body>



</body>
</html>