function sendMail(event) {
    event.preventDefault();
    console.log('Hello');
    let params = {
      email: document.getElementById("to").value,
      message: document.getElementById("msg").value,
    }; 
    emailjs.send("service_ihls7fb", "template_a7y64gc", params)
      .then((res) => {
        console.log(res);
        alert("Your message sent successfully");
        window.location.href = 'http://localhost/firm/manage_contact.php';
      })
      .catch(error => console.error("EmailJS Error:", error));
  }