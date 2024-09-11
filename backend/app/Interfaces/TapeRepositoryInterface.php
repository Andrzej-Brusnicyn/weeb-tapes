<?php

namespace App\Interfaces;
use App\Models\Tape;
use Illuminate\Database\Eloquent\Collection;
interface TapeRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id): ?Tape;

	public function create(array $data): Tape;

	public function update(Tape $tape, array $data): Tape;
}
