var customer = document.getElementById("customer");
      var email = document.getElementById("email");
      var comment = document.getElementById("comment");
      var dugme = document.getElementById("button");
      dugme.addEventListener("click", function (e) {
        e.preventDefault();
        confirm(
          "customer: " +
            customer.value +
            "\n" +
            "email: " +
            email.value +
            "\n" +
            "message: " +
            message.value
        );
      });