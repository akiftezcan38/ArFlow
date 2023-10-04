<?php

namespace AuroraWebSoftware\ArFlow\Traits;

use AuroraWebSoftware\ArFlow\ArFlow;
use AuroraWebSoftware\ArFlow\Contacts\StateableModelContract;
use Illuminate\Database\Eloquent\Model;


trait HasState
{
    public function bootArflow() {
        $this->service = new ArFlow($this);
    }

    public static function workflowAttribute(): string
    {
        return 'workflow';
    }

    public static function stateAttribute(): string
    {
        return 'state';
    }

    public static function stateMetadataAttribute(): string
    {
        return 'state_metadata';
    }

    public function applyWorkflow(string $workflow): bool
    {
        $self = self::class;

        /**
         * @var Model&StateableModelContract $self
         */
        return $self->update(
            ["{$self::workflowAttribute()}" => $workflow]
        );
    }

    public function appliedWorkflow(): string
    {

        $self = self::class;

        /**
         * @var Model&StateableModelContract $self
         */
        return $self->{$self::workflowAttribute()};
    }

    public function currentState(): string
    {
        $self = self::class;

        /**
         * @var Model&StateableModelContract $self
         */
        return $self->{$self::stateAttribute()};
    }

    public function currentStateMetadata(): array
    {
        $self = self::class;

        /**
         * @var Model&StateableModelContract $self
         */
        return $self->{$self::stateMetadataAttribute()};
    }

    public function canTransitionTo(string $state, array $withoutGuards = null): bool
    {
        $this->service->canTransitionTo();
        return false;
    }

    public function possibleTransitions(array $withoutGuards = null): ?array
    {
        return null;
    }

    public function transitionTo(
        string  $state, ?string $comment = null,
        ?string $byModelType = null, ?int $byModelId = null,
        ?array  $metadata = null,
        ?array  $withoutGuards = null,
        bool    $transitionHistoryAction = true
    ): bool
    {

        //throw new WorkflowNotSupportedException();
        //throw new WorkflowNotFoundException();

        return false;
    }


}