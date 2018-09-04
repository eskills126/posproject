$("#frm").validate({
  rules: {
    field: {
      required: true,
      uemail: true
    }
  }
});
/*
function validateEmail($email) {
  var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return emailReg.test( $email );
}*/
//^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
