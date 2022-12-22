<?php

namespace App\Http\Livewire;

use App\Models\Farmer;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Livewire\Component;

class Dashboard extends Component
{
    public $types = ['crop', 'livestock', 'fish', 'commercial', 'other'];

    public $colors = [
        'crop' => '#f6ad55',
        'livestock' => '#fc8181',
        'fish' => '#90cdf4',
        'commercial' => '#66DA26',
        'other' => '#cbd5e0',
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
        $farmers = Farmer::whereIn('frameworks', $this->types)->get();

        $columnChartModel = $farmers->groupBy('frameworks')
            ->reduce(function ($columnChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->count();

                return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
            }, LivewireCharts::columnChartModel()
                ->setTitle('Farmers by Type')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
                //->setOpacity(0.25)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                ->setColumnWidth(90)
                ->withGrid()
            );

        $pieChartModel = $farmers->groupBy('type')
            ->reduce(function ($pieChartModel, $data) {
                $type = $data->first()->type;
                $value = $data->count();

                return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
            }, LivewireCharts::pieChartModel()
                //->setTitle('Farmers by Type')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                //->withoutLegend()
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        $lineChartModel = $farmers
            ->reduce(function ($lineChartModel, $data) use ($farmers) {
                $index = $farmers->search($data);

                $ageSum = $farmers->take($index + 1)->sum('cv');

                if ($index == 6) {
                    $lineChartModel->addMarker(7, $ageSum);
                }

                if ($index == 11) {
                    $lineChartModel->addMarker(12, $ageSum);
                }

                return $lineChartModel->addPoint($index, $data->age, ['id' => $data->id]);
            }, LivewireCharts::lineChartModel()
                //->setTitle('Farmers Evolution')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->setXAxisVisible(true)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->sparklined()
            );

        $areaChartModel = $farmers
            ->reduce(function ($areaChartModel, $data) use ($farmers) {
                $index = $farmers->search($data);
                return $areaChartModel->addPoint($index, $data->age, ['id' => $data->id]);
            }, LivewireCharts::areaChartModel()
                //->setTitle('Farmers Peaks')
                ->setAnimated($this->firstRun)
                ->setColor('#f6ad55')
                ->withOnPointClickEvent('onAreaPointClick')
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setXAxisVisible(true)
                ->sparklined()
            );

        $multiLineChartModel = $farmers
            ->reduce(function ($multiLineChartModel, $data) use ($farmers) {
                $index = $farmers->search($data);

                return $multiLineChartModel
                    ->addSeriesPoint($data->type, $index, $data->age,  ['id' => $data->id]);
            }, LivewireCharts::multiLineChartModel()
                //->setTitle('Farmers by Type')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->multiLine()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->sparklined()
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        $multiColumnChartModel = $farmers->groupBy('type')
            ->reduce(function ($multiColumnChartModel, $data) {
                $type = $data->first()->type;

                return $multiColumnChartModel
                    ->addSeriesColumn($type, 1, $data->sum('age'));
            }, LivewireCharts::multiColumnChartModel()
                ->setAnimated($this->firstRun)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->withOnColumnClickEventName('onColumnClick')
                ->setTitle('Revenue per Year (K)')
                ->stacked()
                ->withGrid()
            );

        $radarChartModel = $farmers
            ->reduce(function (RadarChartModel $radarChartModel, $data) use ($farmers) {
                return $radarChartModel->addSeries($data->first()->type, $data->description, $data->age);
            }, LivewireCharts::radarChartModel()
                ->setAnimated($this->firstRun)
            );

        $treeChartModel = $farmers->groupBy('type')
            ->reduce(function (TreeMapChartModel $chartModel, $data) {
                $type = $data->first()->type;
                $value = $data->sum('age');

                return $chartModel->addBlock($type, $value)->addColor($this->colors[$type]);
            }, LivewireCharts::treeMapChartModel()
                ->setTitle('Farmers Weight')
                ->setAnimated($this->firstRun)
                ->setDistributed(true)
                ->withOnBlockClickEvent('onBlockClick')
            );

        $this->firstRun = false;

        return view('livewire.dashboard')
            ->with([
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                'lineChartModel' => $lineChartModel,
                'areaChartModel' => $areaChartModel,
                'multiLineChartModel' => $multiLineChartModel,
                'multiColumnChartModel' => $multiColumnChartModel,
                'radarChartModel' => $radarChartModel,
                'treeChartModel' => $treeChartModel,
            ]);
    }
}