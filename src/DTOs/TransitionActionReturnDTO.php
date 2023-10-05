<?php

namespace AuroraWebSoftware\ArFlow\DTOs;

use Illuminate\Support\Collection;

class TransitionActionReturnDTO
{
    const SUCCESS = 1;
    const FAIL = 2;

    public static function build(int $status) : self {
        return new self($status);
    }

    /**
     * @param int $status
     * @param Collection|null $messages
     */
    public function __construct(
        public int         $status,
        public ?Collection $messages = null,
    )
    {
    }

    /**
     * @param string $message
     * @return TransitionActionReturnDTO
     */
    public function addMessage(string $message) : TransitionActionReturnDTO
    {
        $this->messages->push($message);
        return $this;
    }

    /**
     * @return bool
     */
    public function executed(): bool
    {
        return ($this->status) == self::SUCCESS;
    }

    /**
     * @return Collection<string>
     */
    public function messages(): Collection
    {
        return $this->messages;
    }

}