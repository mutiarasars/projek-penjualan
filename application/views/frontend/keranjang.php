<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/keranjang.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="<?= base_url() ?>assets/img/authentic1.png"/>
                            </a>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?= $this->session->userdata('username') ?></h2>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">KERANJANG</h1>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">Nama Produk</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right"></th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                        <?php $n = 1;
                        $total = 0; 
                        foreach($keranjang as $item) : ?>
                    <tbody>
                        <tr>
                            <td class="no"><?= $n++ ?></td>
                            <td class="text-left"><h3>
                                <a target="_blank" href="#">
                                <?= $item->nama_produk ?> </a>
                            </td>
                            <td class="unit"><?= $item->jumlah ?></td>
                            <td class="unit"></td>
                            <td class="total"><?= $item->jumlah * $item->harga ?></td>
                            <?php $total += $item->jumlah * $item->harga ?>
                        </tr>
                    </tbody>
                    <?php endforeach ?>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TOTAL</td>
                            <td><?= $total ?></td>
                        </tr>
                    </tfoot>      
                </table>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>