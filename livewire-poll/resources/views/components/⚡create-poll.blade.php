<?php

use Livewire\Component;
use App\Models\Poll;

new class extends Component
{
    public $title;
    public $options = [''];

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);

        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
                collect($this->options)
                    ->map(fn($option) => ['name' => $option])
                    ->all()
            );

        // foreach($this->options as $optionName){
        //     $poll->options()
        //         ->create([
        //             'name' => $optionName
        //         ]);
        // }

        $this->reset(['title', 'options']);
    }
};
?>

<div>
    <form wire:submit.prevent="createPoll">
        <div class="mb-4">
            <label for="title">Poll Title</label>
            <input type="text" wire:model.live="title"/>
        </div>
        
        <div class="mb-4">
            <button class="btn" wire:click.prevent="addOption">Add option</button>
        </div>

        <div>
        @foreach($options as $index => $option)
            <div class="mb-4 mt-4">
                <label>Option {{ $index + 1 }}</label>
            </div>
             <div class="flex gap-2">
                <input type="text" wire:model="options.{{ $index }}"/>
                <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
            </div>
        @endforeach
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn">Create Poll</button>
        </div>
    </form>
</div>