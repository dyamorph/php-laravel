document.addEventListener('DOMContentLoaded', function() {
    const service = document.querySelector('#services');
    const totalPriceElement = document.querySelector('#totalPrice');
    const basePriceElement = document.querySelector('[data-product-price]');

    const basePrice = parseInt(basePriceElement.dataset.productPrice);
    totalPriceElement.textContent = String(basePrice);

    service.addEventListener('change', function() {
        const selectedServices = Array.from(service.querySelectorAll('input[name="service"]:checked'));

        const selectedServicePrices = selectedServices.map(service => parseInt(service.dataset.servicePrice));

        const totalPrice = basePrice + selectedServicePrices.reduce((total, price) => total + price, 0);

        totalPriceElement.textContent = String(totalPrice);
    });
});
