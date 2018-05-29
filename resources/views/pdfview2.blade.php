<html>
<head>
<style type="text/css">
    table td, table th{
        border:1px solid black;
    }
    @page { margin: 0cm 0cm; }
    /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 3.5cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 1cm;
            }
    header { position: fixed; top: 0cm; left: 0cm; right: 0cm;  height: 3cm; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px;  height: 50px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }
    header .pagenum:before{
        content: counter(page);
    }
    footer .pagenum:before {
          content: counter(page);
    }
</style>
</head>
<body>
    <header>
      <!-- BEGIN SIDEBAR MENU -->
      @include('swppdf.header')
      <!-- END SIDEBAR MENU -->
    </header>
    <footer>
      <!-- BEGIN SIDEBAR MENU -->
      @include('swppdf.footer')
      <!-- END SIDEBAR MENU -->
    </footer>

    <main><!-- insert swp content here -->
        <table>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
            @foreach ($items as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->company_initial }}</td>
                <td>{{ $item->company_name }}</td>
            </tr>
            @endforeach
        </table>
        <!-- End swp content here -->
        <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
    </main>
</body>
</html>
