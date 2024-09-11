<?php

namespace App\Http\Controllers\Api\V1;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\Tape;
use App\Http\Resources\TapeResource;
use App\Http\Controllers\Controller;
use App\Interfaces\TapeRepositoryInterface;
use App\Http\Requests\StoreTapeRequest;
use App\Http\Requests\UpdateTapeRequest;

class TapesController extends Controller
{
	private TapeRepositoryInterface $tapeRepositoryInterface;

	public function __construct(TapeRepositoryInterface $tapeRepositoryInterface)
    {
        $this->tapeRepositoryInterface = $tapeRepositoryInterface;
    }

    public function index()
    {
        $tapes = $this->tapeRepositoryInterface->getAll();
        return TapeResource::collection($tapes);
    }

    public function store(StoreTapeRequest $request)
    {
		$tape = $this->tapeRepositoryInterface->create($request->validated());
		return TapeResource::make($tape);
    }

    public function show(int $id)
    {
        $tape = $this->tapeRepositoryInterface->getById($id);

        if (!$tape) {
            return response()->json(['message' => 'Tape not found'], 404);
        }

        return TapeResource::make($tape);
    }

	public function update(UpdateTapeRequest $request, Tape $tape)
	{
		$tape = $this->tapeRepositoryInterface->update($tape, $request->validated());
		return TapeResource::make($tape);
	}

    public function destroy(Tape $tape)
    {
        $tape->delete();

		return response()->noContent();
    }
}
