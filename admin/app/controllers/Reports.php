<?php
class Reports extends Controller
{
    private $thongKeModel;

    public function __construct()
    {
        $this->thongKeModel = $this->model("ThongKeModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "reports",
            "title" => "Thống kê",
            "Plugin" => [
                "sweetalert2" => 1,
                "chartjs" => 1
            ],
            "Script" => "reports"
        ]);
    }

    public function getSummaryData()
    {
        $period = $_GET['period'] ?? 'week';
        $currentYear = date('Y');
        $currentMonth = date('n');

        switch ($period) {
            case 'month':
                $start = date('Y-m-01 00:00:00');
                $end = date('Y-m-t 23:59:59');
                break;

            case 'quarter':
                if ($currentMonth <= 3) {
                    $start = "$currentYear-01-01 00:00:00";
                    $end = "$currentYear-03-31 23:59:59";
                } elseif ($currentMonth <= 6) {
                    $start = "$currentYear-04-01 00:00:00";
                    $end = "$currentYear-06-30 23:59:59";
                } elseif ($currentMonth <= 9) {
                    $start = "$currentYear-07-01 00:00:00";
                    $end = "$currentYear-09-30 23:59:59";
                } else {
                    $start = "$currentYear-10-01 00:00:00";
                    $end = "$currentYear-12-31 23:59:59";
                }
                break;

            case 'year':
                $start = date('Y-01-01 00:00:00');
                $end = date('Y-12-31 23:59:59');
                break;

            default: // Tuần này
                $start = date('Y-m-d 00:00:00', strtotime('monday this week'));
                $end = date('Y-m-d 23:59:59', strtotime('sunday this week'));
                break;
        }

        $overview = $this->thongKeModel->getOverviewStats($start, $end);
        $chartData = $this->thongKeModel->getRevenueByDay($start, $end);
        $topProducts = $this->thongKeModel->getTopProducts($_GET['product_limit'] ?? 10);
        $topCustomers = $this->thongKeModel->getTopCustomers($_GET['customer_limit'] ?? 10);

        echo json_encode([
            'overview' => $overview,
            'chart' => $chartData,
            'topProducts' => $this->thongKeModel->getTopProducts($_GET['product_limit'] ?? 10),
            'topCustomers' => $this->thongKeModel->getTopCustomers($_GET['customer_limit'] ?? 10)
        ]);
        exit;
    }
}
