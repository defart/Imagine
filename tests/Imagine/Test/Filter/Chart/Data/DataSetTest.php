<?php
namespace Imagine\Test\Filter\Chart\Data;

use Imagine\Filter\Chart\Data\DataSet;

class DataSetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     * @param bool $flipAxes
     * @param float $expectedMaxX
     * @param float $expectedMinX
     * @param float $expectedMaxY
     * @param float $expectedMinY
     *
     * @dataProvider providerDataSetSort
     */
    public function testDataSetSort(
        $data,
        $flipAxes,
        $expectedMaxX,
        $expectedMinX,
        $expectedMaxY,
        $expectedMinY
    )
    {
        $dataSet = new DataSet($data, null, $flipAxes);

        $this->assertEquals($expectedMaxX, $dataSet->getMaxX());
        $this->assertEquals($expectedMinX, $dataSet->getMinX());
        $this->assertEquals($expectedMaxY, $dataSet->getMaxY());
        $this->assertEquals($expectedMinY, $dataSet->getMinY());
    }

    public function providerDataSetSort()
    {
        return [
            'ints all' => [
                'data' => [
                    [-3, -11],
                    [-2, -7],
                    [-1, -3],
                    [0, 0],
                    [1, 3],
                    [2, 7],
                    [3, 11],
                ],
                'flipAxes' => false,
                'expectedMaxX' => 3,
                'expectedMinX' => -3,
                'expectedMaxY' => 11,
                'expectedMinY' => -11,
            ],
            'ints negative' => [
                'data' => [
                    [-10, -11],
                    [-8, -9],
                    [-6, -7],
                    [-4, -5],
                    [-2, -3],
                    [-1, -1],
                ],
                'flipAxes' => false,
                'expectedMaxX' => -1,
                'expectedMinX' => -10,
                'expectedMaxY' => -1,
                'expectedMinY' => -11,
            ],
            'ints positive' => [
                'data' => [
                    [10, 11],
                    [8, 9],
                    [6, 7],
                    [4, 5],
                    [2, 3],
                    [1, 1],
                ],
                'flipAxes' => false,
                'expectedMaxX' => 10,
                'expectedMinX' => 1,
                'expectedMaxY' => 11,
                'expectedMinY' => 1,
            ],
            'floats' => [
                'data' => [
                    [-1.9, -11.5],
                    [-1.7, -7.5],
                    [-1.5, -3.5],
                    [0.5, 0.5],
                    [1.5, 3.5],
                    [1.7, 7.5],
                    [1.9, 11.5],
                ],
                'flipAxes' => false,
                'expectedMaxX' => 1.9,
                'expectedMinX' => -1.9,
                'expectedMaxY' => 11.5,
                'expectedMinY' => -11.5,
            ],
            'flip axes' => [
                'data' => [
                    [-1.9, -11.5],
                    [-1.7, -7.5],
                    [-1.5, -3.5],
                    [0.5, 0.5],
                    [1.5, 3.5],
                    [1.7, 7.5],
                    [1.9, 11.5],
                ],
                'flipAxes' => true,
                'expectedMaxX' => 11.5,
                'expectedMinX' => -11.5,
                'expectedMaxY' => 1.9,
                'expectedMinY' => -1.9,
            ],
        ];
    }
}
