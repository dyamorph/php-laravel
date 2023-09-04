document.addEventListener('DOMContentLoaded', function() {
    const service = document.getElementById('services');
    const totalPriceElement = document.getElementById('totalPrice');
    const basePriceElement = document.querySelector('[data-product-price]');

    const basePrice = parseFloat(basePriceElement.dataset.productPrice);
    totalPriceElement.textContent = String(basePrice);

    service.addEventListener('change', function() {
        const selectedServices = Array.from(service.querySelectorAll('input[name="service"]:checked'));

        const selectedServicePrices = selectedServices.map(service => parseFloat(service.dataset.servicePrice));

        const totalPrice = basePrice + selectedServicePrices.reduce((total, price) => total + price, 0);

        totalPriceElement.textContent = String(totalPrice);
    });
});
