<table style="width:100%">
  <tr>
    <th colspan="3" style="text-align:center;"><strong>{{$cp->company_name}}</strong><n>Safe Work Procedure</th>
  </tr>
  <tr>
    <th rowspan="4">Driving & Transportation</th>
    <th>Document No.:</th>
    <td>{{$cp->company_initial}}-SWP-{{$ra->id}}</td>
  </tr>
  <tr>
    <th>Revision No.:</th>
    <td>00</td>
  </tr>
  <tr>
    <th>Form Effective Date:</th>
    <td>{{ Carbon\Carbon::parse($ra->form_effective_date)->format('d-m-Y i') }}</td>
  </tr>
    <tr>
    <th>Page No.:</th>
    <td><span class="pagenum"></span></td>
  </tr>
</table>
