document.addEventListener("DOMContentLoaded", function () {
    const stateSelect = document.getElementById("estado");
    const citySelect = document.getElementById("city");

    
    stateSelect.addEventListener("change", async function () {
        const selectedState = stateSelect.value;
        citySelect.innerHTML = '<option value="">Escolha uma cidade...</option>'; // Limpa as opções anteriores

        if (selectedState) {
            try {
                // Faz uma requisição para a API do IBGE para buscar os municípios do estado selecionado
                const response = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${selectedState}/municipios`);
                if (!response.ok) {
                    throw new Error("Erro ao buscar cidades");
                }
                const cities = await response.json();
                // Adiciona as cidades ao select
                cities.forEach(function (city) {
                    const option = document.createElement("option");
                    city.nome = cities;
                    option.value = city.nome;
                    option.textContent = city.nome;
                    citySelect.appendChild(option);
                });
            } catch (error) {
                console.error("Erro ao carregar cidades:", error);
            }
        }
    });
});