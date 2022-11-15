<?php $this->view('includes/header'); ?>

<body id="current-user">
    <h2>Create your <span><?= $_SESSION['role']; ?></span> PROFILE</h2>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <?php if ($_GET['role'] == 'buyer') { ?>

                <div id="create-profile">
                    <label for="fname">First Name: <input id="fname" type="text" name="first_name" required></label>
                    <label for="lname">Last Name: <input id="lname" type="text" name="last_name" required></label>
                    <div>
                        <label for="picture">Profile Photo: <input id="picture" type="file" name="profile_photo" ></label>
                        <img id="pic_preview" src="/resources/images/blank.jpg" style="max-width:200px;max-height:200px" alt="profile photo">
                    </div>
                    <label for="shipping_add">Shipping Address: <input id="shipping_add" type="text" name="shipping_add" required></label><br>
                    <label for="billing_add">Billing Address: <input id="billing_add" type="text" name="billing_add" required></label><br>
                    <label for="credit">Add Credit: <input id="credit" type="text" name="credit" required></label><br>
                </div>
                <input type="submit" class="btn btn-danger" name="cancel" value="CANCEL">
                <input type="submit" class="btn btn-success" name='action' value="CREATE">
            <?php } else { ?>

                <div id="create-profile">
                    <label for="fname">First Name: <input id="fname" type="text" name="first_name" required></label>
                    <label for="lname">Last Name: <input id="lname" type="text" name="last_name" required></label>
                    <div>
                        <label for="picture">Profile Photo: <input id="picture" type="file" name="profile_photo"></label>
                        <img id="pic_preview" src="/resources/images/blank.jpg" style="max-width:200px;max-height:200px" alt="profile photo">
                    </div>
                    <label for="store_name">Store Name: <input id="store_name" type="text" name="store_name" required></label><br>
                    <label for="description">Store Description: <textarea id="description" placeholder="Tell us something about your store"  name="description" required></textarea></label>
                    <label for="store_location">Store Location: <input id="store_location" type="text" name="location" required></label><br>
                </div>
                <input type="submit" class="btn btn-danger" name="cancel" value="CANCEL">
                <input type="submit" class="btn btn-success" name='action' value="CREATE">


            <?php } ?>
        </form>
    </div>

    <!-- IMAGE PREVIEW -->
    <script>
        picture.onchange = evt => {
            const [file] = picture.files
            if (file) {
                pic_preview.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script src="/resources/js/main_script.js"></script>
</body>

</html>