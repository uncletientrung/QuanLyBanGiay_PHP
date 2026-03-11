$(document).ready(function () {
    let revenueChart = null;

    // Hàm định dạng tiền tệ
    function formatCurrency(number) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
    }

    function initChart(labels, data) {
        const ctx = document.getElementById('revenue-chart').getContext('2d');

        if (revenueChart) {
            revenueChart.destroy();
        }

        revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu',
                    data: data,
                    fill: true,
                    backgroundColor: 'rgba(6, 101, 208, .2)',
                    borderColor: 'rgba(6, 101, 208, 1)',
                    pointBackgroundColor: 'rgba(6, 101, 208, 1)',
                    pointBorderColor: '#fff',
                    tension: 0.4 // Tạo độ cong cho đường
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) { return formatCurrency(value); }
                        }
                    }
                }
            }
        });
    }

    function loadData() {
        const periodText = $('.dropdown-item.active').text() || 'Tuần này';
        const period = $('.dropdown-item.active').data('period') || 'week';

        const pLimit = $('#top-products-limit').val();
        const cLimit = $('#top-customers-limit').val();


        $.ajax({
            url: 'reports/getSummaryData',
            type: 'GET',
            data: { period: period, product_limit: pLimit, customer_limit: cLimit },
            dataType: 'json',
            success: function (res) {
                const periodText = $('.dropdown-item.active').text().trim() || 'Tuần này';

                let periodType = "tuần"; // mặc định
                if (periodText.includes("Tháng")) periodType = "tháng";
                else if (periodText.includes("Quý")) periodType = "quý";
                else if (periodText.includes("Năm")) periodType = "năm";

                $('#chart-period-title').text(periodType);

                $('.stat-period').text(periodText.toLowerCase());

                $('#total-revenue').text(formatCurrency(res.overview.revenue));
                $('#total-orders').text(res.overview.orders);
                $('#total-products-sold').text(res.overview.products_sold);
                $('#total-customers').text(res.overview.customers);

                const labels = res.chart.map(item => item.date);
                const data = res.chart.map(item => item.total);
                initChart(labels, data);

                let htmlProducts = '';
                if (res.topProducts && res.topProducts.length > 0) {
                    res.topProducts.forEach(item => {
                        htmlProducts += `
                        <tr>
                            <td><span class="fw-semibold">${item.tensp}</span></td>
                            <td class="text-center">${item.tenhang}</td>
                            <td class="text-center">${item.total_sold}</td>
                            <td class="text-end">${formatCurrency(item.giaban)}</td>
                        </tr>`;
                    });
                } else {
                    htmlProducts = '<tr><td colspan="4" class="text-center">Chưa có dữ liệu bán hàng</td></tr>';
                }
                $('#top-products-table').html(htmlProducts);

                let htmlCustomers = '';
                if (res.topCustomers && res.topCustomers.length > 0) {
                    res.topCustomers.forEach(item => {
                        htmlCustomers += `
                        <tr>
                            <td><span class="fw-semibold">${item.hoten}</span></td>
                            <td class="text-center">${item.order_count}</td>
                            <td class="text-end">${formatCurrency(item.total_spent)}</td>
                        </tr>`;
                    });
                } else {
                    htmlCustomers = '<tr><td colspan="3" class="text-center">Chưa có khách hàng mua</td></tr>';
                }
                $('#top-customers-table').html(htmlCustomers);
            },
            error: function (xhr) {
                console.error("Lỗi AJAX:", xhr.responseText);
            }
        });
    }

    $('.dropdown-item[data-period]').on('click', function (e) {
        e.preventDefault();
        $('.dropdown-item').removeClass('active');
        $(this).addClass('active');
        $('#selected-period').text($(this).text());
        loadData();
    });

    $('#top-products-limit, #top-customers-limit').on('change', loadData);
    $('#btn-refresh').on('click', loadData);

    loadData();
});