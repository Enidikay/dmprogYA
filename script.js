document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    var btnSubmit = document.getElementById('btn-submit');

    form.addEventListener('submit', function (event) {
        // Empêche le formulaire d'être envoyé si il est vide
        event.preventDefault();

        // Vérifie si un identifiant est entré
        var identifiant = document.getElementById('identifiant').value.trim();
        if (identifiant === '') {
            alert('L\'identifiant est obligatoire');
            return;
        }

        // Vérifie si un mot de passe est entré
        var password = document.getElementById('password').value.trim();
        if (password.length < 6) {
            alert('Le mot de passe doit contenir au moins 6 caractères');
            return;
        }

        // Vérifie si un email est entré
        var email = document.getElementById('email').value.trim();
        var emailConfirm = document.getElementById('email-confirm').value.trim();
        if (email === '' || emailConfirm === '' || email !== emailConfirm) {
            alert('Les adresses email doivent être identiques et remplies');
            return;
        }

        // Le formulaire est envoyé si toute les conditions sont remplis
        alert('Formulaire soumis avec succès !');
    });
});
