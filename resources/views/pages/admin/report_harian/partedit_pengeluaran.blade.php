 <table class="table table-sm">
     <tr>
         <th colspan="3" style="text-align: center">
            RINCIAN PENGELUARAN BELANJA OUTLET
         </th>
     </tr>
     <tr>
         <th width="60%">
             NAMA BARANG
         </th>
         <th width="20%" style="text-align: center">
             QTY
         </th>
         <th width="20%" style="text-align: center">
             NILAI
         </th>
     </tr>
     <tr>
         <td>
             <input type="text" name="pengeluaran[1]" class="form-control" value="{{ $ListPengeluaran->{1} }}" style="background-color:#e6e6fa;">
         </td>
         <td>
             <input type="number" min="0" class="form-control" name="pengeluaran[2]" value="{{ $ListPengeluaran->{2} }}"
                 style="background-color:#e6e6fa;">
         </td>
         <td class="input-group">
            <span class="input-group-text" id="basic-addon1">Rp</span>
             <input type="text" class="form-control hitungpengeluaranedit" style="text-align:end;"  name="pengeluaran[3]" value="{{ $ListPengeluaran->{3} }}"
                 style="background-color:#e6e6fa;">
                
         </td>
     </tr>
     <tr>
         <td>
             <input type="text" name="pengeluaran[4]" class="form-control" value="{{ $ListPengeluaran->{4} }}" style="background-color:#e6e6fa;">
         </td>
         <td>
             <input type="number" min="0" class="form-control" name="pengeluaran[5]" value="{{ $ListPengeluaran->{5} }}"
                 style="background-color:#e6e6fa;">
         </td>
         <td class="input-group">
            <span class="input-group-text" id="basic-addon1">Rp</span>
             <input type="text" class="form-control hitungpengeluaranedit" style="text-align:end;"  name="pengeluaran[6]" value="{{ $ListPengeluaran->{6} }}"
                 style="background-color:#e6e6fa;">
                
         </td>
     </tr>
     <tr>
         <td>
             <input type="text" name="pengeluaran[7]" class="form-control" value="{{ $ListPengeluaran->{7} }}" style="background-color:#e6e6fa;">
         </td>
         <td>
             <input type="number" min="0" class="form-control" name="pengeluaran[8]" value="{{ $ListPengeluaran->{8} }}"
                 style="background-color:#e6e6fa;">
         </td>
         <td class="input-group">
            <span class="input-group-text" id="basic-addon1">Rp</span>
             <input type="text" class="form-control hitungpengeluaranedit" style="text-align:end;"  name="pengeluaran[9]" value="{{ $ListPengeluaran->{9} }}"
                 style="background-color:#e6e6fa;">
                
         </td>
     </tr>
     <tr>
         <td>
             <input type="text" name="pengeluaran[10]" class="form-control" value="{{ $ListPengeluaran->{10} }}" style="background-color:#e6e6fa;">
         </td>
         <td>
             <input type="number" min="0" class="form-control" name="pengeluaran[11]" value="{{ $ListPengeluaran->{11} }}"
                 style="background-color:#e6e6fa;">
         </td>
         <td class="input-group">
            <span class="input-group-text" id="basic-addon1">Rp</span>
             <input type="text" class="form-control hitungpengeluaranedit" style="text-align:end;"  name="pengeluaran[12]" value="{{ $ListPengeluaran->{12} }}"
                 style="background-color:#e6e6fa;">
                
         </td>
     </tr>
     <tr>
         <td>
             <input type="text" name="pengeluaran[13]" class="form-control" value="{{ $ListPengeluaran->{13} }}" style="background-color:#e6e6fa;">
         </td>
         <td>
             <input type="number" min="0" class="form-control" name="pengeluaran[14]" value="{{ $ListPengeluaran->{14} }}"
                 style="background-color:#e6e6fa;">
         </td>
         <td class="input-group">
            <span class="input-group-text" id="basic-addon1">Rp</span>
             <input type="text" class="form-control hitungpengeluaranedit" style="text-align:end;"  name="pengeluaran[15]" value="{{ $ListPengeluaran->{15} }}"
                 style="background-color:#e6e6fa;">
                
         </td>
     </tr>
     <tr>
        <td>
            <input type="text" readonly name="pengeluaran[16]" class="form-control" value="{{ $ListPengeluaran->{16} }}" style="background-color:#e6e6fa;">
        </td>
        <td>
            <input type="number" min="0" class="form-control" name="pengeluaran[17]" value="{{ $ListPengeluaran->{17} }}"
                style="background-color:#e6e6fa;">
        </td>
        <td class="input-group">
           <span class="input-group-text" id="basic-addon1">Rp</span>
            <input type="text" class="form-control  bg-danger" readonly id="totalpengeluaranedit" style="text-align: end"  name="pengeluaran[18]" value="{{ $ListPengeluaran->{18} }}"
                style="background-color:#e6e6fa;">
               
        </td>
    </tr>
     
 </table>
