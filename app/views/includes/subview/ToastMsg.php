


<!-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="<?= $data['toastID'] ?>" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="/resources/images/warning.png" class="rounded me-2" alt="...">
            <strong class="me-auto"><?= $data['header'] ?> </strong>
            <small id="currenTime"></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $data['message'] ?>
        </div>
    </div>
</div> -->
<div id="updateToastDiv">
    <div class="toast-container position-fixed bottom-0 end-0 p-3 ">
        <div id="toastUpdate" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
            <div class="toast-header">
                <img src="/resources/images/warning.png" class="rounded me-2" alt="...">
                <strong class="me-auto">Success</strong>
                <small id="currenTime"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            <p>Profile Updated</p>
            </div>
        </div>
    </div>
</div>


<script>
 
</script>