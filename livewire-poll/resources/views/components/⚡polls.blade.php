<?php

use Livewire\Component;
use App\Models\Poll;
use Livewire\Attributes\On; 
use App\Models\Option;
use App\Models\Vote;
use Livewire\Attributes\Computed;

new class extends Component
{
   #[Computed] #[On('pollCreated')]
    public function polls()
    {
        return Poll::with('options.votes')->latest()->get();
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
};
?>

<div>
    <div>
        @forelse($this->polls() as $poll)
        <div class="mb-4" wire:key="poll-{{ $poll->id }}">
            <h3 class="mb-4 text-xl">
                {{ $poll->title }}
            </h3>
            @foreach($poll->options as $option)
                <div class="mb-2">
                    <button 
                        wire:key="option-{{ $option->id }}"
                        class="btn" 
                        wire:click.prevent="vote({{ $option->id }})"
                        >Vote</button>
                    {{ $option->name }} ({{ $option->votes->count() }})
                </div>
            @endforeach
        </div>
        @empty
            <div class="text-gray-500">
                No polls available
            </div>
        @endforelse
    </div>
</div>