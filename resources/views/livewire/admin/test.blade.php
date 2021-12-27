{{-- @livewire('Admin.Testchild') --}}

{{-- <livewire:admin.testchild /> --}}

<div>
    {{ $this->agency->agency_name }}
    <h1>This is my testing livewire component</h1>
    <button wire:click="like">click me</button>
</div>
