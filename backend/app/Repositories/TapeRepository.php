<?php

namespace App\Repositories;
use App\Models\Tape;
use App\Interfaces\TapeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TapeRepository implements TapeRepositoryInterface
{
    public function getAll(): Collection
    {
        return Tape::all();
    }

    public function getById(int $id): ?Tape
    {
        return Tape::find($id);
    }

	public function create(array $data): Tape
    {
        return Tape::create($data);
    }

	public function update(Tape $tape, array $data): Tape
	{
		$tape->update($data);
		return $tape;
	}
}
