const form = document.getElementById("contactForm");

form.addEventListener("submit", function (event) {
  event.preventDefault();

  const formData = new FormData(form);

  const xhr = new XMLHttpRequest();
  const url = "https://brieucmasset.github.io/envoyer-mail"; // Mettez à jour l'URL si nécessaire
  xhr.open("POST", url, true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log("E-mail envoyé avec succès !");
    } else {
      console.error("Erreur lors de l'envoi de l'e-mail.");
    }
  };

  xhr.send(formData);
});
