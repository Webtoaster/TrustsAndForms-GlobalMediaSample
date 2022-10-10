

$("#signup_user_copy_address").on("mouseup", function () {
  $("[id='signup_user_mailing_addressMailingLine1']").val($("[id='signup_user_physical_addressPhysicalLine1']").val());
  $("[id='signup_user_mailing_addressMailingLine2']").val($("[id='signup_user_physical_addressPhysicalLine2']").val());
  $("[id='signup_user_mailing_addressMailingCity']").val($("[id='signup_user_physical_addressPhysicalCity']").val());
  $("[id='signup_user_mailing_addressMailingState']").val($("[id='signup_user_physical_addressPhysicalState']").val());
  $("[id='signup_user_mailing_addressMailingZipCode']").val($("[id='signup_user_physical_addressPhysicalZipCode']").val());
});



