<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\CarCreateRequest;
use App\Http\Requests\Car\CarUpdateRequest;
use App\Services\Interfaces\CarServiceInterface;
use App\Trait\ResponseFormatTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    use ResponseFormatTrait;

    public $carServiceInterface;

    public function __construct(
        CarServiceInterface $carServiceInterface
    ) {
        $this->carServiceInterface = $carServiceInterface;
    }

    public function list()
    {
        // retrieve data of cars
        $data = $this->carServiceInterface->list();
        return $this->responseFormat(message: "Data retrieved successfully", data: $data);
    }

    public function show(string|int $car_id)
    {
        // find data which related with parameter given
        $data = $this->carServiceInterface->show($car_id);
        return $this->responseFormat(message: "Data retrieved successfully", data: $data);
    }
    public function create(CarCreateRequest $request)
    {
        // create new data
        $data = $this->carServiceInterface->create($request->validated());
        return $this->responseFormat(message: "Data created successfully.", status: Response::HTTP_CREATED, data: $data);
    }
    public function update(CarUpdateRequest $request, $car_id)
    {
        // retrive data for additional value in final result
        $data = $this->carServiceInterface->show($car_id);

        // update related data
        $this->carServiceInterface->update($request->validated(), $car_id);

        return $this->responseFormat(message: "Data updated successfully.", data: $data);
    }
    public function delete(string|int $car_id)
    {
        // delete
        $data = $this->carServiceInterface->delete($car_id);
        return $this->responseFormat(message: "Data deleted successfully.");
    }
}
