document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("cadastroForm");

    form.addEventListener("submit", function (event) {
        // Impede o envio do formulário por padrão
        event.preventDefault();
        // Verifica se o formulário é válido
        if (form.checkValidity()) {
            alert("Formulário enviado com sucesso!");
            // Aqui você pode executar a ação desejada, como enviar os dados para o servidor
            form.submit(); // Envia o formulário
        } else {
            alert("Por favor, preencha todos os campos obrigatórios.");
        }
        // Adiciona classes de validação do Bootstrap
        form.classList.add("was-validated");
    });
});