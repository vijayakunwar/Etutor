
<?php include('header.php');?>



<div class="containertext-center ">

    <div class="row ">
        <div class=" offset-md-4 col-md-4  ">
            <br>
            <br>

            <h3> <p class="text-white bg-dark text-center">
                    RESGISTER PAGE
                </p>
            </h3>

        </div>
    </div>

</div>




</body>
<?php
if (isset($_GET["error"])){
    if ($_GET["error"]=="usertaken"){
        echo '<p class="signuperror"> username is taken please chooes a new one!</P>';
    }
}
?>

<form action="phps/signup.php" name="form" method="post" onsubmit="return checkForm()" enctype="multipart/form-data" autocomplete="on"><!----nctype encrpte file and data------>

    <table border="0" align="center" width="40%">

        <tr>
            <td align="lift">
                <p>If you are a tutor please click</p>
            </td>
            <td align="lift">
                <button type="button" onclick="changeForm()" id="changeFormButton">I'm a tutor</button>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><label for="username"></label>
                <?php  //such php is to remember users type in after error password no need to save
                if(!empty($_GET['username'])){
                    echo '<input type="text" placeholder="Username" minlength="6" maxlength="12" name="username" value="'.$_GET["username"].'"id="username" required pattern="[a-zA-Z0-9-]+" title="Username should only contain numbers and letters between 6~12 length.e.g.icon123">';
                }
                else{
                    echo '<input type="text" placeholder="Username" minlength="6" maxlength="12" name="username" id="username" required pattern="[a-zA-Z0-9-]+" title="Username should only contain numbers and letters between 6~12 length.e.g.icon123">';
                }
                ?>
            </td> <!--- pattern="[^\s]+" means no white space allowed--->
        </tr>

        <tr>
            <td align="center" colspan="2">
                <label for="password"></label>
                <input type="password" placeholder="Password" minlength="8" name="password" id="password" class="input_class" required pattern="[^\s]+" title="Password minlength is 8 no whitespace allowed">
            </td>
        </tr>
        <tr>

            <td align="center" colspan="2">
                <label for="rePassword"></label>
                <input type="Password" name="rePassword" placeholder="Confirm Password" id="rePassword" class="input_class" required pattern="[^\s]+" title="Password minlength is 8 no whitespace allowed">
            </td>
        </tr>

        <tr>
            <td align="center" colspan="2"><label for="username"></label>
                <?php
                if(!empty($_GET['fName'])){
                    echo '<input type="text" name="fName" placeholder="First Name" value="'.$_GET["fName"].'" id="fName" class="input_class" required pattern="^[-a-zA-Z]+" title="Please enter your name correctly">';//name cant be numbers and simbles
                }
                else{
                    echo '<input type="text" name="fName" placeholder="First Name" id="fName" class="input_class" required pattern="^[-a-zA-Z]+" title="Please enter your name correctly">';
                }
                ?>
        </tr>

        <tr>
            <td align="center" colspan="2">
                <label for="lName"></label>
                <?php
                if(!empty($_GET['lName'])){
                    echo '<input type="text" name="lName" placeholder="Last Name" value="'.$_GET["lName"].'" id="lName" class="input_class" pattern="^[-a-zA-Z]+"">';
                }
                else{
                    echo '<input type="text" name="lName"  placeholder="Last Name" id="lName" class="input_class" pattern="^[-a-zA-Z]+"">';
                }
                ?>
            </td>
        </tr>

        <tr>
            <td align="center" colspan="2">
                <label for="email"></label>
                <?php
                if(!empty($_GET['email'])){
                    echo '<input type="email" name="email" placeholder="Email Address"  id="email" class="input_class" required value="'.$_GET["email"].'">';
                }
                else{
                    echo '<input type="email" name="email" placeholder="Email Address" id="email" class="input_class" required>';
                }
                ?>
            </td>
        </tr>

        <tr>
            <td align="center" colspan="2">
                <label for="phone"></label>
                <?php
                if (!empty($_GET['phone'])) {
                    echo '<input type="tel" name="phone" placeholder="Contact Number" value="'.$_GET['phone'].'" id="phone" class="input_class">';
                } else {
                    echo '<input type="tel" name="phone" placeholder="Contact Number" id="phone" class="input_class">';
                }
                ?>
            </td>
        </tr>

        <tr>
            <td align="lift">
                Date Of Birth:
            </td>
            <td>
                <?php
                if (!empty($_GET['DOB'])) {
                    echo '<input type="date" name="DOB" id="DOB" class="input_class" value="'.$_GET['DOB'].'">';
                } else {
                    echo '<input type="date" name="DOB" id="DOB" class="input_class">';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="lift">
                Gender:
            </td>
            <td>
                <?php
                if(!empty($_GET['sex'])){
                    echo '<input type ="text" name="sex" value="'.$_GET['sex'].'">';
                }
                else{
                    echo '<select name="sex" id="sex">
                    <option value="--">--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="lift">Choose you group:</td>
            <td>
            <select name="userType" id="userType" required>
                <option value="0">Not Sure</option>
                <option value="2">Student</option>
                <option value="1">Tutor</option>
            </select>
            </td>
        </tr>
        <tr>
            <td id="tutorUpload"></td>
        </tr>

        <tr>
            <td align="center" colspan="2"><!--combine two rows -->
                <label>
                    <input type="checkbox" required name="termsBox" id="termsBox"/>
                </label>I accept <a href="https://www.proquest.com/about/terms-and-conditions.html"> terms and conditions</a>.
            </td>
        </tr>

        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="signup_submit" value="Submit"/>
                <input type="reset" class="form control" value="Reset"/>
            </td>
        </tr>


    </table>
</form>

<script type="text/javascript">

    function changeForm() {
        document.getElementById("tutorUpload").innerHTML = '<form action="phps/upload.test.php">' +
            '<label for="certificate" >Upload your certifications</label>' +
            '<input type="file" id="certificate" name="certificate" required/>' + //file are required when its appears
            '<p class="help"><span style="color: red; ">*</span> Please upload you certifications to prove us you are a tutor.</p>' +
            '</form>' +
            "<button type='button' onclick='window.location.reload()'> I'm a student </button>"

        //additional information need be proved by tutor for manual review
    }

</script>


<script type="text/javascript" >
    //all validations
    function checkForm(document) { ///only user when browser does not support pattern

        if (form.username.value !== '') {
            if (form.password.value === '') {
                alert('password cant be empty!');
                form.password.focus();
                return false;
            }
            if (form.password.value.length < 8) {
                alert('password need at least 8 characters! ');
                form.password.focus();
                return false;
            }
            if (form.password.value !== form.rePassword.value) {
                alert('you password not match, try again!');
                form.rePassword.focus();
                return false;
            }
            if (form.fName.value === '') {
                alert('Please enter you name!');
                form.fName.focus();
                return false;
            }
            if (form.email.value === '') {
                alert('Please enter you Email!');
                form.email.focus();
                return false;
            }
            if (termsBox.checked === false) {
                alert("please accept terms and conditions ");
                form.termsBox.focus();
                return false
            }
            return true;
        } else {
            alert('Username must be entered');
            form.username.focus();
            return false;
        }


    }


</script>
<hr class="my-4">

<!-- Footer -->
<?php include('footer.php')?>