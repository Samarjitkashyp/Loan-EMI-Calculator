document.addEventListener('DOMContentLoaded', function () {
    const calculateBtn = document.getElementById('calculateBtn');
    const loanInput = document.getElementById('loanAmount');
    const interestInput = document.getElementById('interestRate');
    const tenureInput = document.getElementById('loanTenure');
    let emiChart;

    function calculateAndRender() {
        const loan = parseFloat(loanInput.value);
        const rate = parseFloat(interestInput.value) / 12 / 100;
        const n = parseFloat(tenureInput.value);

        if (!loan || !rate || !n) return;

        const emi = loan * rate * Math.pow(1 + rate, n) / (Math.pow(1 + rate, n) - 1);
        const totalPayment = emi * n;
        const totalInterest = totalPayment - loan;

        document.getElementById('emiAmount').innerText = Math.round(emi) + ' INR';
        document.getElementById('totalInterest').innerText = Math.round(totalInterest) + ' INR';
        document.getElementById('totalPayment').innerText = Math.round(totalPayment) + ' INR';

        const ctx = document.getElementById('emiChart').getContext('2d');
        if (emiChart) emiChart.destroy();
        emiChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Principal Amount', 'Interest Amount'],
                datasets: [{
                    data: [loan, totalInterest],
                    backgroundColor: ['#4e73df', '#a7c7ff'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    }

    calculateBtn.addEventListener('click', calculateAndRender);

    // Auto render on page load
    calculateAndRender();
});
