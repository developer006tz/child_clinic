</body>
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<script>
    $(document).ready(function() {
  var input = $("#phone"),
      errorMsg = $("#error-msg"),
      validMsg = $("#valid-msg"),
      errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  var iti = window.intlTelInput(input[0], {
    hiddenInput: "full_number",
      separateDialCode: true,
    localizedCountries: {
    tz: "Tanzania"
  },
  onlyCountries: ["tz"],
    utilsScript: "{{ asset('assets/input/build/js/utils.js') }}",
  });

  var reset = function() {
    input.removeClass("error");
    errorMsg.html("").addClass("hide");
    validMsg.addClass("hide");
  };

  input.on('blur', function() {
    reset();
    if (input.val().trim()) {
      if (iti.isValidNumber()) {
        validMsg.removeClass("hide");
      } else {
        input.addClass("error");
        var errorCode = iti.getValidationError();
        errorMsg.html(errorMap[errorCode]).removeClass("hide");
      }
    }
  });

  input.on('change keyup', reset);

  iti.on("countrychange", function() {
    var countryData = iti.getSelectedCountryData();
    var country_code = countryData.dialCode;
    var country_name = countryData.name;
    var country_iso = countryData.iso2;
    $('#country_code').val(country_code);
    $('#country_name').val(country_name);
    $('#country_iso').val(country_iso);
  });
});

</script>
<script>
   </script>

<script>
  const phoneNumberInput = document.getElementById("phone");
  phoneNumberInput.addEventListener("keydown", function(event) {
    const firstDigit = phoneNumberInput.value.charAt(0);
    const keyCode = event.keyCode || event.which;
    if (firstDigit >= "0" && firstDigit <= "5") {
      if (keyCode >= 48 && keyCode <= 57) {
        event.preventDefault();
      }
    }
  });
  phoneNumberInput.addEventListener("keypress", function(event) {
    const keyCode = event.keyCode || event.which;
    if (keyCode < 48 || keyCode > 57) {
      event.preventDefault();
    }
  });
  phoneNumberInput.addEventListener("input", function(event) {
    const phoneNumber = phoneNumberInput.value;
    if (phoneNumber.length > 9) {
      phoneNumberInput.value = phoneNumber.slice(0, 9);
    }
    if (phoneNumber.charAt(0) >= "0" && phoneNumber.charAt(0) <= "5") {
      phoneNumberInput.value = phoneNumber.slice(1);
    }
  });
</script>
</html>
