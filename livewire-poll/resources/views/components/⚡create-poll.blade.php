<?php

use Livewire\Component;
use App\Models\Poll;

new class extends Component
{
    public $title;
    public $options = [''];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|string|min:1|max:255'
    ];

    protected $messages = [
        'options.*' => "The option can't be empty."
    ];

    public function addOption()
    {

        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);

        $this->options = array_values($this->options);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll()
    {
        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
                collect($this->options)
                    ->map(fn($option) => ['name' => $option])
                    ->all()
            );

        // Alternative
        // foreach($this->options as $optionName){
        //     $poll->options()
        //         ->create([
        //             'name' => $optionName
        //         ]);
        // }

        $this->reset(['title', 'options']);

        $this->dispatch('pollCreated');
    }
};
?>

<div>
    <form wire:submit.prevent="createPoll">
        <div class="mb-4">
            <label for="title">Poll Title</label>
            <input type="text" wire:model.live="title"/>
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        
        @if(count($options) < 10)
        <div class="mb-4">
            <button class="btn" wire:click.prevent="addOption">Add option</button>
        </div>
        @endif
        <div>
                
            @foreach($options as $index => $option)
                <div class="mb-4 mt-4">
                    <label>Option {{ $index + 1 }}</label>
                </div>
                <div class="flex gap-2">
                    <input type="text" wire:model.live="options.{{ $index }}"/>
                    @if($index > 0)
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                    @endif
                </div>
                @error("options.{$index}")
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            @endforeach
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn">Create Poll</button>
        </div>
    </form>
</div>