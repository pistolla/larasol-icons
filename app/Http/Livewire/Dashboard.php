<?php

namespace App\Http\Livewire;

use App\Models\Farmer;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $types = [
        'Arable',
        'Pastoral',
        'Poultry',
        'Mixed',
        'Commercial',
        'Subsistence',
        'Extensive_intensive',
        'Sedentary',
        'Nomadic',
        'Organic',
        'Aquaculture'
    ];

    public $colors = [
        'Arable' => "#52595d",
        'Pastoral' => "#728fce",
        'Poultry' => "#1589ff",
        'Mixed' => "#57feff",
        'Commercial' => "#2e8b57",
        'Subsistence' => "#f7e7ce",
        'Extensive_intensive' => "#e9ab17",
        'Sedentary' => "#eb5406",
        'Nomadic' => "#810541",
        'Organic' => "#fd349c",
        'Aquaculture' => "#b666d2"
    ];

    public $status = [
        'Registered' => "#52595d",
        'Approved' => "#728fce",
        'Inactive' => "#1589ff"
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function handleOnBlockClick($block)
    {
        dd($block);
    }

    public function render()
    {
        $farmers = Farmer::whereIn('farm_type', $this->types)->get();

        $columnChartModel = $farmers->groupBy('farm_type')
            ->reduce(
                function ($columnChartModel, $data) {
                    $type = $data->first()->farm_type;

                    $value = $data->count();

                    return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
                },
                LivewireCharts::columnChartModel()
                    ->setTitle('Farmers by Farm Type')
                    ->setAnimated($this->firstRun)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility(false)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->setOpacity(0.25)
                    ->setColors($this->colors)
                    ->setColumnWidth(90)
                    ->withGrid()
            );
        $columnCountyChartModel = $farmers->groupBy('county')
            ->reduce(
                function ($columnChartModel, $data) {
                    $county = $data->first()->county;

                    $value = $data->count();

                    return $columnChartModel->addColumn($county, $value, sprintf('#%06X', mt_rand(0, 0xFFFFFF)));
                },
                LivewireCharts::columnChartModel()
                    ->setTitle('Total Farmers per county')
                    ->setAnimated($this->firstRun)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility(false)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->setOpacity(0.25)
                    ->setColors($this->colors)
                    ->setColumnWidth(90)
                    ->withGrid()
            );


        $pieChartModel = $farmers->groupBy('status')
            ->reduce(
                function ($pieChartModel, $data) {
                    $status = $data->first()->status;
                    $value = $data->count();

                    return $pieChartModel->addSlice($status, $value, $this->status[$status]);
                },
                LivewireCharts::pieChartModel()
                    //->setTitle('Farmers by Type')
                    ->setAnimated($this->firstRun)
                    ->setType('donut')
                    ->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->setColors($this->colors)
            );


        $lineChartModel = $farmers->groupBy('county')
            ->reduce(
                function ($lineChartModel, $data, $index) use ($farmers) {

                    $type = $data->first()->county;
                    $value = $data->count();

                    return $lineChartModel->addPoint($index, $value, ['id' => $index]);
                },
                LivewireCharts::lineChartModel()
                    //->setTitle('Farmers Evolution')
                    ->setAnimated($this->firstRun)
                    ->withOnPointClickEvent('onPointClick')
                    ->setSmoothCurve()
                    ->setXAxisVisible(true)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->sparklined()
            );
        $today = Carbon::now();
        $sub18 = $today->subYears(18);
        $today = Carbon::now();
        $sub35 = $today->subYears(35);
        $youths = Farmer::whereDate('dob', '<=', $sub18)->whereDate('dob', '>=', $sub35)->get();
        $pieChartYouthModel = $youths->groupBy('county')
            ->reduce(
                function ($pieChartModel, $data) {

                    $type = $data->first()->county;

                    $value = $data->count();

                    return $pieChartModel->addSlice($type, $value, sprintf('#%06X', mt_rand(0, 0xFFFFFF)));
                },
                LivewireCharts::pieChartModel()
                    //->setTitle('Farmers by Type')
                    ->setAnimated($this->firstRun)
                    ->setType('donut')
                    ->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->setColors($this->colors)
            );

        $this->firstRun = false;

        return view('livewire.dashboard')
            ->with([
                'farmers_count' => $farmers->count(),
                'columnCountyChartModel' => $columnCountyChartModel,
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                'lineChartModel' => $lineChartModel,
                'pieChartYouthModel' => $pieChartYouthModel
            ]);
    }
}
