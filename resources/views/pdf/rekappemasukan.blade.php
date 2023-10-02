@foreach ($pgw as $p)
<?php
                                        $namaproduk = explode(',', $p->produk_names);
                                        ?>

@foreach ($namaproduk as $val)
{{ $val }} <br>
@endforeach
@endforeach