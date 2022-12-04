<!-- TOAST STARTS -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="modalToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="/resources/images/profits.png" class="rounded me-2" alt="...">
                    <strong class="me-auto"><?=_("Success")?></strong>
                    <small id="currenTime"></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <p id="addedAmount"></p>
                </div>
            </div>
        </div>
<!-- TOAST ENDS -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?=_("Reload virtual wallet")?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal_payment" class="row g-3 align-items-center">
                        <div class="col-5">
                            <label for="card_number" class="col-form-label"><?=_("Credit Card Number")?></label>
                        </div>
                        <div class="col-5">
                            <input type="text" maxlength="16" id="card_number" class="form-control" aria-describedby="card_number">
                        </div>
                        <div class="col-5">
                            <label for="card_holder" class="col-form-label"><?=_("Card Holder Name")?></label>
                        </div>
                        <div class="col-5">
                            <input type="text" id="card_holder" class="form-control" aria-describedby="card_holder">
                        </div>
                        <div class="col-5">
                            <label for="card_expiration" class="col-form-label"><?=_("Expiration date")?></label>
                        </div>
                        <div class="col-5">
                            <input type="month" id="card_expiration" class="form-control" aria-describedby="card_expiration">
                        </div>
                        <div class="col-5">
                            <label for="card_csc" maxlength="3" class="col-form-label"><?=_("Security Number")?></label>
                        </div>
                        <div class="col-5">
                            <input type="password" id="card_csc" class="form-control w-25" aria-describedby="card_csc">
                        </div>
                        <div class="col-5">
                            <label for="reload_amount" class="col-form-label"><?=_("Amount")?></label>
                            
                        </div>
                        <div class="col-5">
                           <input type="text" id="reload_amount" class="form-control w-50" aria-describedby="reload_amount_line">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="clearForm()" class="btn btn-secondary" data-bs-dismiss="modal"><?=_("Close")?></button>
                    <button id="reload_virtual_wallet" type="button" data-bs-dismiss="modal" class="btn btn-primary" disabled><?=_("Done")?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL ENDS -->
    <!-- script to update wallet  -->
    <script>
    // Modal Script
    function round(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals)
        }

    var hasCreditNum ;
        var hasCreditName ;
        var hasDate;
        var hasSecNum ;
        var hasAmount;

        var totalAmount = parseFloat($("#virtualWallet").text());

        var creditNum, creditName, scs;
        var expDate;
        var amount;

        $("#card_number").focusout(function (){
            credit_num = $("#card_number").val();
            hasCreditNum = (!credit_num) ? false : true
            checkIfValid();
       
        })

        $("#card_holder").focusout(function (){
            creditName = $("#card_holder").val();
            hasCreditName = (!creditName) ? false : true;
            checkIfValid();
        })

        $("#card_expiration").focusout(function (){
            expDate = new Date($("#card_expiration").val());
            hasDate = (isNaN(expDate)) ? false : true
            checkIfValid();
        })

        $("#card_csc").focusout(function (){
            scs = $("#card_csc").val();
            hasSecNum = (!scs) ? false : true;
            checkIfValid();
        })

        $("#reload_amount").focusout(function (){
            amount = $("#reload_amount").val();
            hasAmount = (!amount) ? false : true;
            checkIfValid();
            
        })

        $("#reload_virtual_wallet").on('click', function(){
            totalAmount += round(amount, 2)
            var value = totalAmount.toString();
            console.log(value);
            updateWallet(value);
            $("#virtualWallet").text(value);
            $("#addedAmount").html("$" + amount + " added to your account");
            let toastLiveExample = document.getElementById('modalToast');
            let toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
            clearForm();
           
        })

        function clearForm(){
            $("#card_number").val("");
            $("#card_holder").val("");
            $("#card_expiration").val("");
            $("#card_csc").val("");
            $("#reload_amount").val("");

            hasCreditNum = false; 
            hasCreditName = false; 
            hasDate = false;
            hasSecNum = false;
            hasAmount = false;
            $("#reload_virtual_wallet").attr("disabled", true);
        }
        
        function checkIfValid(){
            if (hasCreditNum && hasCreditNum && hasAmount && hasDate && hasSecNum && hasAmount){
                $("#reload_virtual_wallet").removeAttr("disabled");
            } else {
                $("#reload_virtual_wallet").attr("disabled", true)
            }
        } 

        // AJAX SEND DATA
        function updateWallet(value){
            $.ajax({
            url: '/Profile/updateWallet',
            type: 'POST',
            data: {'credit': value},
            success: function(data){
                // $('#virtualWallet').val(data)
               console.log(data);
            },
            fail: function(){
                console.log("fail");
                alert("failed to update wallet");
            }
        })
        }

        $("#upload_new_prof").click(function (){
            alert("click click");
        })
      


    </script>