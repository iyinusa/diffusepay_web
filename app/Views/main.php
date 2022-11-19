<?php
    use App\Models\Crud;
    $this->Crud = new Crud();
?>

<?php echo $this->extend('designs/public'); ?>
<?php echo $this->section('title'); ?>
    <?php echo $title; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="main-content">
        <?php if($page == 'main') { ?>
            <div class="container mb-4" style="background-image:url('<?=site_url('assets/images/banner.jpg');?>'); background-repeat:no-repeat; background-size:cover; padding:150px 50px;">
                <div class="row">
                    <div class="col-sm-4 mb-2">
                        <div class="card" style="background:rgba(0,0,0,0.5);">
                            <div class="card-body feature-box fbox-lg fbox-border fbox-light fbox-effect">
                                <div class="fbox-icon">
                                    <a href="javascript:;"><i class="icon-ok"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3 style="color:#fff;">Fund Vault</h3>
                                    <p style="color:#fff;">Fund your Vault with Debit Card, USSD, Transfer, etc.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card" style="background:rgba(0,0,0,0.5);">
                            <div class="card-body feature-box fbox-lg fbox-border fbox-light fbox-effect">
                                <div class="fbox-icon">
                                    <a href="javascript:;"><i class="icon-thumbs-up"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3 style="color:#fff;">Generate Vault Token</h3>
                                    <p style="color:#fff;">Generate a Token with an equivalent amount for desired transaction.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card" style="background:rgba(0,0,0,0.5);">
                            <div class="card-body feature-box fbox-lg fbox-border fbox-light fbox-effect">
                                <div class="fbox-icon">
                                    <a href="javascript:;"><i class="icon-magnet"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3 style="color:#fff;">Pay with Token</h3>
                                    <p style="color:#ccc;">At merchant offline/online location or store, use token to pay.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4" style="text-align:right;">
                        <a href="<?=site_url('main/merchant');?>" class="btn btn-primary btn-lg">Visit Merchant Store <i class="icon-line-arrow-right ms-2" style="position: relative; top: 1px;"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if($page == 'pay') { ?>
            <div class="container mb-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body text-center text-<?php if($success){echo 'success';} else {echo 'danger';} ?>">
                                <div style="padding:50px 25px">
                                    <i class="icon-<?php if($success){echo 'ok';} else {echo 'times';} ?>" style="font-size:150px;"></i>
                                    <h3 <?php if($success){echo 'success';} else {echo 'danger';} ?>><?=$msg;?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?=$pay_script;?>
        <?php } ?>

        <?php if($page == 'merchant') { ?>
            <div class="container">
                <hr/>
                <div class="row">
                    <div class="col-sm-5">
                        <img alt="" src="<?=site_url('assets/images/watches.jpg');?>" />
                    </div>
                    <div class="col-sm-7">
                        <b>Sample Store</b>
                        <h3>Casio Wrist Watches</h3>
                        <span class="text-muted">SKU: CW-65 | 10 in Stock</span>
                        <p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                        <p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                        <hr/>

                        <div class="row">
                            <div class="col-sm-2">
                                <input type="number" id="qty" name="qty" value="1" min="1" class="form-control" oninput="getTotal()" />
                            </div>
                            <div class="col-sm-10 text-success" style="text-align:right; font-size:32px;">
                                <input type="hidden" id="amt" value="25000" />
                                <input type="hidden" id="amtTotal" value="25000" />
                                <b>&#8358;<span id="total">25,000</span></b>

                                <div style="font-size:14px; cursor:pointer; color:#000;" onclick="$('#diffusePay').toggle(200);">
                                    <img alt="" src="<?=site_url('assets/images/logo-dark.png');?>" height="25px" /> Pay with <b>DiffusePay</b>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6 mt-2">
                                <div id="diffusePay" style="display:none; font-size:14px; color:#000;">
                                    <div id="verifyPay" class="input-group input-group-lg">
                                        <input type="text" name="token" id="token" class="form-control" placeholder="Vault Token (VToken)">
                                        <button type="submit" class="input-group-btn btn btn-primary" onclick="verifyPay()">Verify</button>
                                    </div>
                                    <div id="verifyMsg"></div>

                                    <div id="approvePay" class="input-group input-group-lg" style="display:none;">
                                        <input type="text" name="pin" id="pin" class="form-control" placeholder="VToken PIN">
                                        <button type="submit" class="input-group-btn btn btn-success" onclick="approvePay()">Approve</button>
                                    </div>
                                    <div id="approveMsg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php echo $this->endSection(); ?>

<!-- <button onclick="paywithSeerbit()">Pay Now</button> -->
<?php echo $this->section('scripts'); ?>
    <script>var site_url = '<?=site_url();?>';</script>
    <?php if($page == 'pay') { ?>
        <script>
            $(function(){
                setTimeout(function() { paywithSeerbit(); }, 200);
            });
        </script>
    <?php } ?>

    <?php if($page == 'merchant') { ?>
        <script>
            function getTotal() {
                var total = 0;
                var amt = $('#amt').val();
                var qty = $('#qty').val();
                total = parseInt(amt) * parseInt(qty);
                $('#amtTotal').html(total);
                $('#total').html(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }

            function verifyPay() {
                var content = $('#verifyPay').html();
                var amtTotal = $('#amtTotal').val();
                var token = $('#token').val();

                $.ajax({
                    url: site_url + 'main/verify',
                    type: 'post',
                    data: { token: token, amt: amtTotal },
                    success: function(data) {
                        var dt = JSON.parse(data);
                        if(dt.status == false) {
                            $('#verifyPay').html(content);
                            $('#verifyMsg').html(dt.msg);
                        } else {
                            $('#verifyPay').hide();
                            $('#verifyMsg').hide();
                            $('#approvePay').show(200);
                        }
                    }
                });
            }

            function approvePay() {
                var content = $('#approvePay').html();
                var token = $('#token').val();
                var amtTotal = $('#amtTotal').val();
                var pin = $('#pin').val();

                $.ajax({
                    url: site_url + 'main/approve',
                    type: 'post',
                    data: { token: token, pin: pin, amt: amtTotal },
                    success: function(data) {
                        var dt = JSON.parse(data);
                        $('#approveMsg').html(dt.msg);
                        if(dt.status == false) {
                            $('#verifyPay').html(content);
                        } else {
                            $('#verifyPay').hide();
                            $('#approvePay').hide(200);
                        }
                    }
                });
            }
        </script>
    <?php } ?>
<?php echo $this->endSection(); ?>