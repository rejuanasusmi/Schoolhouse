function addStu() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    var stupassconfirm = $("#stupassconfirm").val();

    // Checking form fields on form submission

    if(stuname.trim() == "") {
        $("#statusMsg1").html(
            '<small style="color:red;">  Please Enter Name!</small>'
        );
        $("#stuname").focus();
        return false;
    } else if(stuemail.trim() == "") {
        $("#statusMsg2").html(
            '<small style="color:red;">  Please Enter Email!</small>'
        );
        $("#stuemail").focus();
        return false;
    } else if(stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html(
            '<small style="color:red;">  Please Enter a Valid Email e.g.example@mail.com</small>'
        );
        $("#stuemail").focus();
        return false;
    } else if(stupass.trim() == "") {
        $("#statusMsg3").html(
            '<small style="color:red;">  Please Enter Password!</small>'
        );
        $("#stupass").focus();
        return false;
    } else if(stupassconfirm.trim() == "") {
        $("#statusMsg4").html(
            '<small style="color:red;">  Please Confirm Password!</small>'
        );
        $("#stupassconfirm").focus();
        return false;
    } else {
        $.ajax({
            url:'Student/addstudent.php',
            method: 'POST',
            dataType: 'json',
            data:{
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
                stupassconfirm: stupassconfirm,
            },
            success:function(data) {
                console.log(data);
                if(data == "ok") {
                    $("#successMsg").html("<span class='alert alert-success'>Registration Successful</span>");
                    clearStuRegField();
                } else if(data == "failed") {
                    $("#successMsg").html("<span class='alert alert-danger'>Unable to Register!</span>");
                } else if(data == "password incorrect") {
                    $("#successMsg").html("<span class='alert alert-danger'>Password Do Not Match!</span>");
                } else if(data == "this email already has a registered account") {
                    $("#successMsg").html("<span class='alert alert-danger'>This Email Already Exists!</span>");
                }
            },
    
        });

    }
}

// Empty All Fields

function clearStuRegField() {
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    $("#statusMsg4").html(" ");
}

// Function to clear the login form
function clearLoginForm() {
    $("#stuLoginForm").trigger("reset");
    $("#statusMsgEmail").html("");
    $("#statusMsgPass").html("");
    $("#loginMsg").html("");
}

$(document).ready(function() {
    // Ensure the forms are reset when modals are hidden
    $('#stuRegModal').on('hidden.bs.modal', function() {
        $('#stuRegForm').trigger('reset');
        $('#statusMsg1, #statusMsg2, #statusMsg3, #statusMsg4').empty();
    });

    $('#stuLoginModal').on('hidden.bs.modal', function() {
        $('#stuLoginForm').trigger('reset');
        $('#statusMsgEmail, #statusMsgPass, #loginMsg').empty();
    });

    $('#adminLoginModal').on('hidden.bs.modal', function() {
        $('#adminLoginForm').trigger('reset');
    });
});


//Ajax call for student login verification
function checkStuLogin() {
    var stulogemail = $("#stulogemail").val();
    var stulogpass = $("#stulogpass").val();
    if (stulogemail.trim() == "") {
        $("#statusMsgEmail").html(
            '<small style="color:red;">Please Enter Email!</small>'
        );
        $("#stulogemail").focus();
        return false;
    } else if (stulogpass.trim() == "") {
        $("#statusMsgPass").html(
            '<small style="color:red;">Please Enter Password!</small>'
        );
        $("#stulogpass").focus();
        return false;
    } else {
        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            dataType: 'json',
            data: {
                checkLogemail: "checkLogemail",
                stulogemail: stulogemail,
                stulogpass: stulogpass
            },
            success: function(data) {
                console.log(data);
                var msgElement = $("#loginMsg");
                msgElement.empty(); // Clear previous messages
            
                if (data === "login success") {
                    msgElement.html("<span class='alert alert-success'>Login Successful</span>");
                    setTimeout(function() {
                        window.location.href = "Student/studentDashboard.php"; // Redirect to the home page
                    }, 1000); // Delay of 1 second
                    clearLoginForm();
                } else if (data === "invalid password") {
                    msgElement.html("<span class='alert alert-danger'>Invalid Password!</span>");
                    //clearLoginForm();
                } else if (data === "email not found") {
                    msgElement.html("<span class='alert alert-danger'>Email Not Found!</span>");
                   // clearLoginForm();
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", status, error);
            }
        });
    }
}